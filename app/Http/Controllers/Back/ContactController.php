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
use RealRashid\SweetAlert\Facades\Alert;
//Referencia : https://realrashid.github.io/sweet-alert/install

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

       
        if($contact->bo_leido){
            $contact->bo_leido = false;
            toast('Mensaje no Leído','success','top-right'); 
        }else{
            toast('Mensaje Leído','success','top-right'); 
        	$contact->bo_leido = true;
        }           
   
            $contact->save();
                    
            return redirect(route('contacts.index'));
    	
    }
   
    public function responder(Request $request)
    {
        
       
        //Valido todos los datos para evitar inyecciones SQL
        $id_contact = Security::validar($request->input("id_contact"), 'numero');
        $respuesta = Security::validar($request->input("respuesta"), 'string');
        
       if($respuesta==''){

        toast('El campo Respuesta se encuentra vacío','warning','top-right');
        return redirect(route('contacts.index'));

       }else{

       
        //Buscar la información registrada del receptor con el id_contact
        $contacto = Contact::find($id_contact); 

        //Valida si existe el registro 
       if(!empty($contacto)){

            $name=$contacto->name;
            $email=$contacto->email;

            $mensaje="<h2>Mensaje de www.unioncristiana.cl </h2><br>";
            $mensaje.=$respuesta.'<br>';


            $emisor="noresponder@unioncristiana.cl";
            $receptor= $email;

            $asunto = "Mensaje enviado por: ".$emisor;

            $headers=array(
                'Authorization:Bearer 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',
                    'Content-Type: application/json'
            );

            $data=array(
                "personalizations" => array(
                    array(
                        "to"=>array(
                            array(
                                "email"=>$receptor,
                                "name"=>$name
                            )
                        )
                    )
                            ),
                            "from"=>array(
                                "email"=>$emisor								
                            ),
                            "subject"=>$asunto,
                            "content"=>array(
                                array(
                                    "type"=>"text/html",
                                    "value"=>$mensaje,
                                )
                            )
            );

            $ch=curl_init();
            curl_setopt($ch,CURLOPT_URL,"https://api.sendgrid.com/v3/mail/send");
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($data));
            curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
            curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            $response=curl_exec($ch);
            curl_close($ch);

         //Cambiar estado de bo_leido = 1, bo_respondido = 1, json_respuesta= mensaje enviado    
        
         $contacto->bo_leido=1;
         $contacto->bo_respondido=1;
         $contacto->json_respuestas=$respuesta; 

         $contacto->save();

            toast('Mensaje Enviado!','success','top-right');        
            return redirect(route('contacts.index'));
          
       }else{

            toast('Mensaje no enviado, no se encontro un correo asociado.','error','top-right');
            return redirect(route('contacts.index'));
       }
       
    }
        
    }

    /**
     * Update date bo_valido and bo_spam 1
     *
     * @param  \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function updateSpam(Contact $contact)
    {
    	
        
         
         $contact->bo_spam=1;
         $contact->bo_validar=1;
         $contact->save();

         toast('Mensaje Agregado a Spam','success','top-right'); 
         return redirect(route('contacts.index'));
    }

    /**
     * Update contact bo_estado = 0.
     *
     * @param  \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
    
       $contact->bo_estado=0;
       $contact->save();

       toast('Mensaje Eliminado Correctamente!','success','top-right');    
      return redirect(route('contacts.index'));
    }
}
