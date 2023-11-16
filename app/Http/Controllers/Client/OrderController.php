<?php

namespace App\Http\Controllers\Client;

use App\Models\Book;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        return view('client.order.index');
    }
    public function create(OrderRequest $request)
    {

        $params = $request->except('_token');
        if (Auth::check()) {
            $params['user_id'] = Auth::id();
        }

        $invoice = Invoice::create($params);
        if (!session()->has('cart')) {
            return redirect()->route('client.home')->with('error', 'Bớt bớt');
        }
        foreach (session('cart') as $book_id => $item) {
            $book = Book::find($book_id);
            // check quantity

            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'book_id' => $book_id,
                'quantity' => $item['quantity'],
                'price' => $item['price'] - intval($item['discount']),
                'total' => ($item['price'] - intval($item['discount'])) * $item['quantity'],
            ]);
            $book->quantity -= $item['quantity'];
            $book->save();
        }
        session()->forget('cart');
        // send email
        if (Auth::check()) {
            Mail::to(Auth::user()->email)->send(new OrderShipped($invoice->id));
        }
        return redirect()->route('client.home')->with('success', 'Đặt hàng thành công');
    }
    public function list()
    {
        $orders = Invoice::where('user_id', Auth::id())->get();
        return view('client.order.list', compact('orders'));
    }
    public function detail($id)
    {
        $order = Invoice::find($id);
        $order_details = InvoiceItem::where('invoice_id', $id)->get();
        return view('client.order.detail', compact('order', 'order_details'));
    }
}
