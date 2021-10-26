<?php

namespace App\Http\Controllers;

use App\Models\PortfolioSettings;
use Illuminate\Http\Request;

class portfolioSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = PortfolioSettings::all();
        return view('settings.portfolio.portfolio_settings', compact('portfolios'));
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
            "project_name" => "required|string",
            "picture" => "required|image",
            "link" => "nullable|string"
        ]);
        $input = $request->all();
        if ($picture = $request->file('picture')) {
            $destinationPath = 'assets/Picture';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture'] = "$pic";
            PortfolioSettings::create($input);
            return back()->with('success', 'Enregistrement effectué avec succés');
        }
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
        $portfolio = PortfolioSettings::find($id);
        return view('settings.portfolio.edit', compact('portfolio'));
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
            "project_name" => "required|string",
            "picture" => "required|image",
            "link" => "nullable|string"
        ]);
        $input = $request->all();
        if ($picture = $request->file('picture')) {
            $destinationPath = 'assets/Picture';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture'] = "$pic";
        }
        PortfolioSettings::find($id)->update($input);
            return redirect()->route('portfolio_settings.index')->with('success', 'Enregistrement effectué avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = PortfolioSettings::find($id);
        $portfolio->delete();
        return back()->with('success', 'Suppression effectué avec succés');
    }
}
