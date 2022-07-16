<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\NewContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        Mail::to('admin@boolpress.it')->send(new NewContactRequest($lead));
    }
}
