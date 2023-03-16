<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::latest()->paginate(5);
        return view('backend.category.index', compact('category'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $attr = $request->validated();
        Category::create($attr + [
            'slug' => Str::slug($request->name),
            'created_by' => Auth::user()->profile->name,
        ]);
        return redirect()->route('category.index')->with('success', __('Category created successfully.'));
    }

    public function show(Category $category)
    {
        return view('backend.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $attr = $request->validated();
        $category->update($attr + [
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('category.index')->with('success', __('Category updated successfully.'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', __('Category deleted successfully.'));
    }

    public function trash()
    {
        $category = Category::onlyTrashed()->paginate(5);
        return view('backend.category.trash', compact('category'));
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if ($category->trashed()) {
            $category->restore();
            return redirect()->route('category.trash')->with('success', 'Data successfully restored');
        } else {
            return redirect()->route('category.trash')->with('success', 'Data is not in trash');
        }
    }

    public function deletePermanent($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->route('category.trash')->with('success', 'Data permanently deleted!');
    }
}