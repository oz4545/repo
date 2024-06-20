<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
 
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|min:5|max:30',
        'color' => 'required|string|min:7|max:',

    ]);

    $categories = Category::create([
        'name' => $request->nombre,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('category.index', ['category' => $categories->id])->with('success', 'categoria .');
}


    public function show(Category $categories)
    {
        if ($categories->user_id != Auth::id()) {
            abort(403);
        }

        return view('categories.show', compact('menu'));
    }

    public function edit(Category $categories)
    {
        if ($categories->user_id != Auth::id()) {
            abort(403);
        }

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $categories)
    {
        if ($categories->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nombre' => 'required|string|min:5|max:30',
        ]);

        $categories->update([
            'name' => trim($request->nombre),
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoria actualizada con éxito!');
    }

    public function destroy(Category $categories)
    {
        if ($categories->user_id != Auth::id()) {
            abort(403);
        }

        $categories->delete();

        return redirect()->route('menu.index')->with('success', 'categoria eliminada con éxito!');
    }
}