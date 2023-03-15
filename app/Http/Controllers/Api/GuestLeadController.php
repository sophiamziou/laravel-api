<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\GuestLead;
use App\Mail\GuestContact;


use Illuminate\Http\Request;

class GuestLeadController extends Controller
{
    public function store(Request $request)
    {
        $form_data = $request->all();
        $validator = Validator::make($form_data, [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        } else {
            $new_contact = new GuestLead();
            $new_contact->fill($form_data);
            $new_contact->save();
            Mail::to('hello@sophia.com')->send(new GuestContact($new_contact));
            return response()->json([
                'success' => true,
            ]);
        }
    }
}
