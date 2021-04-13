<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// IMPORTAÇÕES DO FIREBASE
use Kreait\Firebase\Factory;

class AgricultorController extends Controller
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

        return view('Painel.Agricultores.index', compact('urlAtual'));
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
        $ref = $database->getReference('agricultores');

        // PREENCHENDO UMA LISTA COM OS DADOS PARA PODER EXIBIR
        $agricultores = $ref->getValue();

        foreach ($agricultores as $agricultor) {
            $all_agricultor[] = $agricultor;
        }

        return view('Painel.Agricultores.list', compact('all_agricultor', 'urlAtual','urlAnterior'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CONTROLE PARA URL
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[3];
        $urlAnterior = $exploder[2];
        $urlAnterior2 = $exploder[1];

        return view('Painel.Agricultores.create', compact('urlAtual','urlAnterior','urlAnterior2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('agricultores');

        $key = $ref->push()->getKey();

        $ref->getChild($key)->set([
            'id'=>$key,
            'nome'=>$request->input('nome'),
            'cpf'=>$request->input('cpf'),
            'cadpro'=> $request->input('cadpro'),
            'senha'=>$request->input('senha'),
            'email'=>$request->input('email'),
            'telefone'=>$request->input('telefone')

        ]);

        return redirect('Painel/Agricultores/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $ref = $database->getReference('agricultores');

        $agricultor = $ref->getChild($id)->getValue();

        return view('Painel.Agricultores.edit', compact('agricultor','urlAtual','urlAnterior','urlAnterior2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $ref = $database->getReference('agricultores');

        $agricultor = $ref->getChild($id)->getValue();

        return view('Painel.Agricultores.edit', compact('agricultor','urlAtual','urlAnterior','urlAnterior2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('agricultores');

        $ref->getChild($id)->update([
            'id'=>$id,
            'nome'=>$request->input('nome'),
            'cpf'=>$request->input('cpf'),
            'cadpro'=> $request->input('cadpro'),
            'senha'=>$request->input('senha'),
            'email'=>$request->input('email'),
            'telefone'=>$request->input('telefone')
        ]);

        return redirect('Painel/Agricultores/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        // CAPTURANDO A REFERENCIA RAIZ DO BANCO
        $ref = $database->getReference('agricultores');

        $ref->getChild($id)->remove();
        return redirect('Painel/Agricultores/list');
    }
}
