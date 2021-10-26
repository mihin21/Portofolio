<?php

namespace App\Http\Controllers;

use App\Models\FormationSettings;
use Illuminate\Http\Request;

class formationSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = FormationSettings::orderBy('created_at','ASC')->get();
        $experiences = FormationSettings::where('experience','on')->orderBy('created_at','ASC')->get();
        return view('settings.about.formations.formation_settings',compact('formations','experiences'));
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
            'diplome' => 'required|string',
            'school' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
            'experience' => 'string',
        ]);
        $input = $request->all();
        FormationSettings::create($input);
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
        $formation = FormationSettings::find($id);
        return view('settings.about.formations.edit',compact('formation'));
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
            'diplome' => 'required|string',
            'school' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
            'experience' => 'string',
        ]);
        $input =$request->all();
        FormationSettings::find($id)->update($input);
        return redirect()->route('formation_settings.index')->with('success', 'Modification effectuée avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formations = FormationSettings::find($id);
        $formations->delete();
        return back()->with('success', 'Suppression effectué avec succés');
    }
}
