<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Dictionar;

class DictionarController extends MaterialController
{

    /**
     * The user repository instance.
     */
    protected $dictionar;

    /**
     * Create a new controller instance.
     *
     * @param  Dictionar  $dictionar
     * @return void
     */
    public function __construct(Dictionar $dictionar)
    {
        $this->dictionar = $dictionar;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dictionars = $this->dictionar->orderBy('updated_at')->paginate(10);
        $data["dictionars"] = $dictionars;
        return view('dictionars.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dictionars.add');
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
            'edicao' => 'required',
            'autores' => 'required'
        ]);


        if ($validator->fails()) { 
            return redirect('dictionars/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {

            $this->dictionar->material_id = $this->grava_material($request);
            $this->dictionar->edicao = $request->edicao;
            $this->dictionar->classificacao = $request->classificacao;
            $this->dictionar->save();

            return redirect('dictionars');
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
        $dictionar = $this->dictionar->find($id);
        $data["dictionar"] = $dictionar;
        $data["authors"] = $dictionar->material->authors->all();
        return view('dictionars.edit', $data);
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
            'edicao' => 'required'
        ]);


        if ($validator->fails()) { 
            return redirect('dictionars/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $this->dictionar = $this->dictionar->find($request->id);
            $this->edita_material($request, $this->dictionar->material_id);
            $this->dictionar->edicao = $request->edicao;
            $this->dictionar->classificacao = $request->classificacao;
            $this->dictionar->save();

            return redirect('dictionars');
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
        parent::destroy($this->dictionar->find($id)->material_id);
        return redirect('dictionars');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $dictionar = $this->dictionar->find($id);
        $data["dictionar"] = $dictionar;
        $data["authors"] = $dictionar->material->authors->all();
        return view('dictionars.del', $data);
    }
}
