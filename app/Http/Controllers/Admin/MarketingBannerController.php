<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\MarketingBanner;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarketingBannerRequest;

class MarketingBannerController extends Controller
{
    public function index()
    {
        $marketing_banners = DB::table('marketing_banners as mb')
        ->join('books', 'books.id', '=', 'mb.book_id')
        ->select('mb.id', 'mb.name', 'mb.description', 'mb.image', 'books.name as phone_name')
        ->get();

        return view('admin.marketing_banner.index', compact('marketing_banners'));
    }
    public function create(MarketingBannerRequest $request){
        $books = Book::all();
        if($request->isMethod('post')){
            $params = $request->except('_token');
            $params['image'] = uploadFile('images', $request->file('image'));
            MarketingBanner::create($params);
            return redirect()->route('admin.marketing_banner.index')->with('success', 'Thêm mới thành công');
        }
        return view('admin.marketing_banner.create', compact('books'));
    }
    public function edit(MarketingBannerRequest $request,MarketingBanner $marketing_banner){
            $books = Book::all();

        if($request->isMethod('post')){
            $params = $request->except('_token');
            if($request->file('image') && $request->file('image')->isValid()){
                $params['image'] = uploadFile('images', $request->file('image'));
            }
            $marketing_banner->update($params);
            return redirect()->route('admin.marketing_banner.index')->with('success', 'Cập nhật thành công');
        }
        return view('admin.marketing_banner.edit', compact('books','marketing_banner'));
    }
    public function destroy(MarketingBanner $marketing_banner){
        $marketing_banner->delete();
        return redirect()->route('admin.marketing_banner.index')->with('success', 'Xóa thành công');
    }
}
