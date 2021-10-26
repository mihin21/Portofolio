<?php

namespace App\Http\Controllers;

use App\Models\AboutSettings;
use Illuminate\Http\Request;

class aboutSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = AboutSettings::all();
        return view('settings.about.about_settings', compact('abouts'));
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
            'picture_about' => 'required|image',
            'description' => 'nullable|string'
        ]);
        $input = $request->all();
        if ($picture = $request->file('picture_about')) {
            $destinationPath = 'assets/Picture';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture_about'] = "$pic";
        };

        AboutSettings::create($input);
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
        $about = AboutSettings::find($id);
        return view('settings.about.edit', compact('about'));
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
            'picture_about' => 'required|image',
            'description' => 'nullable|string'
        ]);
        $input = $request->all();
        if ($picture = $request->file('picture_about')) {
            $destinationPath = 'assets/Picture';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture_about'] = "$pic";
        };
        AboutSettings::find($id)->update($input);
        return redirect()->route('about_settings.index')->with('success', 'Modification effectuée avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abouts = AboutSettings::find($id);
        $abouts->delete();
        return back()->with('success','Suppression effectué avec succés');
    }
}
