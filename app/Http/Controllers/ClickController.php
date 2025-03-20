<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\WebSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ClickController extends Controller
{

    public function index()
    {
        $clicks = Click::all();
        return response()->json(['message' => 'Api is working', 'data' => $clicks]);
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'web_sites_id' => 'required|exists:web_sites,id',
            'url' => 'required|url',
            'x' => 'required|integer',
            'y' => 'required|integer',
            'window_width' => 'required|integer',
            'window_height' => 'required|integer',
            'document_width' => 'required|integer',
            'document_height' => 'required|integer',
        ]);


        $click = Click::create([
            'web_sites_id' => $validatedData['web_sites_id'],
            'url' => $validatedData['url'],
            'date' => now(),
            'x' => $validatedData['x'],
            'y' => $validatedData['y'],
            'window_width' => $validatedData['window_width'],
            'window_height' => $validatedData['window_height'],
            'document_width' => $validatedData['document_width'],
            'document_height' => $validatedData['document_height'],
        ]);


        return response()->json(['message' => 'Click saved', 'data' => $click], 201);
    }

    public function heatmap($webSiteId)
    {

        $webSite = WebSite::findOrFail($webSiteId);

        // Получаем клики только для этого сайта
        $clicks = Click::where('web_sites_id', $webSiteId)->get();


        return view('clicks.heatmap', compact('clicks', 'webSite'));
    }


    public function chart($webSiteId)
    {
        $clickByHour = Click::selectRaw('strftime("%H", date) as hour, COUNT(*) as count')
            ->where('web_sites_id', $webSiteId)
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();
        $clicks = Click::where('web_sites_id', $webSiteId)->get();

        return view('clicks.chart', compact('clickByHour', 'clicks', 'webSiteId'));
    }
    public function test($id){
        $test = WebSite::findOrFail($id);
        return view('layouts.test', compact('test'));
    }
}
