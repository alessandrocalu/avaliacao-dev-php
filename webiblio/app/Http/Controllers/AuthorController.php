<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Author;

class AuthorController extends Controller
{


    /**
     * The user repository instance.
     */
    protected $author;

    /**
     * Create a new controller instance.
     *
     * @param  Author  $author
     * @return void
     */
    public function __construct(Author $author)
    {
        $this->author = $author;
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = $this->author->orderBy('nome')->paginate(10);
        $data["authors"] = $authors;
        return view('authors.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.add');
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
            'nome' => 'required|unique:authors|min:3'
        ]);


        if ($validator->fails()) { 
            return redirect('authors/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {

            $this->author->nome = trim($request->nome);
            $this->author->notacao = $request->notacao;
            if ($this->author->notacao == ''){
                $this->author->notacao = $this->author->calcula_notacao($this->author->nome);
            }
            $this->author->save();
            return redirect('authors');
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
        $author = $this->author->find($id);
        $data["author"] = $author;
        return view('authors.edit', $data);
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
            'id' => 'required',
            'nome' => 'required|min:3'
        ]);


        if ($validator->fails()) { 
            return redirect('authors/edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $this->author = $this->author->find($request->id);
            $this->author->nome = $request->nome;
            $this->author->notacao = $request->notacao;
            if ($this->author->notacao == ''){
                $this->author->notacao = $this->author->calcula_notacao($nome);
            }
            $this->author->save();
            return redirect('authors');
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
        $this->author->find($id)->delete();
        return redirect('authors');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $author = $this->author->find($id);
        $data["author"] = $author;
        return view('authors.del', $data);
    }
}
