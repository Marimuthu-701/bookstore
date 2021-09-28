<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Rating;
use Auth;
use Session;
use Redirect;

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
            $getAllRating = $book->getAllRatings($book->id);
            // This Rating Avarage all user total rating and averaged by provider id
            $getAverage   = $book->averageRatingByType($book->id);
            $getRatingDetail = [];
            if (count($getAllRating) > 0){
                foreach ($getAllRating as $key => $value) {
                    $user = User::find($value->author_id);
                    if ($user) {
                        $userName = $user->name ?? null;
                        $getRatingDetail[$key]['title'] = $value->title;
                        $getRatingDetail[$key]['comments'] = $value->body;
                        $getRatingDetail[$key]['rating']  = $value->rating;
                        $getRatingDetail[$key]['user_name'] = $userName;
                        $getRatingDetail[$key]['created_at'] = $value->created_at->diffForHumans();
                    }
                }
            }
            return view('book-info', compact('book', 'slug', 'getRatingDetail', 'getAverage'));
        }
        return redirect('/');
    }

    /**
     * Add comment and rating
     * 
     * @param Illuminate\Http\Request
     */
    public function createCommentReview(Request $request)
    {
        $this->validate($request, [
            'rating'   => 'required',
            'comments' => 'required'
        ]);
        $user = Auth::user();
        $book = Book::where('slug', $request->slug)->first();
        if (!$book) {
            return Redirect::back()->with([
                'message' => trans('auth.somting_wrong'),
            ]);
        }
        $existRating = Rating::where('author_id', Auth::id())
                     ->where('reviewrateable_id', $book->id)->count();
        if ($existRating > 0) {
            return Redirect::back()->with([
                'message' => trans('messages.exit_error_rating'),
            ]);
        }
        $rating = $book->rating([
            'title' => '',
            'body' => $request->comments,
            'rating' => $request->rating ?? 0,
            'recommend' => 'Yes',
            'approved' => true, // This is optional and defaults to false
        ], $user);

        if ($rating) {
            return Redirect::back()->with([
                'message' => trans('auth.register_success'),
            ]);
        }
        return Redirect::back()->with([
            'message' => trans('auth.somting_wrong'),
        ]);
    }
}
