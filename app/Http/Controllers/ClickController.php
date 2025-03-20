<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClickRequest;
use App\Models\Click;
use App\Models\WebSite;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;

class ClickController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(['message' => 'Api is working']);
    }

    public function store(StoreClickRequest $request): JsonResponse
    {
        foreach ($request->all() as $click) {
            Click::create([
                'web_sites_id' => $click['web_sites_id'],
                'url' => $click['url'],
                'date' => now(),
                'x' => $click['x'],
                'y' => $click['y'],
                'window_width' => $click['window_width'],
                'window_height' => $click['window_height'],
                'document_width' => $click['document_width'],
                'document_height' => $click['document_height'],
            ]);
        }

        return response()->json(['message' => 'Clicks saved'], 201);
    }

    public function heatmap(WebSite $website): Factory|Application|View
    {
        return view('clicks.heatmap', compact('website'));
    }

    public function chart(WebSite $website): Factory|Application|View
    {
        $clickByHour = Click::selectRaw('strftime("%H", date) as hour, COUNT(*) as count')
            ->where('web_sites_id', $website->id)
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();

        return view('clicks.chart', compact('clickByHour', 'website'));
    }

    /**
     * Тест кликов
     *
     * @param WebSite $website
     * @return Factory|Application|View
     */
    public function click(WebSite $website): Factory|Application|View
    {
        return view('layouts.click', compact('website'));
    }
}
