<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Book;

class BookController extends MaterialController
{


    /**
     * The user repository instance.
     */
    protected $book;

    /**
     * Create a new controller instance.
     *
     * @param  Book  $book
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->book->orderBy('isbn')->paginate(10);
        $data["books"] = $books;
        return view('books.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'isbn' => 'required',
            'paginas' => 'required',
            'autores' => 'required'
        ]);


        if ($validator->fails()) { 
            return redirect('books/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {

            $this->book->material_id = $this->grava_material($request);
            $this->book->isbn = $request->isbn;
            $this->book->paginas = $request->paginas;
            $this->book->resumo = $request->resumo;
            $this->book->save();

            return redirect('books');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->book->find($id);
        $data["imagem_link"] = $this->link_imagem($book->material_id, $book->material->imagem_capa);
        $data["book"] = $book;
        $data["authors"] = $book->material->authors->all();
        return view('books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'isbn' => 'required',
            'paginas' => 'required'
        ]);


        if ($validator->fails()) { 
            return redirect('books/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {

            $this->book = $this->book->find($request->id);
            $this->edita_material($request, $this->book->material_id);
            $this->book->isbn = $request->isbn;
            $this->book->paginas = $request->paginas;
            $this->book->resumo = $request->resumo;
            $this->book->save();

            return redirect('books');
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        parent::destroy($this->book->find($id)->material_id);
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $book = $this->book->find($id);
        $data["book"] = $book;
        $data["authors"] = $book->material->authors->all();
        return view('books.del', $data);
    }
}
