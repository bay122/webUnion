<?php

namespace App\Http\Controllers\Front;
use Carbon\Carbon;
use App\ {
    Services\Access,
    Services\Security,
    Services\Helper,
    Http\Controllers\Controller,
    Http\Requests\ContactRequest,
    Models\Ministerio,
    Models\Contact
    
};


class ContactController extends Controller
{
    /**
     * Create a new ContactController instance.
     *
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Show the form for creating a new contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $ministerios = ministerio::all(); 

        //return view('front.contact',compact('ministerios'));
        return view('front.uc2.informacion.contacto',compact('ministerios'));
       
    }

    /**
     * Store a newly created contact in storage.
     * Docs: https://laravel.com/docs/5.8/queries#where-exists-clauses
     * 		 https://stackoverflow.com/questions/39902831/class-app-carbon-carbon-not-found-laravel-5/39903149
     * @param  ContactRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
       
    	//Valido todos los datos para evitar inyecciones SQL
    	$name = Security::validar($request->input("name"), 'string');
		$email = Security::validar($request->input("email"), 'string');
		$message = Security::validar($request->input("message"), 'string');
		$recap = Security::validar($request->input("recap"), 'string');
		$id_ministerio = Security::validar($request->input("id_ministerio"), 'numero');

		//Cargo el resultado del captcha
        $result_recaptcha = Security::validarReCaptcha($request->input("recap"), 'contact');

        //Valido si pasó el captcha
        if($result_recaptcha["status"] != "ERROR"){
        	//Valido que el mail no se encuentre registrado como spam
	        $spam = Contact::where('email', $email)->where("bo_spam", 1)->exists();
	        if($spam){
	        	//Si es spam, devuelvo mensaje de error
	        	return back ()->with ('error', __("Lo sentimos, por motivos de seguridad, su solicitud fue rechazada."));
	        }
	        else{
	        	//Verifico si ha alcanzado el limite de mensajes por hora
	        	$recent_contacts = Contact::where('email', $email)->where('created_at', '>', Carbon::now()->subHours(1)->toDateTimeString())->get();
	        	if($recent_contacts->count() > 2){
	        		//Si supero el limite, devuelvo mensaje de error
	        		return back ()->with ('error', __("Ha enviado demaciados mensajes, por favor, intentelo nuevamente más tarde."));		
	        	}
	        	else{
	        		//Verifico si, a pesar de haber pasado el captcha, obtuvo una puntuación baja.
	        		//Si su puntuación es baja (WARNING), se marca mensaje para revisión.
	        		$bo_validar = ($result_recaptcha["status"] == "WARNING") ? true : false;
		        	$datos_contacto = array(
		        			'name' => $name,
							'email' => $email,
							'message' => $message,
							'bo_validar' => $bo_validar,
							'id_ministerio' => $id_ministerio,

		        		);
		        	Contact::create ($datos_contacto);
		            return back ()->with ('ok', __('Your message has been recorded, we will respond as soon as possible.'));
	        	}
	        }
        }
        else{
        	//Si no paso el captcha, devuelvo el error.
            return back ()->with ('error', __($result_recaptcha["msg"]));
        }
    }
}
