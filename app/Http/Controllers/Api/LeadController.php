<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\NewContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [ //usare Support\Facades e non Dotnev\Validator
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        Mail::to('admin@boolpress.it')->send(new NewContactRequest($lead));

        return response()->json([
            'success' => true
        ]);
    }
}
