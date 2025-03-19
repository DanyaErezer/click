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
        // Валидация данных
        $validatedData = $request->validate([
            'web_sites_id' => 'nullable|exists:web_sites,id',
            'url' => 'required|url',
            'x' => 'required|integer',
            'y' => 'required|integer',
            'window_width' => 'nullable|integer',
            'window_height' => 'nullable|integer',
            'document_width' => 'nullable|integer',
            'document_height' => 'nullable|integer',
        ]);


        $click = Click::create([
            'web_sites_id' => $validatedData['web_sites_id'] ?? null,
            'url' => $validatedData['url'],
            'date' => now(),
            'x' => $validatedData['x'],
            'y' => $validatedData['y'],
            'window_width' => $validatedData['window_width'] ?? null,
            'window_height' => $validatedData['window_height'] ?? null,
            'document_width' => $validatedData['document_width'] ?? null,
            'document_height' => $validatedData['document_height'] ?? null,
        ]);


        return response()->json(['message' => 'Click saved', 'data' => $click], 201);
    }
}
