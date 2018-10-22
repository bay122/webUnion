<?php

namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\ContactRequest,
    Models\ministerio,
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
        $this->middleware('guest');
    }

    /**
     * Show the form for creating a new contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $ministerios = ministerio::all(); 

        return view('front.contact',compact('ministerios'));
       
    }

    /**
     * Store a newly created contact in storage.
     *
     * @param  ContactRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        Contact::create ($request->all ());

        return back ()->with ('ok', __('Your message has been recorded, we will respond as soon as possible.'));
    }
}
