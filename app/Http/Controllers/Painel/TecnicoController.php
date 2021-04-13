<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// IMPORTAÇÕES DO FIREBASE
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class TecnicoController extends Controller
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

        return view('Painel.Tecnicos.index', compact('urlAtual'));
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
        $ref = $database->getReference('tecnicos');

        // PREENCHENDO UMA LISTA COM OS DADOS PARA PODER EXIBIR
        $tecnicos = $ref->getValue();

        foreach ($tecnicos as $tecnico) {
            $all_tecnico[] = $tecnico;
        }

        return view('Painel.Tecnicos.list', compact('all_tecnico','urlAtual','urlAnterior'));

    }


    public function create()
    {
        //CONTROLE PARA URL
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[3];
        $urlAnterior = $exploder[2];
        $urlAnterior2 = $exploder[1];

        return view('Painel.Tecnicos.create', compact('urlAtual','urlAnterior','urlAnterior2'));
    }


    public function store(Request $request)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('tecnicos');

        $key = $ref->push()->getKey();

        $ref->getChild($key)->set([
            'id'=>$key,
            'nome'=>$request->input('nome'),
            'cpf'=>$request->input('cpf'),
            'crea'=>$request->input('crea'),
            'email'=>$request->input('email'),
            'telefone'=>$request->input('telefone'),
            'senha'=>$request->input('senha')

        ]);

        return redirect('Painel/Tecnicos/list');
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
        $ref = $database->getReference('tecnicos');

        $tecnico = $ref->getChild($id)->getValue();

        return view('Painel.Tecnicos.edit', compact('tecnico','urlAtual','urlAnterior','urlAnterior2'));
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
        $ref = $database->getReference('tecnicos');

        $tecnico = $ref->getChild($id)->getValue();

        return view('Painel.Tecnicos.edit', compact('tecnico','urlAtual','urlAnterior','urlAnterior2'));
    }


    public function update(Request $request, $id)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('tecnicos');

        $ref->getChild($id)->update([
            'id'=>$id,
            'nome'=>$request->input('nome'),
            'cpf'=>$request->input('cpf'),
            'crea'=>$request->input('crea'),
            'email'=>$request->input('email'),
            'telefone'=>$request->input('telefone'),
            'senha'=>$request->input('senha')
        ]);

        return redirect('Painel/Tecnicos/list');
    }


    public function destroy($id)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('tecnicos');

        $ref->getChild($id)->remove();
        return redirect('Painel/Tecnicos/list');
    }
}
