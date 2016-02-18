<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get a list of all contacts
			return view('contact.index', ['contacts' => \App\Models\Contact::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('contact.create', ['contact' => new \App\Models\Contact()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$this->validate_and_save($request, new \App\Models\Contact(), 'contact/create');
			return redirect('contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			// display a specific contact's profile
			return view('contact.show', ['contact' => \App\Models\Contact::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			// display a specific contact for editing
			return view('contact.edit', ['contact' => \App\Models\Contact::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			// find our boy
			$contact = \App\Models\Contact::find($id);
			// make our redirect for post-processing
			$redirect = 'contact/'.$id.'/edit';
			// do the thing!
			$this->validate_and_save($request, $contact, $redirect);
			// bring her home
			return redirect($redirect);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // destroy a user
				$contact = \App\Models\Contact::find($id);
				$contact->delete();
				redirect('contact/');
    }

		private function validate_and_save(Request $r, \App\Models\Contact $c, $redirect = 'contact/')
		{
			// Do validation checks
			$validator = Validator::make($r->all(), [
				'fname' => 'bail|required',
				'lname' => 'bail|required',
				'email' => [
					'bail',
					'required',
					// make sure this input generally looks like an email
					'regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/'
				],
				'phone' => [
					// make sure the phone is like (123) 456-789
					'regex:/\(\d{3}\)\s?\d{3}\-\d{3}/'
				],
				'birthday' => [
					// make sure birthdays are generally like 11/22/3333
					'regex:/\d{2}\/\d{2}\/\d{4}/'
				],
				'zip' => [
					// make sure zipcodes are like 12345 or 12345-6789
					'regex:/\d{5}(?:\-\d{0,4})?/'
				]
			]);

			// supply errors to laravel if validation fails
			if ($validator->fails())
			{
				return redirect($redirect)
					->withErrors($validator)
					->withInput();
			}
			else
			{
				// or persist our contact if validation succeeds
				$c->fname = $r->input('fname');
				$c->lname = $r->input('lname');
				$c->email = $r->input('email');
				
				// check each field for existence and persist it if it's there
				foreach ( ['phone','birthday','address','address2','city','state','zip'] as $field )
				{
					if ( $r->has($field) )
					{
						$c->$field = $r->input($field);
					}
				}

				// do the thing!
				$c->save();
			}
		}
}
