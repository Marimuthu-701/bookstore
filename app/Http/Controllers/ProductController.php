<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ProductController extends Controller
{
    /**
     * Home page Get books list
     * 
     * @return App\Models\Book
     */
    public function homePage()
    {
        $books = Book::where('in_stock', 1)->get();
        return view('home', compact('books'));
    }

    /**
     * Get book Details
     * 
     * @return void
     */
    public function bookInfo($slug) 
    {
        $book = Book::where('slug', $slug)->first();
        if ($book) {
            return view('book-info', compact('book'));
        }
        return redirect('/');
    }
}
