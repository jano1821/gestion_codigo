<?php

class MenuController extends ControllerBase {

    public function indexAction() {
        parent::validarSession();

        /*$query = parent::fromInput( $this->di,
                                    'Tipocodigo',
                                    ['estadoRegistro' => 'S']
                                    );
        $this->persistent->searchParams = $query->getParams();
        
        if ($this->persistent->searchParams) {
            $tipocodigo = Tipocodigo::find($this->persistent->searchParams);
            //$this->view->menu = $tipocodigo;
        }else {*/
            $this->view->menu = "";
        //}
    }

    /**
     * Searches for menu
     */
    public function menuPrincipalAction() {
        parent::validarSession();
    }
}