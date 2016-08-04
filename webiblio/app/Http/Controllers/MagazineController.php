<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Magazine;

class MagazineController extends MaterialController
{
    /**
     * The user repository instance.
     */
    protected $magazine;

    /**
     * Create a new controller instance.
     *
     * @param  M<agazine  $magazine
     * @return void
     */
    public function __construct(Magazine $magazine)
    {
        $this->magazine = $magazine;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazine = $this->magazine->orderBy('ano', 'desc')->orderBy('edicao', 'desc')->paginate(10);
        $data["magazines"] = $magazine;
        return view('magazines.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('magazines.add');
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
            'ano' => 'required',
            'edicao' => 'required',
            'paginas' => 'required'
        ]);


        if ($validator->fails()) { 
            return redirect('magazines/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {

            $this->magazine->material_id = $this->grava_material($request);
            $this->magazine->ano = $request->ano;
            $this->magazine->edicao = $request->edicao;
            $this->magazine->paginas = $request->paginas;
            $this->magazine->resumo = $request->resumo;
            $this->magazine->save();

            return redirect('magazines');
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
        $magazine = $this->magazine->find($id);
        $data["magazine"] = $magazine;
        $data["authors"] = $magazine->material->authors->all();
        return view('magazines.edit', $data);
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
            'ano' => 'required',
            'edicao' => 'required',
            'paginas' => 'required'
        ]);


        if ($validator->fails()) { 
            return redirect('magazines/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {

            $this->magazine = $this->magazine->find($request->id);
            $this->edita_material($request, $this->magazine->material_id);
            $this->magazine->ano = $request->ano;
            $this->magazine->edicao = $request->edicao;
            $this->magazine->paginas = $request->paginas;
            $this->magazine->resumo = $request->resumo;
            $this->magazine->save();

            return redirect('magazines');
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
        parent::destroy($this->magazine->find($id)->material_id);
        return redirect('magazines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $magazine = $this->magazine->find($id);
        $data["magazine"] = $magazine;
        $data["authors"] = $magazine->material->authors->all();
        return view('magazines.del', $data);
    }
}
