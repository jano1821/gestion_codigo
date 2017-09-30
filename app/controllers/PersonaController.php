<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class PersonaController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for persona
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Persona', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "idpersona";

        $persona = Persona::find($parameters);
        if (count($persona) == 0) {
            $this->flash->notice("The search did not find any persona");

            $this->dispatcher->forward([
                "controller" => "persona",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $persona,
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
     * Edits a persona
     *
     * @param string $idpersona
     */
    public function editAction($idpersona)
    {
        if (!$this->request->isPost()) {

            $persona = Persona::findFirstByidpersona($idpersona);
            if (!$persona) {
                $this->flash->error("persona was not found");

                $this->dispatcher->forward([
                    'controller' => "persona",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->idpersona = $persona->idpersona;

            $this->tag->setDefault("idpersona", $persona->idpersona);
            $this->tag->setDefault("nombrePersona", $persona->nombrePersona);
            $this->tag->setDefault("idCargo", $persona->idCargo);
            
        }
    }

    /**
     * Creates a new persona
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "persona",
                'action' => 'index'
            ]);

            return;
        }

        $persona = new Persona();
        $persona->Nombrepersona = $this->request->getPost("nombrePersona");
        $persona->Idcargo = $this->request->getPost("idCargo");
        

        if (!$persona->save()) {
            foreach ($persona->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "persona",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("persona was created successfully");

        $this->dispatcher->forward([
            'controller' => "persona",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a persona edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "persona",
                'action' => 'index'
            ]);

            return;
        }

        $idpersona = $this->request->getPost("idpersona");
        $persona = Persona::findFirstByidpersona($idpersona);

        if (!$persona) {
            $this->flash->error("persona does not exist " . $idpersona);

            $this->dispatcher->forward([
                'controller' => "persona",
                'action' => 'index'
            ]);

            return;
        }

        $persona->Nombrepersona = $this->request->getPost("nombrePersona");
        $persona->Idcargo = $this->request->getPost("idCargo");
        

        if (!$persona->save()) {

            foreach ($persona->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "persona",
                'action' => 'edit',
                'params' => [$persona->idpersona]
            ]);

            return;
        }

        $this->flash->success("persona was updated successfully");

        $this->dispatcher->forward([
            'controller' => "persona",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a persona
     *
     * @param string $idpersona
     */
    public function deleteAction($idpersona)
    {
        $persona = Persona::findFirstByidpersona($idpersona);
        if (!$persona) {
            $this->flash->error("persona was not found");

            $this->dispatcher->forward([
                'controller' => "persona",
                'action' => 'index'
            ]);

            return;
        }

        if (!$persona->delete()) {

            foreach ($persona->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "persona",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("persona was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "persona",
            'action' => "index"
        ]);
    }

}
