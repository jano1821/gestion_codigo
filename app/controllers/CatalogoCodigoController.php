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

        $this->view->tipoCodigo = $tipocodigo;
        $this->view->liderTecnico = $liderTecnico;
        $this->view->liderFuncional = $liderFuncional;
    }

    /**
     * Searches for catalogo_codigo
     */
    public function searchAction() {
        $numberPage = 1;
        $descripcion = '';
        $nombreLiderTecnico = '';
        $nombreLiderFuncional = '';
        if ($this->request->isPost()) {
            $query = parent::fromInput($this->di,
                                       'CatalogoCodigo',
                                       $_POST);
            $this->persistent->parameters = $query->getParams();
        }else {
            $numberPage = $this->request->getQuery("page",
                                                   "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "idCodigo desc";

        $catalogo_codigo = CatalogoCodigo::find($parameters);
        if (count($catalogo_codigo) == 0) {
            $this->flash->notice("La Búqueda no ha Obtenido Resultados");

            $this->dispatcher->forward([
                            "controller" => "catalogo_codigo",
                            "action" => "index"
            ]);

            return;
        }else {
            $listBeanCatalogoCodigo = array();
            foreach ($catalogo_codigo as $codigo) {
                $beanCatalogoCodigo = new BeanCatalogoCodigo();

                $date = new DateTime($codigo->getFechaRegistro());

                $beanCatalogoCodigo->setIdCodigo($codigo->getIdCodigo());
                $beanCatalogoCodigo->setValorCodigo($codigo->getValorCodigo());
                $beanCatalogoCodigo->setDescripcionCodigo($codigo->getDescripcionCodigo());
                $beanCatalogoCodigo->setFechaRegistro($date->format('d/m/Y'));
                $beanCatalogoCodigo->setRequerimiento($codigo->getRequerimiento());
                $beanCatalogoCodigo->setIdLiderTecnico($codigo->getIdLiderTecnico());
                $beanCatalogoCodigo->setIdLiderFuncional($codigo->getIdLiderFuncional());
                $beanCatalogoCodigo->setIdTipoCodigo($codigo->getIdTipoCodigo());

                $tipocodigo = Tipocodigo::find($codigo->getIdTipoCodigo());
                foreach ($tipocodigo as $tupla) {
                    $descripcion = $tupla->getDescripcionTipo();
                }
                $beanCatalogoCodigo->setDescripcionTipoProducto($descripcion);

                $liderTecnico = Persona::find($codigo->getIdLiderTecnico());
                foreach ($liderTecnico as $tupla) {
                    $nombreLiderTecnico = $tupla->getNombrePersona();
                }

                $beanCatalogoCodigo->setNombreLiderTecnico($nombreLiderTecnico);

                $liderFuncional = Persona::find($codigo->getIdLiderFuncional());
                foreach ($liderFuncional as $tupla) {
                    $nombreLiderFuncional = $tupla->getNombrePersona();
                }

                $beanCatalogoCodigo->setNombreLiderfuncional($nombreLiderFuncional);

                array_push($listBeanCatalogoCodigo,
                           $beanCatalogoCodigo);
            }
        }

        $paginator = new Paginator([
                        'data' => $catalogo_codigo,
                        'limit' => 10,
                        'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
        $this->view->listBeanCatalogoCodigo = $listBeanCatalogoCodigo;
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

        $this->view->tipoCodigo = $tipocodigo;
        $this->view->liderTecnico = $liderTecnico;
        $this->view->liderFuncional = $liderFuncional;
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

            $this->view->tipoCodigo = $tipocodigo;
            $this->view->liderTecnico = $liderTecnico;
            $this->view->liderFuncional = $liderFuncional;

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
                                   $catalogo_codigo->Requerimiento);
            $this->tag->setDefault("idLiderTecnico",
                                   $catalogo_codigo->idLiderTecnico);
            $this->tag->setDefault("idLiderFuncional",
                                   $catalogo_codigo->idLiderFuncional);
            $this->tag->setDefault("idTipoCodigo",
                                   $catalogo_codigo->idTipoCodigo);
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
            $this->flash->error("catalogo_codigo does not exist " . $idCodigo);

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

        $this->flash->success("catalogo_codigo was updated successfully");

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

        $this->flash->success("catalogo_codigo was deleted successfully");

        $this->dispatcher->forward([
                        'controller' => "catalogo_codigo",
                        'action' => "index"
        ]);
    }
}