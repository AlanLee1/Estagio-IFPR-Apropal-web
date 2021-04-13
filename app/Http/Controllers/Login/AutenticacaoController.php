<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// IMPORTAÇÕES DO FIREBASE
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Auth\SignInResult;


class AutenticacaoController extends Controller
{
    //CONTROLE DE URI
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

        //HELPER PARA DEBUGAR
        //dd($this->request->route());
        //dd($this->request->route()->uri());

        // CRIANDO A CONEXÃO COM O FIREBASE
        // REFERENCIANDO AO ARQUIVO JSON DISPONIBILIZADO PELO FIREBASE
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $auth = $factory->createAuth();
        // $usar = $auth->getUser($uid);

        //$teste = $auth->

        //INSTANCIANDO A CONEXÃO


        // $user = $auth->getUserByEmail('teste@gmail.com');

        // $verificationIdToken = $auth -> verifyIdToken($idTokenString , $checkIfRevoked = true);

        // $signInResult = $auth->signOut();

        // $resultado->firebaseUserId();

        // $users = $auth->listUsers($defaultMaxResults = 1000, $defaultBatchSize = 1000);

        // $teste = $auth->currentUser();

        // $usuarioLogado = $auth->getUser();

        // if ($usuarioLogado) {
        //     return redirect('Painel')->with("sucesso",'Logado com sucesso!');
        // } else {
        //     return redirect('')->with("sucesso",'Precisa logar no sistema!');
        // }


    }

    public function index()
    {
        //CONTROLE PARA URL
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[0];
        return view('Painel.Login.login', compact('urlAtual'));
    }

    public function registro()
    {
        //CONTROLE PARA URL
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[0];
        return view('Painel.Login.registro', compact('urlAtual'));
    }

    public function logar(Request $request)
    {
        // CRIANDO A CONEXÃO COM O FIREBASE
        // REFERENCIANDO AO ARQUIVO JSON DISPONIBILIZADO PELO FIREBASE
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');

        //INSTANCIANDO A CONEXÃO
        $auth = $factory->createAuth();

        try{
            $email = $request->input('email');
            $senha = $request->input('senha');

            $signInResult = $auth->signInWithEmailAndPassword($email, $senha);

            if($signInResult){
                return redirect('Painel')->with("sucesso",'Logado com sucesso!');
            }
        }catch(\Kreait\Firebase\Exception\Auth\InvalidPassword | \Kreait\Firebase\Exception\InvalidArgumentException | \Kreait\Firebase\Auth\SignIn\FailedToSignIn $e){
            return redirect('')->with("erro",'E-mail ou senha incorreto!');
        }
    }
}
