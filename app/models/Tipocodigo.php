<?php

class Tipocodigo extends \Phalcon\Mvc\Model {
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idTipoCodigo;
    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=false)
     */
    public $descripcionTipo;
    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=true)
     */
    public $estadoRegistro;
    /**
     *
     * @var integer
     * @column(type="integer", length=11, nullable=false)
     */
    public $longitudCodigo;

    /**
     * Method to set the value of field idTipoCodigo
     *
     * @param integer $idTipoCodigo
     * @return $this
     */
    public function setIdTipoCodigo($idTipoCodigo) {
        $this->idTipoCodigo = $idTipoCodigo;

        return $this;
    }

    /**
     * Method to set the value of field descripcionTipo
     *
     * @param string $descripcionTipo
     * @return $this
     */
    public function setDescripcionTipo($descripcionTipo) {
        $this->descripcionTipo = $descripcionTipo;

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

    public function setLongitudCodigo($longitudCodigo) {
        $this->longitudCodigo = $longitudCodigo;

        return $this;
    }

    /**
     * Returns the value of field idTipoCodigo
     *
     * @return integer
     */
    public function getIdTipoCodigo() {
        return $this->idTipoCodigo;
    }

    /**
     * Returns the value of field descripcionTipo
     *
     * @return string
     */
    public function getDescripcionTipo() {
        return $this->descripcionTipo;
    }

    /**
     * Returns the value of field estadoRegistro
     *
     * @return string
     */
    public function getEstadoRegistro() {
        return $this->estadoRegistro;
    }

    public function getLongitudCodigo() {
        return $this->longitudCodigo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("manco");
        $this->setSource("tipocodigo");
        $this->hasMany('idTipoCodigo',
                       'CatalogoCodigo',
                       'idTipoCodigo',
                       ['alias' => 'CatalogoCodigo']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tipocodigo[]|Tipocodigo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tipocodigo|\Phalcon\Mvc\Model\ResultInterface
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
                        'idTipoCodigo' => 'idTipoCodigo',
                        'descripcionTipo' => 'descripcionTipo',
                        'estadoRegistro' => 'estadoRegistro',
                        'longitudCodigo' => 'longitudCodigo'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'tipocodigo';
    }
}