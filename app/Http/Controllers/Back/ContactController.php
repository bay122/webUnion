<?php

namespace App\Http\Controllers\Back;

//use Request;
use Bestmomo\LaravelEmailConfirmation\Notifications\ConfirmEmail;
use Illuminate\Http\Request;
use App\ {
	Services\Access,
    Services\Security,
    Services\Helper,
    Models\Contact,
    Repositories\ContactRepository,
    Http\Controllers\Controller
};
//use Illuminate\Mail\Mailer;
use Illuminate\Notifications\Messages\MailMessage;
//use Illuminate\Notifications\Channels\MailChannel;
//vendor/bestmomo/laravel-email-confirmation/src/Commands/stubs/Notifications/ConfirmEmail.stub
//vendor/bestmomo/laravel-email-confirmation/publishable/translations/es/confirmation.php
//vendor/laravel/framework/src/Illuminate/Notifications/ChannelManager.php

class ContactController extends Controller
{
    use Indexable;//Crea la instancia para procesar la paginación

    /**
     * Create a new ContactController instance.
     *
     * @param  \App\Repositories\ContactRepository $repository
     */
    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;

        $this->table = 'contacts';
        $this->nbrPages = config('app.nbrPages.back.comments');

        Helper::loadJavascriptFullPath("adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js");
        Helper::loadCssFullPath("adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css");
        Helper::loadJavascript("back/Contacts/index.js");

        //$id_ministerio 			= 	Security::validar($request->input("ministerio")			, 'numero');
    }


    /**
     * Display a listing of the resource.
     * 		Docs: 
     * 			https://laravel.com/docs/5.8/controllers#resource-controllers
	 *      	https://youtu.be/t8Qn0QwO6-g
	 *	        https://laracasts.com/discuss/channels/laravel/routeresource-parameters
     * @return \Illuminate\Http\Response
     *
     * Este metodo está definido en Indexable.php, para la reutilización de pagínación.
     * 		Docs: https://www.conetix.com.au/blog/simple-guide-using-traits-laravel-5
     */
    //public function index(Request $request)
		//Access::checkPerfil();//hacerlo asi? usar un middleware? 
    
    /**
     * Update "new" field for contact.
     *
     * @param  \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function updateSeen(Contact $contact)
    {
    	//TODO: agregar usuario que le cambia el estado
        //$contact->ingoing->delete ();
        if($contact->bo_leido){
        	$contact->bo_leido = false;
        }else{
        	$contact->bo_leido = true;
        }
        $contact->save();
        //file_put_contents('php://stderr', PHP_EOL . print_r($contact, TRUE). PHP_EOL, FILE_APPEND);

        return response ()->json ();
    }
    /*public function updateSeen(Contact $contact)
    {
        $contact->ingoing->delete ();

        return response ()->json ();
    }*/

    public function responder(Request $request)
    {
    	$response = Array("result" =>  false, "mensaje" => '');
    	$id_contact = Security::validar($request->input("id_contact"), 'numero');
    	$contacto = Contact::find($id_contact);
    	if (!$contacto) { 
    		$response["mensaje"] = "Ocurrió un error al envíar el mensaje.";
    	}else{
    		$to = $contacto->email;//"somebody@example.com, somebodyelse@example.com";
			$subject = "HTML email";
    		$message = Security::validar($request->input("mensaje"), 'html');
    		$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From: <no-reply@unioncristiana.cl>' . "\r\n";
			//$headers .= 'Cc: '$contacto->email . "\r\n";
			
			
	        //$class = ConfirmEmail::class;

			//$contacto->notify(new $class);
			//$mailMessage = (new MailMessage)->from('no-reply@unioncristiana.cl', 'Iglesia Unión Cristiana')->to($contacto->email)->send();
			//$mailer = new Mailer();
			
			//Docs: https://divinglaravel.com/how-notification-channels-work-in-laravel
			//$message = $notification->toMail($notifiable);

			//if ($message instanceof Mailable) {
			//    return $message->send($this->mailer);
			//}
			
			//mail($to,$subject,$message,$headers);
    		$response["result"] = true;
    	}
    	
        return response ()->json ($response);
    }

    /**
     * Remove contact from storage.
     *
     * @param  \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
    	file_put_contents('php://stderr', PHP_EOL . print_r($contact, TRUE). PHP_EOL, FILE_APPEND);
        //$contact->delete ();
        //
        //'id_usuario_crea' => auth()->id(),//$id_usuario_crea,

        return response ()->json ();
    }
}
