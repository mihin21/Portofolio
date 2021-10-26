<?php

namespace App\Http\Controllers;

use App\Models\CvSettings;
use Illuminate\Http\Request;

class cvSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs = cvSettings::latest()->get();
        return view('settings.cv.cv_settings',compact('cvs'));
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
            'cv' => 'required'
        ]);
        $input = $request->all();
        if ($picture = $request->file('cv')) {
            $destinationPath = 'assets/cv';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['cv'] = "$pic";
        };
        CvSettings::create($input);
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
        $cv = CvSettings::find($id);
        return view('settings.cv.edit',compact('cv'));
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
            'cv' => 'required'
        ]);
        $input = $request->all();
        if ($picture = $request->file('cv')) {
            $destinationPath = 'assets/cv';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['cv'] = "$pic";
        };
        CvSettings::find($id)->update($input);
        return redirect()->route('cv_settings.index')->with('success', 'Enregistrement effectué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cv = CvSettings::find($id);
        $cv->delete();
        return back()->with('success','Enregistrement effectué avec succes');
    }
}
