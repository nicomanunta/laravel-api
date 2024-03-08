<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Lead;
use App\Mail\NewContact;


class LeadController extends Controller
{
    public function store(Request $request){
        $data= $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'email' => 'required|max:100',
            'phone' => 'required|max:20',
            'message' => 'required',   
        ]);


        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);

        }
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        
        Mail::to('info@boolfolio.com')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true,
        ]);
        
    }
}
