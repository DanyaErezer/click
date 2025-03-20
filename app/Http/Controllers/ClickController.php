<?php

namespace App\Http\Controllers;

use App\Models\Click;
use Illuminate\Http\Request;

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
            'url' => 'required|url',
            'x' => 'required|integer',
            'y' => 'required|integer',
            'window_width' => 'nullable|integer',
            'window_height' => 'nullable|integer',
            'document_width' => 'nullable|integer',
            'document_height' => 'nullable|integer',
        ]);


        $click = Click::create([
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
}
