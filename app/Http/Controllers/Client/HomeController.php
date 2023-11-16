<?php

namespace App\Http\Controllers\Client;

use App\Models\Brand;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\MarketingBanner;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $banners = MarketingBanner::select('id', 'name', 'description', 'image')
            ->whereNull('deleted_at')
            ->get();

        $brands = Brand::select('id', 'name')->get();
        $books = DB::table('invoice_items')
            ->join('books', 'books.id', '=', 'invoice_items.book_id')
            ->join('categories', 'categories.id', '=', 'books.category_id')
            ->select(
                'books.*',
                'categories.name as category_name',
                DB::raw('SUM(invoice_items.quantity) as total_quantity')
            )
            ->groupBy('books.id')
            ->orderByDesc('total_quantity')
            ->take(3)
            ->get();

        $booksWithPromotion = Book::whereNull('books.deleted_at')
            ->whereNotNull('books.promotion_id')
            ->join('categories', 'categories.id', '=', 'books.category_id')
            ->select('books.*', 'categories.name as category_name')
            ->take(3)
            ->get();

        return view('client.home', compact('banners', 'brands', 'books', 'booksWithPromotion'));
    }
}
