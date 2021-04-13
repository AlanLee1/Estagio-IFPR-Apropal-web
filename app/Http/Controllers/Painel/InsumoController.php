<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// IMPORTAÇÕES DO FIREBASE
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class InsumoController extends Controller
{
    //CONTROLE DE URI
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

        //HELPER PARA DEBUGAR
        //dd($this->request->route());
        //dd($this->request->route()->uri());
    }

    public function index()
    {
        //CONTROLE PARA URL
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[1];

        return view('Painel.Insumos.index', compact('urlAtual'));
    }


    public function list()
    {
        //CONTROLE PARA URL
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[2];
        $urlAnterior = $exploder[1];


        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('insumos');

        // PREENCHENDO UMA LISTA COM OS DADOS PARA PODER EXIBIR
        $insumos = $ref->getValue();

        foreach ($insumos as $insumo) {
            $all_insumo[] = $insumo;
        }

        return view('Painel.Insumos.list', compact('all_insumo','urlAtual','urlAnterior'));

    }


    public function create()
    {
        //CONTROLE PARA URL
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[3];
        $urlAnterior = $exploder[2];
        $urlAnterior2 = $exploder[1];

        return view('Painel.Insumos.create', compact('urlAtual','urlAnterior','urlAnterior2'));
    }


    public function store(Request $request)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('insumos');

        $key = $ref->push()->getKey();

        $ref->getChild($key)->set([
            'id'=>$key,
            'quantidade'=>$request->input('quantidade'),
            'descricao'=>$request->input('descricao')

        ]);

        return redirect('Painel/Insumos/list');
    }


    public function show($id)
    {
        //CONTROLE PARA URL
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[3];
        $urlAnterior = $exploder[2];
        $urlAnterior2 = $exploder[1];

        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('insumos');

        $insumo = $ref->getChild($id)->getValue();

        return view('Painel.Insumos.edit', compact('insumo','urlAtual','urlAnterior','urlAnterior2'));
    }


    public function edit($id)
    {
        //CONTROLE PARA URL
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[3];
        $urlAnterior = $exploder[2];
        $urlAnterior2 = $exploder[1];

        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('insumos');

        $insumo = $ref->getChild($id)->getValue();

        return view('Painel.Insumos.edit', compact('insumo','urlAtual','urlAnterior','urlAnterior2'));
    }


    public function update(Request $request, $id)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('insumos');

        $ref->getChild($id)->update([
            'id'=>$id,
            'quantidade'=>$request->input('quantidade'),
            'descricao'=>$request->input('descricao')
        ]);

        return redirect('Painel/Insumos/list');
    }


    public function destroy($id)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('insumos');

        $ref->getChild($id)->remove();
        return redirect('Painel/Insumos/list');

    }


    public function relatorio(){

    }


    public function mapa(){
        //CONTROLE PARA URL
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[2];
        $urlAnterior = $exploder[1];

        return view('Painel.Insumos.mapa', compact('urlAtual','urlAnterior'));
    }


    public function grafico(){

    }
}
