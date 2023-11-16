<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::where('deleted_at', null)->select('id', 'name','image')->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }
    public function create(BrandRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.brand.create');
        }

        if ($request->isMethod('post')) {
            $params = $request->except('_token');
            $params['image'] = uploadFile('images', $request->file('image'));
            $brand = Brand::create($params);
            return redirect()->route('admin.brand.index')->with('success', 'Thêm mới thành công');
        }
    }
    public function edit(Brand $brand, BrandRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.brand.edit', compact('brand'));
        }

        if ($request->isMethod('post')) {
            $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()) {
                $resultDLT = Storage::delete('/public/' . $brand->image);
                if($resultDLT){
                    $params['image'] = uploadFile('images', $request->file('image'));
                }  else {
                    $params['image'] = $brand->image;
                }
            }
            Brand::where('id', $brand->id)->update($params);
            
            return redirect()->route('admin.brand.index')->with('success', 'Cập nhật thành công');
        }
    }
    public function destroy(Brand $brand)
    {
        $brand->delete();
        Session::flash('success', 'Xóa thành công');
        return redirect()->route('admin.brand.index');
    }
}
