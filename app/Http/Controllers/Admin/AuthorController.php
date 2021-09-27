<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use DataTables;
use Flash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Author::orderBy('id','DESC');
            return Datatables::of($query)->addColumn('status', function ($query) {
                return $query->status;
            })->addColumn('action', function ($query) {
                return view('admin.partials.action', [
                'item' => $query,
                'source' => 'authors',
                'view_btn' => true,
                'edit_btn' => true,
                'delete_btn' => true,
                ]);
            })->make(true);
        }
        return view('admin.authors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'author_name' => 'required',
            'email'   => 'required|email|unique:authors',
            'phone'   => 'required|numeric|digits:10',
            'address' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }

        $create_author = Author::create([
            'name' => $request->author_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        if ($create_author) {
            Flash::success(trans('messages.author_create'));
            return redirect()->route('admin.authors.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('admin.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $author_status = Book::bookStatus();
        return view('admin.authors.edit', compact('author', 'author_status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $rules = [
            'author_name' => 'required',
            'email'   => 'required|email|unique:authors,email,'. $author->id,
            'phone'   => 'required|numeric|digits:10',
            'address' => 'required',
            'status'  => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }
        
        $author->name  = $request->author_name;
        $author->email = $request->email;
        $author->phone = $request->phone;
        $author->address = $request->address;
        $author->status = $request->status;
        if ($author->save()) {
            Flash::success(trans('messages.author_update'));
            return redirect()->route('admin.authors.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if ($author) {
            if ($author->delete()) {
                Flash::success(trans('messages.author_delete'));
                return redirect()->route('admin.authors.index');
            }
        }
    }
}
