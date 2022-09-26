<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SentContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'phone' => ['required', 'string', 'max:20'],
            'message' => ['required', 'string', 'max:200'],
        ]);

        Mail::to('contact@laratips.com')->send(new SentContactUsMail($data));

        return response()->json([
            'message' => 'Your message has been submitted successfully.',
        ]);
    }
}
