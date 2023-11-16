<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('deleted_at', null)->select('id', 'name')->paginate(5);
        return view('admin.category.index', compact('categories'));
    }
    public function create(CategoryRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.category.create');
        }

        if ($request->isMethod('post')) {
            Category::create($request->except('_token'));
            return redirect()->route('admin.category.index')->with('success', 'Thêm mới thành công');
        }
    }
    public function edit(Category $category, CategoryRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.category.edit', compact('category'));
        }

        if ($request->isMethod('post')) {
            $category->update($request->except('_token'));
            return redirect()->route('admin.category.index')->with('success', 'Cập nhật thành công');
        }
    }
    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('admin.category.index');
    }
}
