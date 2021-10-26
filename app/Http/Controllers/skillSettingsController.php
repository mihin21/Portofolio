<?php

namespace App\Http\Controllers;


use App\Models\SkillSettings;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class skillSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = SkillSettings::all();
        return view('settings.about.skils.skill_settings',compact('skills'));
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
            'skills' => 'nullable|string',
        ]);

        $input = $request->all();
        SkillSettings::create($input);
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
        $skills = SkillSettings::find($id);
        return view('settings.about.skils.edit',compact('skills'));
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
            'skills' => 'nullable|string',
        ]);


        $input = $request->all();
        if ($picture = $request->file('cv')) {
            $destinationPath = 'assets/Picture';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['cv'] = "$pic";
        };
        SkillSettings::find($id)->update($input);
        return redirect()->route('skill_settings.index')->with('success', 'Modification effectuée avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skills = SkillSettings::find($id);
        $skills->delete();
        return back()->with('success', 'Suppression effectué avec succés');

        $cv = SkillSettings::find($id);
        $cv->delete();
        return back()->with('success', 'Suppression effectué avec succés');
    }
}
