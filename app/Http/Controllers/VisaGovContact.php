<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class VisaGovContact extends Controller {
      /**
     * Display a contact form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
       
        return view('contact.index');
    }

    public function create(Request $request) {
       
        return $this->store($request) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
         $request->validate([
            'email' => 'required|max:55',
            'text' => 'required|max:500',
        ],[
            'email.required' => 'The email is required.',
            'text.required' => 'The message is required.',
            'email.max' => 'The email is too long.',
            'text.max' => 'The message text is too long.',
        ]);
        
        $formData = $request->all();
       
        Contact::create($formData);

        return redirect()->route('contact')
                        ->with('success', 'Contact sent. Thank you!');
    }
}