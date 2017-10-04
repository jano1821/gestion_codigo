<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class TipocodigoController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        parent::validarSession();
        $this->persistent->parameters = null;
    }

    /**
     * Searches for tipocodigo
     */
    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Parent::fromInput($this->di, 'Tipocodigo', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "idTipoCodigo";

        $tipocodigo = Tipocodigo::find($parameters);
        if (count($tipocodigo) == 0) {
            $this->flash->notice("No se Encontraron Resultados en la Búsqueda");

            $this->dispatcher->forward([
                "controller" => "tipocodigo",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $tipocodigo,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a tipocodigo
     *
     * @param string $idTipoCodigo
     */
    public function editAction($idTipoCodigo)
    {
        if (!$this->request->isPost()) {

            $tipocodigo = Tipocodigo::findFirstByidTipoCodigo($idTipoCodigo);
            if (!$tipocodigo) {
                $this->flash->error("Tipo de Código no Encontrado");

                $this->dispatcher->forward([
                    'controller' => "tipocodigo",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->idTipoCodigo = $tipocodigo->idTipoCodigo;

            $this->tag->setDefault("idTipoCodigo", $tipocodigo->idTipoCodigo);
            $this->tag->setDefault("descripcionTipo", $tipocodigo->descripcionTipo);
            $this->tag->setDefault("longitudCodigo", $tipocodigo->longitudCodigo);
            $this->tag->setDefault("estadoRegistro", $tipocodigo->estadoRegistro);
            
        }
    }

    /**
     * Creates a new tipocodigo
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "tipocodigo",
                'action' => 'index'
            ]);

            return;
        }

        $tipocodigo = new Tipocodigo();
        $tipocodigo->Descripciontipo = $this->request->getPost("descripcionTipo");
        $tipocodigo->Estadoregistro = $this->request->getPost("estadoRegistro");
        $tipocodigo->LongitudCodigo = $this->request->getPost("longitudCodigo");
        

        if (!$tipocodigo->save()) {
            foreach ($tipocodigo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "tipocodigo",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("Tipo de Código se Registró Satisfactoriamente");

        $this->dispatcher->forward([
            'controller' => "tipocodigo",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a tipocodigo edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "tipocodigo",
                'action' => 'index'
            ]);

            return;
        }

        $idTipoCodigo = $this->request->getPost("idTipoCodigo");
        $tipocodigo = Tipocodigo::findFirstByidTipoCodigo($idTipoCodigo);

        if (!$tipocodigo) {
            $this->flash->error("Tipo de Código no Existe " . $idTipoCodigo);

            $this->dispatcher->forward([
                'controller' => "tipocodigo",
                'action' => 'index'
            ]);

            return;
        }

        $tipocodigo->Descripciontipo = $this->request->getPost("descripcionTipo");
        $tipocodigo->LongitudCodigo = $this->request->getPost("longitudCodigo");
        $tipocodigo->Estadoregistro = $this->request->getPost("estadoRegistro");
        

        if (!$tipocodigo->save()) {

            foreach ($tipocodigo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "tipocodigo",
                'action' => 'edit',
                'params' => [$tipocodigo->idTipoCodigo]
            ]);

            return;
        }

        $this->flash->success("Tipo de código se Actualizó Satisfactoriamente");

        $this->dispatcher->forward([
            'controller' => "tipocodigo",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a tipocodigo
     *
     * @param string $idTipoCodigo
     */
    public function deleteAction($idTipoCodigo)
    {
        $tipocodigo = Tipocodigo::findFirstByidTipoCodigo($idTipoCodigo);
        if (!$tipocodigo) {
            $this->flash->error("tipocodigo was not found");

            $this->dispatcher->forward([
                'controller' => "tipocodigo",
                'action' => 'index'
            ]);

            return;
        }

        if (!$tipocodigo->delete()) {

            foreach ($tipocodigo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "tipocodigo",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("tipocodigo was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "tipocodigo",
            'action' => "index"
        ]);
    }

}
