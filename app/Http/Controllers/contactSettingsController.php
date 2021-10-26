<?php

namespace App\Http\Controllers;

use App\Models\ContactSettings;
use Illuminate\Http\Request;

class contactSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactSettings::latest()->get();
        return view('settings.contact.contact_settings',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'number1' => 'required|integer',
            'number2' => 'nullable',
        ]);
        $input = $request->all();
        ContactSettings::create($input);
        return back()->with('success', 'Enregistrement effectué avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactSettings::find($id);
        return view('settings.contact.edit',compact('contact'));
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
        $request->validate([
            'email' => 'required|string',
            'number1' => 'required|integer',
            'number2' => 'nullable',
        ]);
        $input = $request->all();
        ContactSettings::find($id)->update($input);
        return redirect()->route('contact_settings.index')->with('success', 'Enregistrement effectué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactSettings::find($id);
        $contact->delete();
        return back()->with('success', 'Suppression effectué avec succés');
    }

}
