<?php

class Usuario extends \Phalcon\Mvc\Model {
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idUsuario;
    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    public $userName;
    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $password;
    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=true)
     */
    public $estadoRegistro;

    /**
     * Method to set the value of field idUsuario
     *
     * @param integer $idUsuario
     * @return $this
     */
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Method to set the value of field userName
     *
     * @param string $userName
     * @return $this
     */
    public function setUserName($userName) {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Method to set the value of field estadoRegistro
     *
     * @param string $estadoRegistro
     * @return $this
     */
    public function setEstadoRegistro($estadoRegistro) {
        $this->estadoRegistro = $estadoRegistro;

        return $this;
    }

    /**
     * Returns the value of field idUsuario
     *
     * @return integer
     */
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    /**
     * Returns the value of field userName
     *
     * @return string
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Returns the value of field estadoRegistro
     *
     * @return string
     */
    public function getEstadoRegistro() {
        return $this->estadoRegistro;
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("manco");
        $this->setSource("usuario");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario[]|Usuario|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap() {
        return [
                        'idUsuario' => 'idUsuario',
                        'userName' => 'userName',
                        'password' => 'password',
                        'estadoRegistro' => 'estadoRegistro'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'usuario';
    }
}