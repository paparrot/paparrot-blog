<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSubmitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function index(): View
    {
        return view('main.contacts', [
            'messages' => []
        ]);
    }

    public function submit(ContactSubmitRequest $request)
    {
        return redirect()->route('home')->with('success', 'Successfully send your message.');
    }
}
