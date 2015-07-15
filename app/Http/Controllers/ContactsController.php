<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    /**
     * Verify contact form data.
     *
     * @return Response
     */
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full-name' => 'required|full_name',
            'phone-number' => ['required', 'regex:{^[+](3|7)(\d{8}|\d{10})$}'],
            'gender' => 'required',
            'age' => 'required|selected'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            return view('pages.contacts-success');
        }
    }
}
