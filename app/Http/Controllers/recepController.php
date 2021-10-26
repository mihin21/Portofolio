<?php

namespace App\Http\Controllers;

use App\Models\SendMail;
use Illuminate\Http\Request;

class recepController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email',
            'sujet' => 'required|string',
            'message' => 'required|string'
        ]);

        $input = $request->all();
        SendMail::create($input);
        return back()->with('success', 'Votre Mail à été envoyé avec succés. Merci');
    }
}
