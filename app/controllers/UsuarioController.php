<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
class UsuarioController extends ControllerBase {

    /**
     * Index action
     */
    public function indexAction() {
        parent::validarSession();
        $this->persistent->parameters = null;
    }

    /**
     * Searches for usuario
     */
    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di,
                                         'Usuario',
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
        $parameters["order"] = "idUsuario";

        $usuario = Usuario::find($parameters);
        if (count($usuario) == 0) {
            $this->flash->notice("La Búsqueda no Encontró Resultados");

            $this->dispatcher->forward([
                            "controller" => "usuario",
                            "action" => "index"
            ]);

            return;
        }else{
            $listBeanUsuario = array();
            
            foreach ($usuario as $tupla) {
                $beanUsuario = new BeanUsuario();
                $beanUsuario->setIdUsuario($tupla->getIdUsuario());
                $beanUsuario->setUserName($tupla->getUserName());
                $beanUsuario->setPassword("***********************************");
                $beanUsuario->setEstadoRegistro($tupla->getEstadoRegistro());
                
                array_push($listBeanUsuario,
                           $beanUsuario);
            }
        }

        $paginator = new Paginator([
                        'data' => $usuario,
                        'limit' => 10,
                        'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
        $this->view->listBeanUsuario = $listBeanUsuario;
    }

    /**
     * Displays the creation form
     */
    public function newAction() {
        
    }

    /**
     * Edits a usuario
     *
     * @param string $idUsuario
     */
    public function editAction($idUsuario) {
        if (!$this->request->isPost()) {

            $usuario = Usuario::findFirstByidUsuario($idUsuario);
            if (!$usuario) {
                $this->flash->error("Usuario no Encontrado");

                $this->dispatcher->forward([
                                'controller' => "usuario",
                                'action' => 'index'
                ]);

                return;
            }

            $this->view->idUsuario = $usuario->idUsuario;

            $this->tag->setDefault("idUsuario",
                                   $usuario->idUsuario);
            $this->tag->setDefault("userName",
                                   $usuario->userName);
            $this->tag->setDefault("password",
                                   $usuario->password);
            $this->tag->setDefault("estadoRegistro",
                                   $usuario->estadoRegistro);
        }
    }

    /**
     * Creates a new usuario
     */
    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'index'
            ]);

            return;
        }

        $usuario = new Usuario();
        $usuario->Username = $this->request->getPost("userName");
        
        $usuario->Estadoregistro = $this->request->getPost("estadoRegistro");

        $clave = base64_encode('Vamos_por_mas_tfc');
        $pasword = password_hash($this->request->getPost("password"),PASSWORD_BCRYPT, array("cost" => 12, "salt" => $clave));

        $usuario->Password = $pasword;

        if (!$usuario->save()) {
            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("usuario was created successfully");

        $this->dispatcher->forward([
                        'controller' => "usuario",
                        'action' => 'index'
        ]);
    }

    /**
     * Saves a usuario edited
     *
     */
    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'index'
            ]);

            return;
        }

        $idUsuario = $this->request->getPost("idUsuario");
        $usuario = Usuario::findFirstByidUsuario($idUsuario);

        if (!$usuario) {
            $this->flash->error("Usuario no Existe" . $idUsuario);

            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'index'
            ]);

            return;
        }

        $usuario->Username = $this->request->getPost("userName");
        $usuario->Password = $this->request->getPost("password");
        $usuario->Estadoregistro = $this->request->getPost("estadoRegistro");


        if (!$usuario->save()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'edit',
                            'params' => [$usuario->idUsuario]
            ]);

            return;
        }

        $this->flash->success("Usuario Actualizado Satisfactoriamente");

        $this->dispatcher->forward([
                        'controller' => "usuario",
                        'action' => 'index'
        ]);
    }

    /**
     * Deletes a usuario
     *
     * @param string $idUsuario
     */
    public function deleteAction($idUsuario) {
        $usuario = Usuario::findFirstByidUsuario($idUsuario);
        if (!$usuario) {
            $this->flash->error("Usuario no Encontrado");

            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'index'
            ]);

            return;
        }

        if (!$usuario->delete()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("Usuario eliminado satisfactoriamente");

        $this->dispatcher->forward([
                        'controller' => "usuario",
                        'action' => "index"
        ]);
    }
}