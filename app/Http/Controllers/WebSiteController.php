<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\WebSite;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $webSites = WebSite::all();
        return view('webSites.index', compact('webSites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('webSites.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:WebSites,url',
        ]);

        WebSite::create($validated); //

        return redirect()->route('webSites.index')->with('success', 'Сайт успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(){

    }
    public function heatmap()
    {
        $click = Click::all();
        return view('/clicks/heatmap', compact('click'));
    }

    public function chart()
    {
        $clickByHour = Click::selectRaw('strftime("%H", date) as hour, COUNT(*) as count')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();
        return view('/clicks/chart', compact('clickByHour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $webSite = WebSite::findOrFail($id);
        return view('webSites.edit', compact('webSite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:sites,url,' . $id,
            ]);
        $webSite = WebSite::findOrFail($id);
        $webSite->update($validated);
        return redirect()->route('webSites.index') ->with('success', 'Сайт успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $webSite = WebSite::findOrFail($id);
        $webSite->delete();

        return redirect()->route('webSites.index')->with('success', 'Сайт успешно удален!');
    }
}
