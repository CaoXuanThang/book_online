<?php

namespace App\Http\Controllers\Client;

use App\Models\Brand;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\MarketingBanner;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banners = MarketingBanner::select('id', 'name', 'description', 'image')
        ->whereNull('deleted_at')
        ->get();
        $brands = Brand::select('id', 'name')->get();
        $books = Book::whereNull('books.deleted_at')->join('categories', 'categories.id', '=', 'books.category_id')->select('books.*', 'categories.name as category_name');
        $categories = DB::table('categories')->select('id', 'name')->get();
        if($request->q){
            $books->where('books.name', 'like', '%'.$request->q.'%');
        }

        if ($request->brand) {
            session(['selectedCheckbox' => $request->brand]);

            // Sử dụng điều kiện trực tiếp trong truy vấn Eloquent
            $books->whereIn('brand_id', $request->brand);
        }else{
            session(['selectedCheckbox' => []]);
        }

        if($request->min_price){
            session(['min_price' => $request->min_price]);
            $books->where('books.price', '>=', $request->min_price);
        }
        if($request->max_price){
            session(['max_price' => $request->max_price]);
            $books->where('books.price', '<=', $request->max_price);
        }
        if(!$request->min_price){
            session(['min_price' => null]);
        }
        if(!$request->max_price){
            session(['max_price' => null]);
        }

        if($request->category){
            $books->where('category_id', $request->category);
        }
        $books = $books->get();
        $selectedCheckbox = session('selectedCheckbox', []);

        return view('client.directory', compact('banners', 'brands', 'books', 'selectedCheckbox', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
