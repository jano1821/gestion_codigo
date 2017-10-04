<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class CargoController extends ControllerBase
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
     * Searches for cargo
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Cargo', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "idCargo";

        $cargo = Cargo::find($parameters);
        if (count($cargo) == 0) {
            $this->flash->notice("The search did not find any cargo");

            $this->dispatcher->forward([
                "controller" => "cargo",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $cargo,
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
     * Edits a cargo
     *
     * @param string $idCargo
     */
    public function editAction($idCargo)
    {
        if (!$this->request->isPost()) {

            $cargo = Cargo::findFirstByidCargo($idCargo);
            if (!$cargo) {
                $this->flash->error("cargo was not found");

                $this->dispatcher->forward([
                    'controller' => "cargo",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->idCargo = $cargo->idCargo;

            $this->tag->setDefault("idCargo", $cargo->idCargo);
            $this->tag->setDefault("descripcionCargo", $cargo->descripcionCargo);
            
        }
    }

    /**
     * Creates a new cargo
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "cargo",
                'action' => 'index'
            ]);

            return;
        }

        $cargo = new Cargo();
        $cargo->Descripcioncargo = $this->request->getPost("descripcionCargo");
        

        if (!$cargo->save()) {
            foreach ($cargo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "cargo",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("cargo was created successfully");

        $this->dispatcher->forward([
            'controller' => "cargo",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a cargo edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "cargo",
                'action' => 'index'
            ]);

            return;
        }

        $idCargo = $this->request->getPost("idCargo");
        $cargo = Cargo::findFirstByidCargo($idCargo);

        if (!$cargo) {
            $this->flash->error("cargo does not exist " . $idCargo);

            $this->dispatcher->forward([
                'controller' => "cargo",
                'action' => 'index'
            ]);

            return;
        }

        $cargo->Descripcioncargo = $this->request->getPost("descripcionCargo");
        

        if (!$cargo->save()) {

            foreach ($cargo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "cargo",
                'action' => 'edit',
                'params' => [$cargo->idCargo]
            ]);

            return;
        }

        $this->flash->success("cargo was updated successfully");

        $this->dispatcher->forward([
            'controller' => "cargo",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a cargo
     *
     * @param string $idCargo
     */
    public function deleteAction($idCargo)
    {
        $cargo = Cargo::findFirstByidCargo($idCargo);
        if (!$cargo) {
            $this->flash->error("cargo was not found");

            $this->dispatcher->forward([
                'controller' => "cargo",
                'action' => 'index'
            ]);

            return;
        }

        if (!$cargo->delete()) {

            foreach ($cargo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "cargo",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("cargo was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "cargo",
            'action' => "index"
        ]);
    }

}
