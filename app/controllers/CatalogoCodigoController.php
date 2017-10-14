<?php

use Phalcon\Paginator\Adapter\Model as Paginator;
class CatalogoCodigoController extends ControllerBase {

    /**
     * Index action
     */
    public function indexAction() {
        parent::validarSession();
        $parameters['order'] = "descripcionTipo ASC";
        $tipocodigo = Tipocodigo::find($parameters);

        $parameters['order'] = "descripcionModulo ASC";
        $modulo = Modulo::find($parameters);

        $liderTecnico = Persona::find($this->persistent->liderTecnico);

        $liderFuncional = Persona::find($this->persistent->liderFuncional);

        $this->view->tipoCodigo = $tipocodigo;
        $this->view->liderTecnico = $liderTecnico;
        $this->view->liderFuncional = $liderFuncional;
        $this->view->modulo = $modulo;
    }

    /**
     * Searches for catalogo_codigo
     */
    public function searchAction() {
        /* $numberPage = 1;
          if (!$this->request->isPost()) {
          $numberPage = $this->request->getQuery("page",
          "int");
          } */

        $valorcodigo = $this->request->getPost("valorCodigo");
        $descripcioncodigo = $this->request->getPost("descripcionCodigo");
        $requerimiento = $this->request->getPost("Requerimiento");
        $lidertecnico = $this->request->getPost("idLiderTecnico");
        $liderfuncional = $this->request->getPost("idLiderFuncional");
        $tipocodigo = $this->request->getPost("idTipoCodigo");
        $modulo = $this->request->getPost("idModulo");
        $pagina = $this->request->getPost("pagina");
        $avance = $this->request->getPost("avance");

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }

        if ($lidertecnico == '') {
            $lidertecnico = '%';
        }

        if ($liderfuncional == '') {
            $liderfuncional = '%';
        }

        if ($tipocodigo == '') {
            $tipocodigo = '%';
        }

        if ($modulo == '') {
            $modulo = '%';
        }

        $catalogo_codigo = $this->modelsManager->createBuilder()
                                ->columns("cc.idCodigo," .
                                                        "cc.valorCodigo," .
                                                        "cc.descripcionCodigo," .
                                                        "DATE_FORMAT(cc.fechaRegistro, '%d/%m/%Y') fechaRegistro," .
                                                        "cc.requerimiento requerimiento," .
                                                        "lt.nombrePersona liderTecnico," .
                                                        "lf.nombrePersona liderFuncional," .
                                                        "tc.descripcionTipo," .
                                                        "mo.descripcionModulo")
                                ->addFrom('CatalogoCodigo',
                                          'cc')
                                ->innerJoin('Tipocodigo',
                                            'tc.idTipoCodigo = cc.idTipoCodigo',
                                            'tc')
                                ->innerJoin('Persona',
                                            'lt.idpersona = cc.idLiderTecnico',
                                            'lt')
                                ->innerJoin('Persona',
                                            'lf.idpersona = cc.idLiderFuncional',
                                            'lf')
                                ->innerJoin('Modulo',
                                            'mo.idModulo = cc.idModulo',
                                            'mo')
                                ->andWhere('cc.valorCodigo like :valor: AND ' .
                                                        'cc.descripcionCodigo like :descripcion: AND ' .
                                                        'cc.requerimiento like :requerimiento: AND ' .
                                                        'cc.idLiderTecnico like :tecnico: AND ' .
                                                        'cc.idLiderFuncional like :funcional: AND ' .
                                                        'cc.idTipoCodigo like :tipo: AND ' .
                                                        'cc.idModulo like :modulo: ',
                                           [
                                                'valor' => "%" . $valorcodigo . "%",
                                                'descripcion' => "%" . $descripcioncodigo . "%",
                                                'requerimiento' => "%" . $requerimiento . "%",
                                                'tecnico' => $lidertecnico,
                                                'funcional' => $liderfuncional,
                                                'tipo' => $tipocodigo,
                                                'modulo' => $modulo,
                                                        ]
                                )
                                ->orderBy('cc.valorCodigo')
                                ->getQuery()
                                ->execute();

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }else if ($avance == 1) {
            if ($pagina < floor(count($catalogo_codigo) / 10) + 1) {
                $pagina = $pagina + 1;
            }else {
                $this->flash->notice("No hay Registros Posteriores");
            }
        }else if ($avance == -1) {
            if ($pagina > 1) {
                $pagina = $pagina - 1;
            }else {
                $this->flash->notice("No hay Registros Anteriores");
            }
        }else if ($avance == 2) {
            $pagina = floor(count($catalogo_codigo) / 10) + 1;
        }

        if (count($catalogo_codigo) == 0) {
            $this->flash->notice("La Búqueda no ha Obtenido Resultados");

            $this->dispatcher->forward([
                            "controller" => "catalogo_codigo",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $catalogo_codigo,
                        'limit' => 10,
                        'page' => $pagina
        ]);

        $this->tag->setDefault("valorCodigo",
                               $valorcodigo);
        $this->tag->setDefault("descripcionCodigo",
                               $descripcioncodigo);
        $this->tag->setDefault("Requerimiento",
                               $requerimiento);
        $this->tag->setDefault("idLiderTecnico",
                               $lidertecnico);
        $this->tag->setDefault("idLiderFuncional",
                               $liderfuncional);
        $this->tag->setDefault("idTipoCodigo",
                               $tipocodigo);
        $this->tag->setDefault("idModulo",
                               $modulo);
        $this->tag->setDefault("pagina",
                               $pagina);
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

        $parameters['order'] = "nombrePersona ASC";
        $liderTecnico = Persona::find($parameters);

        $parameters['order'] = "nombrePersona ASC";
        $liderFuncional = Persona::find($parameters);

        $parameters['order'] = "descripcionTipo ASC";
        $tipocodigo = Tipocodigo::find($parameters);

        $parameters['order'] = "descripcionModulo ASC";
        $modulo = Modulo::find($parameters);

        $this->view->tipoCodigo = $tipocodigo;
        $this->view->liderTecnico = $liderTecnico;
        $this->view->liderFuncional = $liderFuncional;
        $this->view->modulo = $modulo;
    }

    /**
     * Edits a catalogo_codigo
     *
     * @param string $idCodigo
     */
    public function editAction($idCodigo) {
        if (!$this->request->isPost()) {

            $catalogo_codigo = CatalogoCodigo::findFirstByidCodigo($idCodigo);
            if (!$catalogo_codigo) {
                $this->flash->error("Codigo no Encontrado");

                $this->dispatcher->forward([
                                'controller' => "catalogo_codigo",
                                'action' => 'index'
                ]);

                return;
            }

            $parameters['order'] = "descripcionTipo ASC";
            $tipocodigo = Tipocodigo::find($parameters);

            $parameters['order'] = "descripcionModulo ASC";
            $modulo = Modulo::find($parameters);

            $liderTecnico = Persona::find($this->persistent->liderTecnico);

            $liderFuncional = Persona::find($this->persistent->liderFuncional);

            $this->view->tipoCodigo = $tipocodigo;
            $this->view->liderTecnico = $liderTecnico;
            $this->view->liderFuncional = $liderFuncional;
            $this->view->modulo = $modulo;

            $this->view->idCodigo = $catalogo_codigo->idCodigo;

            $this->tag->setDefault("idCodigo",
                                   $catalogo_codigo->idCodigo);
            $this->tag->setDefault("valorCodigo",
                                   $catalogo_codigo->valorCodigo);
            $this->tag->setDefault("descripcionCodigo",
                                   $catalogo_codigo->descripcionCodigo);
            $this->tag->setDefault("fechaRegistro",
                                   date_format(new DateTime($catalogo_codigo->fechaRegistro),
                                                            'Y-m-d'));
            $this->tag->setDefault("Requerimiento",
                                   $catalogo_codigo->requerimiento);
            $this->tag->setDefault("idLiderTecnico",
                                   $catalogo_codigo->idLiderTecnico);
            $this->tag->setDefault("idLiderFuncional",
                                   $catalogo_codigo->idLiderFuncional);
            $this->tag->setDefault("idTipoCodigo",
                                   $catalogo_codigo->idTipoCodigo);
            $this->tag->setDefault("idModulo",
                                   $catalogo_codigo->idModulo);
        }
    }

    /**
     * Creates a new catalogo_codigo
     */
    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "catalogo_codigo",
                            'action' => 'index'
            ]);

            return;
        }

        if ($this->validarCodigo($this->request->getPost("valorCodigo"))) {
            $this->flash->success("El Código Enviado ya Existe para el tipo de Codigo y Módulo Seleccionado");
            
            $this->dispatcher->forward([
                            'controller' => "catalogo_codigo",
                            'action' => 'new'
            ]);
            
            return;
        }
        
        $catalogo_codigo = new CatalogoCodigo();
        $catalogo_codigo->Valorcodigo = $this->request->getPost("valorCodigo");
        $catalogo_codigo->Descripcioncodigo = $this->request->getPost("descripcionCodigo");
        $catalogo_codigo->Fecharegistro = $this->request->getPost("fechaRegistro");
        $catalogo_codigo->Requerimiento = $this->request->getPost("Requerimiento");
        $catalogo_codigo->Idlidertecnico = $this->request->getPost("idLiderTecnico");
        $catalogo_codigo->Idliderfuncional = $this->request->getPost("idLiderFuncional");
        $catalogo_codigo->Idtipocodigo = $this->request->getPost("idTipoCodigo");
        $catalogo_codigo->IdModulo = $this->request->getPost("idModulo");


        if (!$catalogo_codigo->save()) {
            foreach ($catalogo_codigo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "catalogo_codigo",
                            'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("Código Registrado Satisfactoriamente");

        $this->dispatcher->forward([
                        'controller' => "catalogo_codigo",
                        'action' => 'index'
        ]);
    }

    /**
     * Saves a catalogo_codigo edited
     *
     */
    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "catalogo_codigo",
                            'action' => 'index'
            ]);

            return;
        }

        $idCodigo = $this->request->getPost("idCodigo");
        $catalogo_codigo = CatalogoCodigo::findFirstByidCodigo($idCodigo);

        if (!$catalogo_codigo) {
            $this->flash->error("Codigo no Existe" . $idCodigo);

            $this->dispatcher->forward([
                            'controller' => "catalogo_codigo",
                            'action' => 'index'
            ]);

            return;
        }
        
        if ($catalogo_codigo->Valorcodigo != $this->request->getPost("valorCodigo")) {
            if ($this->validarCodigo($this->request->getPost("valorCodigo"))) {
                $this->flash->success("El Código Enviado ya Existe para el tipo de Codigo y Módulo Seleccionado");

                $this->dispatcher->forward([
                                'controller' => "catalogo_codigo",
                                'action' => 'index'
                ]);

                return;
            }
        }

        $catalogo_codigo->Valorcodigo = $this->request->getPost("valorCodigo");
        $catalogo_codigo->Descripcioncodigo = $this->request->getPost("descripcionCodigo");
        $catalogo_codigo->Fecharegistro = $this->request->getPost("fechaRegistro");
        $catalogo_codigo->Requerimiento = $this->request->getPost("Requerimiento");
        $catalogo_codigo->Idlidertecnico = $this->request->getPost("idLiderTecnico");
        $catalogo_codigo->Idliderfuncional = $this->request->getPost("idLiderFuncional");
        $catalogo_codigo->Idtipocodigo = $this->request->getPost("idTipoCodigo");
        $catalogo_codigo->Idmodulo = $this->request->getPost("idModulo");


        if (!$catalogo_codigo->save()) {

            foreach ($catalogo_codigo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "catalogo_codigo",
                            'action' => 'edit',
                            'params' => [$catalogo_codigo->idCodigo]
            ]);

            return;
        }

        $this->flash->success("Código Actualizado Satisfactoriamente");

        $this->dispatcher->forward([
                        'controller' => "catalogo_codigo",
                        'action' => 'index'
        ]);
    }

    /**
     * Deletes a catalogo_codigo
     *
     * @param string $idCodigo
     */
    public function deleteAction($idCodigo) {
        $catalogo_codigo = CatalogoCodigo::findFirstByidCodigo($idCodigo);
        if (!$catalogo_codigo) {
            $this->flash->error("catalogo_codigo was not found");

            $this->dispatcher->forward([
                            'controller' => "catalogo_codigo",
                            'action' => 'index'
            ]);

            return;
        }

        if (!$catalogo_codigo->delete()) {

            foreach ($catalogo_codigo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "catalogo_codigo",
                            'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("Código Eliminado Satisfactoriamente");

        $this->dispatcher->forward([
                        'controller' => "catalogo_codigo",
                        'action' => "index"
        ]);
    }

    public function ajaxPostAction() {
        $this->view->disable();

        if ($this->request->isPost() == true) {
            if ($this->request->isAjax() == true) {
                $idTipoCodigo = $this->request->getPost("idTipoCodigo");
                if ($idTipoCodigo == '') {
                    $this->response->setStatusCode(406,
                                                   "Not Acceptable");
                    return;
                }

                $idModulo = $this->request->getPost("idModulo");
                if ($idModulo == '') {
                    $this->response->setStatusCode(406,
                                                   "Not Acceptable");
                    return;
                }

                $tipocodigo = Tipocodigo::findFirst($idTipoCodigo);
                $longitudCodigo = $tipocodigo->LongitudCodigo;
                if ($longitudCodigo > 0) {
                    $modulo = Modulo::findFirst($idModulo);
                }

                $tipocodigo_modulo = $this->modelsManager->createBuilder()
                                        ->columns("cc.idTipoCodigo," .
                                                                "cc.idModulo," .
                                                                "cc.correlativoModulo")
                                        ->addFrom('TipocodigoModulo',
                                                  'cc')
                                        ->andWhere('cc.idTipoCodigo = :tipo: AND ' .
                                                                'cc.idModulo = :modulo: ',
                                                   [
                                                        'tipo' => $idTipoCodigo,
                                                        'modulo' => $idModulo,
                                                                ]
                                        )
                                        ->getQuery()
                                        ->execute();

                if (count($tipocodigo_modulo) > 0) {
                    foreach ($tipocodigo_modulo as $tupla) {
                        $valor = $tupla->correlativoModulo + 1;
                    }
                }else {
                    $valor = 1;
                }

                $valor = str_pad($valor,
                                 $longitudCodigo,
                                 "0",
                                 STR_PAD_LEFT);
                $valor = $modulo->PrefijoModulo . $valor;

                $this->response->setJsonContent(array('res' => array("codigo" => $valor)));
                $this->response->setStatusCode(200,
                                               "OK");
                $this->response->send();
            }else {
                $this->response->setStatusCode(406,
                                               "Not Acceptable");
            }
        }else {
            $this->response->setStatusCode(404,
                                           "Not Found");
        }
    }

    private function validarCodigo($codigo) {
        
        $catalogo_codigo = $this->modelsManager->createBuilder()
                                        ->columns("cc.idCodigo")
                                        ->addFrom('CatalogoCodigo',
                                                  'cc')
                                        ->andWhere('cc.valorCodigo = :codigo:',
                                                   [
                                                        'codigo' => $codigo,
                                                                ]
                                        )
                                        ->getQuery()
                                        ->execute();
        if (count($catalogo_codigo) > 0){
            return true;
        }else{
            return false;
        }
    }
}