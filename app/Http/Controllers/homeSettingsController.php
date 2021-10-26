<?php

namespace App\Http\Controllers;

use App\Models\HomeSettings;
use Illuminate\Http\Request;

class homeSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeData = HomeSettings::all();
        return view('settings.home.home_settings', compact('homeData'));
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
            "first_name" => "required|string",
            "last_name" => "required|string",
            "status" => "required|string",
            "picture" => "required|image",
        ]);

        $input = $request->all();
        if ($picture = $request->file('picture')) {
            $destinationPath = 'assets/Picture';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture'] = "$pic";
        };
        HomeSettings::create($input);
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
        $data = HomeSettings::find($id);
        return view('settings.home.edit', compact('data'));
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
            "first_name" => "required|string",
            "last_name" => "required|string",
            "status" => "required|string",

        ]);
        $input = $request->all();
        if ($picture = $request->file('picture')) {
            $destinationPath = 'assets/Picture';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture'] = "$pic";
        };
        HomeSettings::find($id)->update($input);
        return redirect()->route('home_settings.index')->with('success', 'Modification effectuée avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeData = HomeSettings::find($id);
        $homeData->delete();
        return back()->with('success', 'Suppression effectué avec succés');
    }
}
