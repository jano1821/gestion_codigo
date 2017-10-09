<?php

use Phalcon\Paginator\Adapter\Model as Paginator;
class PersonaController extends ControllerBase {

    public function indexAction() {
        parent::validarSession();

        $cargo = Cargo::find();

        $this->view->cargo = $cargo;
    }

    /**
     * Searches for persona
     */
    public function searchAction() {
        $numberPage = 1;
        echo $this->request->getPost("page");
        if (!$this->request->isPost()) {
            $numberPage = $this->request->getQuery("page",
                                                   "int");
        }

        $nombrepersona = $this->request->getPost("nombrePersona");
        $idcargo = $this->request->getPost("idCargo");
        
        $persona = $this->modelsManager->createBuilder()
                                ->columns("pe.nombrePersona nombrePersona,".
                                          "ca.descripcionCargo descripcionCargo,".
                                          "pe.idpersona idpersona")
                                ->addFrom('Persona','pe')
                                ->innerJoin('Cargo','pe.idCargo = ca.idCargo','ca')
                                ->andWhere('pe.nombrePersona like :nombrePersona: AND '.
                                           'ca.descripcionCargo like :descripcionCargo: ',
                                    [
                                        'nombrePersona'         => "%".$nombrepersona."%",
                                        'descripcionCargo'   => "%".$idcargo."%",
                                    ]
                                )
                                ->orderBy('pe.nombrePersona')
                                ->getQuery()
                                ->execute();

        if (count($persona) == 0) {
            $this->flash->notice("No se Encontraron Resultados para esta Búsqueda");

            $this->dispatcher->forward([
                            "controller" => "persona",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $persona,
                        'limit' => 10,
                        'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction() {
        $cargo = Cargo::find();

        $this->view->cargo = $cargo;
    }

    /**
     * Edits a persona
     *
     * @param string $idpersona
     */
    public function editAction($idpersona) {
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

            $cargo = Cargo::find();

            $this->view->cargo = $cargo;

            $this->view->idpersona = $persona->idpersona;

            $this->tag->setDefault("idpersona",
                                   $persona->idpersona);
            $this->tag->setDefault("nombrePersona",
                                   $persona->nombrePersona);
            $this->tag->setDefault("idCargo",
                                   $persona->idCargo);
        }
    }

    /**
     * Creates a new persona
     */
    public function createAction() {
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
    public function saveAction() {

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
    public function deleteAction($idpersona) {
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