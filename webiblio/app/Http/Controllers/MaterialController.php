<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Material;

use App\Author;


class MaterialController extends Controller
{


    /**
     * The user repository instance.
     */
    protected $material;
    protected $author;

    /**
     * Create a new controller instance.
     *
     * @param  Material  $material
     * @return void
     */
    public function __construct(Material $material, Author $author)
    {
        $this->material = $material;
        $this->author = $author;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->material = new Material;
        $this->material->find($id)->delete();
    }



    /**
     * Grava dados de Material independete do tipo
     *
     * @param  Request de Post de Formulário
     * @return int $id de Material
     */
    protected function grava_material($request){
        $this->material = new Material;
        $this->material->titulo = $request->titulo;
        $this->material->subtitulo = $request->subtitulo;
            
        //Trata imagem
        $imagem = $this->grava_imagem($request);
        if ($imagem != ""){
            $this->material->imagem_capa = $imagem;   
        } 
         $this->material->save();


        //Trata autores
        $autores = $request->autores;
        if ($autores != ""){
            $listaAutores = $this->grava_autores($autores);
            $this->material->authors()->sync($listaAutores);
        }

         return $this->material->id;
    }


        /**
     * Grava dados de Material independete do tipo
     *
     * @param  Request de Post de Formulário
     * @return int $id de Material
     */
    protected function edita_material($request, $material_id){
        $this->material = Material::find($material_id);
        $this->material->titulo = $request->titulo;
        $this->material->subtitulo = $request->subtitulo;
   
        //Trata imagem
        $imagem = $this->grava_imagem($request);
        if ($imagem != ""){
            $this->material->imagem_capa = $imagem;   
        } 
         $this->material->save();


        //Trata autores
        $autores = $request->autores;
        if ($autores != ""){
            $listaAutores = $this->grava_autores($autores);
            $this->material->authors()->sync($listaAutores);
        }

         return $this->material->id;
    }



    /**
     * Sobe nova imagem para servidor
     *
     * @param  Request de arquivo  $imagem
     * @return String para Path
     */
    private function grava_imagem($request){
        if ($request->hasFile('arquivo_capa')) {
            if ($request->file('arquivo_capa')->isValid()) {
                $filename = $request->file('arquivo_capa')->getClientOriginalName();
                $request->file('arquivo_capa')->move(public_path().'/images',$filename);
                return $filename;
            }
        }
        return "";
    }

    /**
     * Retorna lista de autores de acordo com nomes
     *
     * @param  Request de arquivo  $imagem
     * @return Array de códigos de autores separados por vírgula
     */
    private function grava_autores($autores){
        $listaAuthor = array();
        $vetAuthors = explode(',',$autores);
        reset($vetAuthors);
        foreach ($vetAuthors as $nomeAuthor) {
            $this->author = new Author;
            $idAuthor = $this->getAuthorByName($nomeAuthor);
            echo $idAuthor;
            if (!($idAuthor > 0)){ 
                $this->author->nome = trim($nomeAuthor);
                $this->author->notacao = $this->author->calcula_notacao($nomeAuthor);
                $this->author->save();
                $idAuthor = $this->getAuthorByName($nomeAuthor);
            }  

            if ($idAuthor > 0){ 
                $listaAuthor[] = $idAuthor;
                $idAuthor = 0;
            }    
        }
        return $listaAuthor;
    }


    /**
     * Retorna id de author a partir de nome
     *
     * @param  String  $nome
     * @return int $id or 0
     */
    private function getAuthorByName($nome){
        $authors = Author::where('nome', trim($nome))->get();  
        if (count($authors) > 0){ 
            return $authors[0]->id;
        } 
    }

   
}
