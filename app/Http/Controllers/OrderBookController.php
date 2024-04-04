<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Book;
use Illuminate\Http\Request;

class OrderBookController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $orders = Order::paginate(9);
    return view('demand.index', ['orders' => $orders]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create($id)
  {
    $book  = Book::find($id);
    return view('demand.create', compact('book'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'author' => 'required',
      'formateur' => 'required',
      'book_id' => 'required|exists:books,id'
    ], [
      'title.required' => 'Please enter a title.',
      'author.required' => 'Please enter an author.',
      'formateur.required' => 'Please enter a formateur.',
    ]);

    $order = new Order();
    $order->title = $request->title;
    $order->author = $request->author;
    $order->name = $request->formateur;
    $order->book_id = $request->book_id;
    $order->save();

    return redirect()->route('demand.index')->with('success', 'Order added successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $order = Order::find($id);
    $book = $order->book;
    $book->update(['stock' => $book->stock + 1]);
    $order->delete();
    return redirect()->route('demand.index')->with('success', 'Order deleted successfully');
  }

  /**
   * Search for orders
   */
  public function search(Request $request)
  {
    $search = $request->input('search');
    $orders = Order::where('title', 'like', '%' . $search . '%')
      ->orWhere('author', 'like', '%' . $search . '%')
      ->orWhere('name', 'like', '%' . $search . '%')
      ->paginate(9);
    return view('demand.index', compact('orders'));
  }

  /**
   * Update the status of the order
   */
  public function updateStatus($id)
  {

    $order = Order::find($id);
    $order->status = 'done';
    $book = $order->book;
    if ($book->stock > 0) {
      $book->update(['stock' => $book->stock - 1]);
      if ($book->stock == 0) {
        $book->update(['status' => $book->status = 0]);
      }
    } 
    $order->save();
    return redirect()->route('demand.index')->with('success', 'Order updated successfully');
  }
}
