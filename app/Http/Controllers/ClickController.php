<?php

namespace App\Http\Controllers;

use App\Models\Click;
use Illuminate\Http\Request;

class ClickController extends Controller
{

    public function index()
    {
        return response()->json(['message' => 'Api is working']);
    }
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'url' => 'required|url',
            'x' => 'required|integer',
            'y' => 'required|integer',
        ]);


        $click = Click::create([
            'url' => $request -> url,
            'date' => now(),
            'x' => $request -> x,
            'y' => $request -> y,
        ]);
        return response()->json(['massage' => 'Click save'], 201);
    }
}
