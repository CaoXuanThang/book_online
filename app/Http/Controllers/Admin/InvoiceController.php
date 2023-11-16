<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index()
    {
        $orders = Invoice::latest()->paginate(5);
        return view('admin.invoice.index', compact('orders'));
    }
    public function detail($id)
    {
        $order = Invoice::find($id);
        $order_details = InvoiceItem::where('invoice_id', $id)->get();
        return view('admin.invoice.detail', compact('order', 'order_details'));
    }
    public function update(Request $request, $id)
    {
       $status= $request->status;
       $invoice_items = InvoiceItem::where('invoice_id', $id)->get();
       if($status == 2){
        foreach($invoice_items as $item){
         //get quantity
         $book = Book::find($item->book_id);
         $book->quantity += $item->quantity;
         $book->save();
        }
       }
       Invoice::where('id', $id)->update([
        'status' => $status
       ]);
       return redirect()->route('admin.invoice.index')->with('success', 'Cập nhật thành công');
    }
}
