<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function dashboard()
    {
        $menu = Menu::where('user_id', Auth::id())->get();
        return view('dashboard', compact('menu'));
    }

    public function index()
    {
        $menu = Menu::where('user_id', Auth::id())->get();
        return view('menu.index', compact('menu'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|min:5|max:30',

    ]);

    $menus = Menu::create([
        'name' => $request->nombre,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('menu.index', ['menu' => $menus->id])->with('success', 'menu en orden.');
}


    public function show(Menu $menus)
    {
        if ($menus->user_id != Auth::id()) {
    
        }

        return view('menu.show', compact('menus'));
    }

    public function edit(Menu $menus)
    {
        if ($menus->user_id != Auth::id()) {
            abort(403);
        }

        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        if ($menu->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nombre' => 'required|string|min:5|max:30',
        ]);

        $menu->update([
            'name' => trim($request->nombre),
        ]);

        return redirect()->route('menu.index')->with('success', 'menu actualizado con éxito!');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->user_id != Auth::id()) {
            abort(403);
        }

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'menu eliminado con éxito!');
    }
}