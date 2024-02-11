<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class VisaGovBook extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
       $books = Book::where('active', 1)
             ->where('deleted', 0)
             ->get();

        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:250',
            'author' => 'required|max:250',
        ]);
        
        $data = $request->all();
        $data['active'] = 1;

        Book::create($data);

        return redirect()->route('books')
                        ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $bookId = (INT) $request->id; 

        $book = Book::find($bookId);
        return view('show', ['book'=> $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        
         $bookId = (INT) $request->id; 

        $book = Book::find($bookId);

        
        return view('edit', ['book'=> $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        
        $request->validate([
            'title' => 'required|max:250',
            'author' => 'required|max:250',
        ]);
        $bookId = (INT) $request->id; 

        $book = Book::find($bookId);
        $book->update($request->all());

        return redirect()->route('books')
                        ->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {

        $bookId = (INT) $request->id; 

        $book = Book::find($bookId);

        if ($book) {

            $book->active = false;
            $book->deleted = true;
            $book->save();
        }

        return redirect()->route('books')
                        ->with('success', 'Book deleted successfully');
    }
}
