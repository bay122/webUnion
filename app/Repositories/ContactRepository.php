<?php

namespace App\Repositories;

use App\Models\Contact;

/**
 * Docs: https://stackoverflow.com/questions/30231862/laravel-eloquent-has-with-wherehas-what-do-they-mean
 */
class ContactRepository
{
    /**
     * Get contacts paginate.
     *
     * @param  int  $nbrPages
     * @param  array  $parameters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll($nbrPages, $parameters)
    {
    	/**
    	 * La query antigua hacia las siguientes acciones:
    	 * select count(*) as aggregate from `contacts`
		 * select * from `contacts` order by `created_at` desc limit 3 offset 0
		 * select * from `ingoings` where `ingoings`.`ingoing_id` in ('8', '9', '10') and `ingoings`.`ingoing_type` = 'App\Models\Contact'
    	 */
        /*return Contact::with ('ingoing')
            ->latest()
            ->when ($parameters['new'], function ($query) {
                $query->has ('ingoing');
            })->paginate($nbrPages);*/

        $contacts =  Contact::where('bo_estado', '=', '1')
        		->when($parameters['new'], function ($query) {
	                $query->where('bo_leido', '=', '0');
	            })->orderBy('created_at', 'desc')->paginate($nbrPages);
        //file_put_contents('php://stderr', PHP_EOL . print_r($nbrPages, TRUE). PHP_EOL, FILE_APPEND);
        //file_put_contents('php://stderr', PHP_EOL . print_r($parameters, TRUE). PHP_EOL, FILE_APPEND);
	    return $contacts;
    }
}