<?php

use Phalcon\Paginator\Adapter\Model as Paginator;
class CatalogoCodigoController extends ControllerBase {

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

        $liderTecnico = Persona::find($this->persistent->liderTecnico);

        $liderFuncional = Persona::find($this->persistent->liderFuncional);
        
        $modulo = Modulo::find($this->persistent->modulo);

        $this->view->tipoCodigo = $tipocodigo;
        $this->view->liderTecnico = $liderTecnico;
        $this->view->liderFuncional = $liderFuncional;
        $this->view->modulo = $modulo;
    }

    /**
     * Searches for catalogo_codigo
     */
    public function searchAction() {
        $numberPage = 1;
        if (!$this->request->isPost()) {
            $numberPage = $this->request->getQuery("page",
                                                   "int");
        }

        $valorcodigo = $this->request->getPost("valorCodigo");
        $descripcioncodigo = $this->request->getPost("descripcionCodigo");
        $requerimiento = $this->request->getPost("Requerimiento");
        $lidertecnico = $this->request->getPost("idLiderTecnico");
        $liderfuncional = $this->request->getPost("idLiderFuncional");
        $tipocodigo = $this->request->getPost("idTipoCodigo");
        $modulo = $this->request->getPost("idModulo");
        
        $catalogo_codigo = $this->modelsManager->createBuilder()
                                ->columns("cc.idCodigo,".
                                          "cc.valorCodigo,".
                                          "cc.descripcionCodigo,".
                                          "DATE_FORMAT(cc.fechaRegistro, '%d/%m/%Y') fechaRegistro,".
                                          "cc.requerimiento requerimiento,".
                                          "lt.nombrePersona liderTecnico,".
                                          "lf.nombrePersona liderFuncional,".
                                          "tc.descripcionTipo,".
                                          "mo.descripcionModulo")
                                ->addFrom('CatalogoCodigo','cc')
                                ->innerJoin('Tipocodigo','tc.idTipoCodigo = cc.idTipoCodigo','tc')
                                ->innerJoin('Persona','lt.idpersona = cc.idLiderTecnico','lt')
                                ->innerJoin('Persona', 'lf.idpersona = cc.idLiderFuncional','lf')
                                ->innerJoin('Modulo', 'mo.idModulo = cc.idModulo','mo')
                                ->andWhere('cc.valorCodigo like :valor: AND '.
                                           'cc.descripcionCodigo like :descripcion: AND '.
                                           'cc.requerimiento like :requerimiento: AND '.
                                           'cc.idLiderTecnico like :tecnico: AND '.
                                           'cc.idLiderFuncional like :funcional: AND '.
                                           'cc.idTipoCodigo like :tipo: AND '.
                                           'cc.idModulo like :modulo: ',
                                    [
                                        'valor'         => "%".$valorcodigo."%",
                                        'descripcion'   => "%".$descripcioncodigo."%",
                                        'requerimiento' => "%".$requerimiento."%",
                                        'tecnico'       => "%".$lidertecnico."%",
                                        'funcional'     => "%".$liderfuncional."%",
                                        'tipo'          => "%".$tipocodigo."%",
                                        'modulo'        => "%".$modulo."%",
                                    ]
                                )
                                ->orderBy('cc.valorCodigo')
                                ->getQuery()
                                ->execute();
        
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

        $liderTecnico = Persona::find($this->persistent->liderTecnico);

        $liderFuncional = Persona::find($this->persistent->liderFuncional);
        
        $modulo = Modulo::find($this->persistent->modulo);

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

            $liderTecnico = Persona::find($this->persistent->liderTecnico);

            $liderFuncional = Persona::find($this->persistent->liderFuncional);
            
            $modulo = Modulo::find($this->persistent->modulo);

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
    
    public function ajaxAction() {
        $this->view->disable();
        if ($this->request->isGet() == true) {
            if ($this->request->isAjax() == true) {
                $this->response->setJsonContent(array('res' => array("1", "2", "3")));
                $this->response->setStatusCode(200,
                                               "OK");
                $this->response->send();
            }
        }else {
            $this->response->setStatusCode(404,
                                           "Not Found");
        }
    }

    public function ajaxPostAction() {
        $this->view->disable();

        if ($this->request->isPost() == true) {
            if ($this->request->isAjax() == true) {
                //los datos quedan limpios automáticamente
                /*$email = $this->request->getPost("email",
                                                 "email");
                $password = $this->request->getPost('password',
                                                    array('striptags', 'alphanum', 'trim'));*/
                $this->response->setJsonContent(array('res' => array("email" => "jano18_21@hotmail.com", "password" => "123abc$$")));
                $this->response->setStatusCode(200,
                                               "OK");
                $this->response->send();
            }
        }else {
            $this->response->setStatusCode(404,
                                           "Not Found");
        }
    }
}