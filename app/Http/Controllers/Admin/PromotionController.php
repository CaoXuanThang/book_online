<?php

namespace App\Http\Controllers\Admin;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionRequest;
use Illuminate\Support\Facades\Session;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::where('deleted_at', null)
                       ->orderBy('created_at', 'desc')
                       ->paginate(5);

        return view('admin.promotion.index', compact('promotions'));
    }
    public function create(PromotionRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.promotion.create');
        }

        if ($request->isMethod('post')) {
            $params = $request->except('_token');
            Promotion::create($params);
            Session::flash('success', 'Thêm mới thành công');
            return redirect()->route('admin.promotion.index');
        }
    }
    public function edit(PromotionRequest $request, Promotion $promotion)
    {
      if ($request->isMethod('get')) {
        return view('admin.promotion.edit', compact('promotion')); 
      }
    
      if ($request->isMethod('post')) {
        $params = $request->except('_token');
        $promotion->update($params);
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('admin.promotion.index');
      }
    }
    public function destroy(Promotion $promotion)
    {
      $promotion->delete();
  
        Session::flash('success', 'Xóa thành công');
      
        return redirect()->route('admin.promotion.index'); 
    }
}
