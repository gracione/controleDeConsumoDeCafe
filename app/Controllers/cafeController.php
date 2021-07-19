<?php

namespace App\Controllers;

use App\Models\Quantidade;
use App\Models\Tipo;
use App\Models\Medida;
use App\Models\Recepiente;
use Core\BaseController;
use Core\Container;
use Core\DataBase;
use Core\Redirect;

class cafeController extends BaseController
{
    private $quantidade;
    private $medida;
    private $tipo;
    private $recepiente;

    public function __construct()
    {
        parent::__construct();
        $this->quantidade = Container::getModel("Quantidade");
        $this->medida = Container::getModel("Medida");
        $this->tipo = Container::getModel("Tipo");
        $this->recepiente = Container::getModel("Recepiente");
    }
    public function index()
    {
        $this->setPageTitle('Cafe consumido');
        $this->view->quantidade = $this->quantidade->All();
        $this->renderView('consulta/index', 'layout');
    }
    public function adicionarCafe()
    {
        $this->view->tipo = $this->tipo->All();
        $this->view->medida = $this->medida->All();
        $this->view->recepiente = $this->recepiente->All();
        $this->setPageTitle('Adicionar');
        $this->renderView('consulta/adicionarCafe', 'layout');
    }
    public function relatorio($request)
    {
        $data = !empty($request->post->data)? $request->post->data:date('20y-m-d');

        foreach ($this->tipo->All() as $key => $tipo) {
            $totalTipo = 0;
            foreach ($this->quantidade->All() as $key => $value) {
                if($tipo->tipo == $value->tipo && $data==$value->data ) {
                    $totalTipo += $value->quantidade;
                }
            }
            $vetorTipo[$tipo->tipo][] = $totalTipo;
        }

        foreach ($this->medida->All() as $key => $medida) {
            $totalMedida = 0;
            foreach ($this->quantidade->All() as $key => $value) {
                if ($medida->medida == $value->medida && $data==$value->data ) {
                    $totalMedida += $value->quantidade;
                }
            }
            $vetorMedida[$medida->medida][] = $totalMedida;
        }

        foreach ($this->recepiente->All() as $key => $recepiente) {
            $totalRecepiente = 0;
            foreach ($this->quantidade->All() as $key => $value) {
                if ($recepiente->recepiente == $value->recepiente && $data==$value->data ) {
                    $totalRecepiente += $value->quantidade;
                }
            }
            $vetorRecepiente[$recepiente->recepiente][] = $totalRecepiente;
        }

        $this->view->vetor = [$vetorMedida, $vetorTipo, $vetorRecepiente];
        $this->renderView('relatorio/index', 'layout');
    }
    public function store($request)
    {
        $data = [
            'tipo' => $request->post->tipo,
            'medida' => $request->post->medida,
            'quantidade' => $request->post->quantidade,
            'recepiente' => $request->post->recepiente,
            'data' => date('y-m-d')
        ];

        $this->quantidade->create($data);
        Redirect::route('/consultar');
    }
    public function delete($id)
    {
        $this->quantidade->delete($id);
        Redirect::route('/consultar');
    }
}
