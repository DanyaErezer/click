<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\WebSite;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    public function index()
    {
        $webSites = WebSite::all();
        return view('webSites.index', compact('webSites'));
    }

    public function create()
    {
        return view('webSites.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:web_sites,url',
        ]);

        WebSite::create($validated);

        return redirect()->route('webSites.index')->with('success', 'Сайт успешно добавлен!');
    }

    public function show($id)
    {
        $webSite = WebSite::findOrFail();
        return view('webSites.show', compact('webSite'));
    }

    public function heatmap()
    {
        $click = Click::all();
        return view('clicks.heatmap', compact('click'));
    }

    public function chart()
    {
        $clickByHour = Click::selectRaw('strftime("%H", date) as hour, COUNT(*) as count')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();
        return view('clicks.chart', compact('clickByHour'));
    }

    public function edit(string $id)
    {
        $webSite = WebSite::findOrFail($id);
        return view('webSites.edit', compact('webSite'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:web_sites,url,' . $id, // Исправлено на web_sites
        ]);

        $webSite = WebSite::findOrFail($id);
        $webSite->update($validated);

        return redirect()->route('webSites.index')->with('success', 'Сайт успешно обновлен!');
    }

    public function destroy(string $id)
    {
        $webSite = WebSite::findOrFail($id); // Исправлено на findOrFail
        $webSite->delete();

        return redirect()->route('webSites.index')->with('success', 'Сайт успешно удален!');
    }


}
