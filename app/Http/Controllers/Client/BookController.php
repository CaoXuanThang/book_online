<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
  public function detail(Request $request, $book)
  {
    $book = Book::where('books.deleted_at', null)->where('books.id', $book)->join('categories', 'categories.id', '=', 'books.category_id')->join('brands', 'brands.id', '=', 'books.brand_id')->select('books.*', 'categories.name as category_name', 'brands.name as brand_name')->first();
    $reviews_by_book = DB::table('reviews')
    ->where('book_id', $book->id)
    ->get();
    $promotion = DB::table('books')->join('promotions', 'promotions.id', '=', 'books.promotion_id')->select('promotions.*')->where('books.id', $book->id)->first();
    // Lấy danh mục ID của sản phẩm
    $categoryId = $book->category_id;

    // Lấy ra các sản phẩm cùng danh mục
    $relatedProducts = Book::join('categories', 'categories.id', '=', 'books.category_id')->select('books.*', 'categories.name as category_name')->where('category_id', $categoryId)
      ->where('books.id', '!=', $book->id)
      ->take(4)
      ->get();
    $reviews = Review::join('users', 'reviews.user_id', '=', 'users.id')->join('books', 'reviews.book_id', '=', 'books.id')->select('users.avatar as user_avatar', 'users.name as user_name', 'reviews.created_at', 'reviews.rating', 'reviews.comment')->where('book_id', $book->id)->get();
    // Trả về view kèm các sản phẩm liên quan
    return view('client.detail', compact('book', 'relatedProducts', 'reviews', 'reviews_by_book', 'promotion'));
  }
}
