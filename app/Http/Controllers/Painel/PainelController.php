<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class PainelController extends Controller
{
    public function index()
    {
        // Contando a quantidade de registros de incidentes
        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');
        $database = $factory->createDatabase();

        $filhosInsumo = $database->getReference('insumos')->getChildKeys();
        $totalInsumo = 0;

        foreach ($filhosInsumo as $filhoInsumo) {
            $totalInsumo = $totalInsumo+1;
        }

        $filhosAgricultor = $database->getReference('agricultores')->getChildKeys();
        $totalAgricultor = 0;

        foreach ($filhosAgricultor as $filhoAgricultor) {
            $totalAgricultor = $totalAgricultor+1;
        }

        $filhosTecnico = $database->getReference('tecnicos')->getChildKeys();
        $totalTecnico = 0;

        foreach ($filhosTecnico as $filhoTecnico) {
            $totalTecnico = $totalTecnico+1;
        }

        return view('painel.dashboard', compact('totalInsumo','totalAgricultor','totalTecnico'));

        return redirect()->action('painel.layout.sidebar_lateral', compact('totalInsumo','totalAgricultor', 'totalTecnico'));
    }
}
