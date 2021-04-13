<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// IMPORTAÇÕES DO FIREBASE
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    public function index(){

        // CRIANDO A CONEXÃO COM O BANCO DE DADOS
        // REFERENCIANDO AO ARQUIVO JSON DISPONIBILIZADO PELO FIREBASE
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');

        // // INSTANCIANDO O BANCO DE DADOS
        $database = $factory->createDatabase();



    //===========================SALVANDO===================================

    if(isset($_POST['save_push_data']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $data = [
            'username' => $username,
            'email' => $email,
            'phone' => $phone
        ];

        $refphp = "contact/";
        $postdata = $database->getReference($refphp)->push($data);

        if($postdata){
            $_SESSION['status'] = "Data Inserted Successfully";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "Data Not Inserted. Something went wrong!";
            header("Location: index.php");
        }
    }

    //===========================SALVANDO===================================

    //===========================EDITANDO===================================

    if(isset($_POST['update_data']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $token = $_POST['token'];

        $data = [
            'username' => $username,
            'email' => $email,
            'phone' => $phone
        ];

        $refphp = "contact/".$token;
        $postdata = $database->getReference($refphp)->update($data);

        if($postdata){
            $_SESSION['status'] = "Data Update Successfully";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "Data Not Updated. Something went wrong!";
            header("Location: index.php");
        }
    }

    //===========================EDITANDO===================================


    //===========================DELETANDO===================================

    if(isset($_POST["delete_data"]))
    {
        $token = $_POST['ref_token_delete'];

        $ref = "contact/".$token;
        $deleteData = $database->getReference($ref)->remove();

        if($deleteData){
            $_SESSION['status'] = "Data Deleted Successfully";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "Data Not Deleted. Something went wrong!";
            header("Location: index.php");
        }

    }

    //===========================DELETANDO===================================



    //===========================CAPTURAS===================================

    // CAPTURANDO A REFERENCIA RAIZ DO BANCO
    $ref = $database->getReference('incidentes');

    // CAPTURANDO 1 VALOR E TRANSFORMANDO EM JSON
    $ref2 = $database->getReference('incidentes')->getSnapshot();
    $valor = $ref2->getChild('-LsqIpB34cPyxpm2ZFYZ')->getValue();

    // CAPTURANDO TODOS VALORES DO BANCO
    $referencia_todos_valores = $database->getReference('incidentes')->getValue();

    // CAPTURARANDO AS CHAVES DE TODOS OS FILHOS
    $referencia_filhos = $database->getReference('incidentes')->getChildKeys();

    //===========================CAPTURAS===================================


    }
}
