<?php

use Phalcon\Paginator\Adapter\Model as Paginator;
class ModuloController extends ControllerBase {

    /**
     * Index action
     */
    public function indexAction() {
        parent::validarSession();
        $this->persistent->parameters = null;
    }

    /**
     * Searches for modulo
     */
    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = parent::fromInput($this->di,
                                       'Modulo',
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
        $parameters["order"] = "idModulo";

        $modulo = Modulo::find($parameters);
        if (count($modulo) == 0) {
            $this->flash->notice("La Búsqueda no Encontró Resultados");

            $this->dispatcher->forward([
                            "controller" => "modulo",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $modulo,
                        'limit' => 10,
                        'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction() {
        
    }

    /**
     * Edits a modulo
     *
     * @param string $idModulo
     */
    public function editAction($idModulo) {
        if (!$this->request->isPost()) {

            $modulo = Modulo::findFirstByidModulo($idModulo);
            if (!$modulo) {
                $this->flash->error("modulo was not found");

                $this->dispatcher->forward([
                                'controller' => "modulo",
                                'action' => 'index'
                ]);

                return;
            }

            $this->view->idModulo = $modulo->idModulo;

            $this->tag->setDefault("idModulo",
                                   $modulo->idModulo);
            $this->tag->setDefault("PrefijoModulo",
                                   $modulo->PrefijoModulo);
            $this->tag->setDefault("correlativoModulo",
                                   $modulo->correlativoModulo);
            $this->tag->setDefault("descripcionModulo",
                                   $modulo->descripcionModulo);
            $this->tag->setDefault("fechaRegistro",
                                   date_format(new DateTime($modulo->fechaRegistro),
                                                            'Y-m-d'));
            $this->tag->setDefault("estadoRegistro",
                                   $modulo->estadoRegistro);
        }
    }

    /**
     * Creates a new modulo
     */
    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "modulo",
                            'action' => 'index'
            ]);

            return;
        }

        $modulo = new Modulo();
        $modulo->Prefijomodulo = $this->request->getPost("PrefijoModulo");
        $modulo->Correlativomodulo = $this->request->getPost("correlativoModulo");
        $modulo->Descripcionmodulo = $this->request->getPost("descripcionModulo");
        $modulo->Fecharegistro = $this->request->getPost("fechaRegistro");
        $modulo->Estadoregistro = $this->request->getPost("estadoRegistro");

        if (!$modulo->save()) {
            foreach ($modulo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "modulo",
                            'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("Módulo Registrado Satisfactoriamente");

        $this->dispatcher->forward([
                        'controller' => "modulo",
                        'action' => 'index'
        ]);
    }

    /**
     * Saves a modulo edited
     *
     */
    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "modulo",
                            'action' => 'index'
            ]);

            return;
        }

        $idModulo = $this->request->getPost("idModulo");
        $modulo = Modulo::findFirstByidModulo($idModulo);

        if (!$modulo) {
            $this->flash->error("Módulo no Existe " . $idModulo);

            $this->dispatcher->forward([
                            'controller' => "modulo",
                            'action' => 'index'
            ]);

            return;
        }

        $modulo->Prefijomodulo = $this->request->getPost("PrefijoModulo");
        $modulo->Correlativomodulo = $this->request->getPost("correlativoModulo");
        $modulo->Descripcionmodulo = $this->request->getPost("descripcionModulo");
        $modulo->Fecharegistro = $this->request->getPost("fechaRegistro");
        $modulo->Estadoregistro = $this->request->getPost("estadoRegistro");


        if (!$modulo->save()) {

            foreach ($modulo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "modulo",
                            'action' => 'edit',
                            'params' => [$modulo->idModulo]
            ]);

            return;
        }

        $this->flash->success("Módulo de ha Actualizado satisfactoriamente");

        $this->dispatcher->forward([
                        'controller' => "modulo",
                        'action' => 'index'
        ]);
    }

    /**
     * Deletes a modulo
     *
     * @param string $idModulo
     */
    public function deleteAction($idModulo) {
        $modulo = Modulo::findFirstByidModulo($idModulo);
        if (!$modulo) {
            $this->flash->error("modulo was not found");

            $this->dispatcher->forward([
                            'controller' => "modulo",
                            'action' => 'index'
            ]);

            return;
        }

        if (!$modulo->delete()) {

            foreach ($modulo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "modulo",
                            'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("modulo was deleted successfully");

        $this->dispatcher->forward([
                        'controller' => "modulo",
                        'action' => "index"
        ]);
    }
}