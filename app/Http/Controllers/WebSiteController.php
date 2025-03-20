<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Models\WebSite;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class WebSiteController extends Controller
{
    public function index(): Factory|Application|View
    {
        $webSites = WebSite::all();
        return view('webSites.index', compact('webSites'));
    }

    public function create(): Factory|Application|View
    {
        return view('webSites.create');
    }

    public function store(StoreWebsiteRequest $request): RedirectResponse
    {
        WebSite::create($request->all());

        return redirect()->route('webSites.index')->with('success', 'Сайт успешно добавлен!');
    }

    public function show(WebSite $webSite): Factory|Application|View
    {
        return view('webSites.show', compact('webSite'));
    }

    public function edit(WebSite $webSite): Factory|Application|View
    {
        return view('webSites.edit', compact('webSite'));
    }

    public function update(UpdateWebsiteRequest $request, WebSite $webSite): RedirectResponse
    {
        $webSite->update($request->all());

        return redirect()->route('webSites.index')->with('success', 'Сайт успешно обновлен!');
    }

    public function destroy(WebSite $webSite): RedirectResponse
    {
        $webSite->delete();

        return redirect()->route('webSites.index')->with('success', 'Сайт успешно удален!');
    }
}
