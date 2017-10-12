<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
class TipocodigoModuloController extends ControllerBase {

    /**
     * Index action
     */
    public function indexAction() {
        parent::validarSession();
        $queryTipoCodigo = parent::fromInput($this->di,
                                             'Tipocodigo',
                                             ['estadoRegistro' => 'S']
        );
        $tipocodigo = $queryTipoCodigo->getParams();

        if ($tipocodigo) {
            $tipocodigo = Tipocodigo::find($this->persistent->tipoCodigo);
        }else {
            $tipocodigo = array();
        }

        $parameters['order'] = "descripcionModulo ASC";
        $modulo = Modulo::find($parameters);

        $this->view->tipoCodigo = $tipocodigo;
        $this->view->modulo = $modulo;
    }

    /**
     * Searches for tipocodigo_modulo
     */
    public function searchAction() {
        $numberPage = 1;
        if (!$this->request->isPost()) {
            $numberPage = $this->request->getQuery("page",
                                                   "int");
        }

        $tipocodigo = $this->request->getPost("idTipoCodigo");
        if($tipocodigo==''){
            $tipocodigo='%';
        }
        
        $modulo = $this->request->getPost("idModulo");
        if($modulo==''){
            $modulo='%';
        }

        $tipoCodigoModulo = $this->modelsManager->createBuilder()
                                ->columns("cc.idTipoCodigo," .
                                          "cc.idModulo," .
                                          "cc.correlativoModulo," .
                                          "tc.descripcionTipo," .
                                          "mo.descripcionModulo")
                                ->addFrom('TipocodigoModulo',
                                          'cc')
                                ->innerJoin('Tipocodigo',
                                            'tc.idTipoCodigo = cc.idTipoCodigo',
                                            'tc')
                                ->innerJoin('Modulo',
                                            'mo.idModulo = cc.idModulo',
                                            'mo')
                                ->andWhere('cc.idTipoCodigo like :tipo: AND ' .
                                                        'cc.idModulo like :modulo: ',
                                           [
                                                'tipo' => $tipocodigo,
                                                'modulo' => $modulo,
                                                        ]
                                )
                                ->orderBy('tc.descripcionTipo')
                                ->orderBy('mo.descripcionModulo')
                                ->getQuery()
                                ->execute();

        if (count($tipoCodigoModulo) == 0) {
            $this->flash->notice("Búsqueda no Delvolvió resultados");

            $this->dispatcher->forward([
                            "controller" => "tipocodigo_modulo",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $tipoCodigoModulo,
                        'limit' => 10,
                        'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction() {
        $queryTipoCodigo = parent::fromInput($this->di,
                                             'Tipocodigo',
                                             ['estadoRegistro' => 'S']
        );
        $tipocodigo = $queryTipoCodigo->getParams();

        if ($tipocodigo) {
            $tipocodigo = Tipocodigo::find($this->persistent->tipoCodigo);
        }else {
            $tipocodigo = array();
        }

        $parameters['order'] = "descripcionModulo ASC";
        $modulo = Modulo::find($parameters);

        $this->view->tipoCodigo = $tipocodigo;
        $this->view->modulo = $modulo;
    }

    /**
     * Edits a tipocodigo_modulo
     *
     * @param integer $idTipoCodigo
     * @param integer $idModulo
     */
    public function editAction($idTipoCodigo,
                               $idModulo) {
        if (!$this->request->isPost()) {
            
            $tipocodigo_modulo = $this->modelsManager->createBuilder()
                                    ->columns("cc.idTipoCodigo," .
                                              "cc.idModulo," .
                                              "cc.correlativoModulo")
                                    ->addFrom('TipocodigoModulo','cc')
                                    ->andWhere('cc.idTipoCodigo = :tipo: AND ' .
                                               'cc.idModulo = :modulo: ',
                                               [
                                                    'tipo' => $idTipoCodigo,
                                                    'modulo' => $idModulo,
                                               ]
                                    )
                                    ->getQuery()
                                    ->execute();

            if (!$tipocodigo_modulo) {
                $this->flash->error("Tipo Codigo Modulo No encontrado");

                $this->dispatcher->forward([
                                'controller' => "tipocodigo_modulo",
                                'action' => 'index'
                ]);

                return;
            }
            
            $queryTipoCodigo = parent::fromInput($this->di,
                                                 'Tipocodigo',
                                                 ['estadoRegistro' => 'S']
            );
            $tipocodigo = $queryTipoCodigo->getParams();

            if ($tipocodigo) {
                $tipocodigo = Tipocodigo::find($this->persistent->tipoCodigo);
            }else {
                $tipocodigo = array();
            }

            $modulo = Modulo::find($this->persistent->modulo);

            foreach ($tipocodigo_modulo as $tupla) {
                $this->view->tipoCodigo = $tipocodigo;
                $this->view->modulo = $modulo;

                $this->view->idHiddenTipoCodigo = $tupla->idTipoCodigo;
                $this->view->idHiddenidModulo = $tupla->idModulo;

                $this->tag->setDefault("idTipoCodigo",
                                       $tupla->idTipoCodigo);
                $this->tag->setDefault("idModulo",
                                       $tupla->idModulo);
                $this->tag->setDefault("correlativoModulo",
                                       $tupla->correlativoModulo);
            }
        }
    }

    /**
     * Creates a new tipocodigo_modulo
     */
    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "tipocodigo_modulo",
                            'action' => 'index'
            ]);

            return;
        }

        $tipocodigo_modulo = new TipocodigoModulo();
        $tipocodigo_modulo->Idtipocodigo = $this->request->getPost("idTipoCodigo");
        $tipocodigo_modulo->Idmodulo = $this->request->getPost("idModulo");
        $tipocodigo_modulo->Correlativomodulo = $this->request->getPost("correlativoModulo");


        if (!$tipocodigo_modulo->save()) {
            foreach ($tipocodigo_modulo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "tipocodigo_modulo",
                            'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("Tipo Código Módulo se Registró Satisfactoriamente");

        $this->dispatcher->forward([
                        'controller' => "tipocodigo_modulo",
                        'action' => 'index'
        ]);
    }

    /**
     * Saves a tipocodigo_modulo edited
     *
     */
    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "tipocodigo_modulo",
                            'action' => 'index'
            ]);

            return;
        }

        $idTipoCodigo = $this->request->getPost("idHiddenTipoCodigo");
        $idModulo = $this->request->getPost("idHiddenModulo");
        $tipocodigo_modulo = TipocodigoModulo::findFirst([
                                                "idTipoCodigo"=>$idTipoCodigo,
                                                "idModulo"=>$idModulo,
        ]);

        if (!$tipocodigo_modulo) {
            $this->flash->error("Tipo de Codigo Modulo no Encontrado" . $idTipoCodigo);

            $this->dispatcher->forward([
                            'controller' => "tipocodigo_modulo",
                            'action' => 'index'
            ]);

            return;
        }

        $tipocodigo_modulo->Idtipocodigo = $this->request->getPost("idTipoCodigo");
        $tipocodigo_modulo->Idmodulo = $this->request->getPost("idModulo");
        $tipocodigo_modulo->Correlativomodulo = $this->request->getPost("correlativoModulo");


        if (!$tipocodigo_modulo->save()) {

            foreach ($tipocodigo_modulo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "tipocodigo_modulo",
                            'action' => 'edit',
                            'params' => [$tipocodigo_modulo->idTipoCodigo, $tipocodigo_modulo->idModulo]
            ]);

            return;
        }

        $this->flash->success("Tipo Codigo Modulo ha sido Actualizado Satisfactoriamente");

        $this->dispatcher->forward([
                        'controller' => "tipocodigo_modulo",
                        'action' => 'index'
        ]);
    }

    /**
     * Deletes a tipocodigo_modulo
     *
     * @param string $idTipoCodigo
     */
    public function deleteAction($idTipoCodigo) {
        $tipocodigo_modulo = TipocodigoModulo::findFirstByidTipoCodigo($idTipoCodigo);
        if (!$tipocodigo_modulo) {
            $this->flash->error("tipocodigo_modulo was not found");

            $this->dispatcher->forward([
                            'controller' => "tipocodigo_modulo",
                            'action' => 'index'
            ]);

            return;
        }

        if (!$tipocodigo_modulo->delete()) {

            foreach ($tipocodigo_modulo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "tipocodigo_modulo",
                            'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("tipocodigo_modulo was deleted successfully");

        $this->dispatcher->forward([
                        'controller' => "tipocodigo_modulo",
                        'action' => "index"
        ]);
    }
}