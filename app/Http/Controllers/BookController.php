<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $books = Book::paginate(9);
    return view('books.index', ['books' => $books]);
  }
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('books.create');
  }
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'author' => 'required',
      'ISBN' => 'required',
      'description' => 'required',
      'category' => 'required|in:DD,DI',
      'price' => 'required|numeric',
      'stock' => 'required|numeric',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
      'title.required' => 'Please enter a title.',
      'author.required' => 'Please enter an author.',
      'description.required' => 'Please enter a description.',
      'ISBN.required' => 'Please enter an ISBN.',
      'category.required' => 'Please select a category.',
      'category.in' => 'The selected category is invalid.',
      'price.required' => 'Please enter a price.',
      'price.numeric' => 'The price must be a number.',
      'stock.required' => 'Please enter a stock quantity.',
      'stock.numeric' => 'The stock quantity must be a number.',
      'image.required' => 'Please select an image.',
    ]);

    $imagePath = $request->file('image')->store('images', 'public');


    $book = new Book();
    $book->title = $request->title;
    $book->author = $request->author;
    $book->ISBN = $request->ISBN;
    $book->description = $request->description;
    $book->category = $request->category;
    $book->price = $request->price;
    $book->stock = $request->stock;
    $book->image = $imagePath;
    $book->save();
    return redirect()
      ->route('books.index')->with('success', 'Book created successfully');
  }
  /**
   * Display the specified resource.
   */
  public function show(Book $book)
  {
    return view('books.show', ['book' => $book]);
  }
  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Book $book)
  {
    return view('books.edit', ['book' => $book]);
  }
  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $bookId)
  {
    $book = Book::find($bookId);

    request()->validate([
      'title' => 'required',
      'author' => 'required',
      'ISBN' => 'required',
      'description' => 'required',
      'category' => 'required|in:DD,DI',
      'price' => 'required|numeric',
      'stock' => 'required|numeric',
    ], [
      'title.required' => 'Please enter a title.',
      'author.required' => 'Please enter an author.',
      'ISBN.required' => 'Please enter an ISBN.',
      'description.required' => 'Please enter a description.',
      'category.required' => 'Please select a category.',
      'category.in' => 'The selected category is invalid.',
      'price.required' => 'Please enter a price.',
      'price.numeric' => 'The price must be a number.',
      'stock.required' => 'Please enter a stock quantity.',
      'stock.numeric' => 'The stock quantity must be a number.',
    ]);


    $book->title = $request->title;
    $book->author = $request->author;
    $book->ISBN = $request->ISBN;
    $book->description = $request->description;
    $book->category = $request->category;
    $book->price = $request->price;
    $book->stock = $request->stock;
    $book->save();


    return redirect()->route('books.show', $bookId)->with('success', 'Book updated successfully');
  }
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Book $book)
  {
    $book->orders()->delete();
    $book->delete();
    return redirect()->route('books.index')->with('success', 'Book deleted successfully');
  }
  /**
   * Search for books
   */
  public function search(Request $request)
  {
    $search = $request->input('search');
    $books = Book::where('title', 'like', '%' . $search . '%')
      ->orWhere('author', 'like', '%' . $search . '%')
      ->orWhere('category', 'like', '%' . $search . '%')
      ->orWhere('ISBN', 'like', '%' . $search . '%')
      ->paginate(9);
    return view('books.index', compact('books'));
  }
}
