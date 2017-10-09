<?php

class CatalogoCodigo extends \Phalcon\Mvc\Model {
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idCodigo;
    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    public $valorCodigo;
    /**
     *
     * @var string
     * @Column(type="string", length=2000, nullable=true)
     */
    public $descripcionCodigo;
    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $fechaRegistro;
    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    public $requerimiento;
    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idLiderTecnico;
    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idLiderFuncional;
    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idTipoCodigo;
    /**
     *
     * @var integer
     * @column(type="integer", length=11, nullable=false)
     */
    public $idModulo;

    /**
     * Method to set the value of field idCodigo
     *
     * @param integer $idCodigo
     * @return $this
     */
    public function setIdCodigo($idCodigo) {
        $this->idCodigo = $idCodigo;

        return $this;
    }

    /**
     * Method to set the value of field valorCodigo
     *
     * @param string $valorCodigo
     * @return $this
     */
    public function setValorCodigo($valorCodigo) {
        $this->valorCodigo = $valorCodigo;

        return $this;
    }

    /**
     * Method to set the value of field descripcionCodigo
     *
     * @param string $descripcionCodigo
     * @return $this
     */
    public function setDescripcionCodigo($descripcionCodigo) {
        $this->descripcionCodigo = $descripcionCodigo;

        return $this;
    }

    /**
     * Method to set the value of field fechaRegistro
     *
     * @param string $fechaRegistro
     * @return $this
     */
    public function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Method to set the value of field requerimiento
     *
     * @param string $requerimiento
     * @return $this
     */
    public function setRequerimiento($requerimiento) {
        $this->requerimiento = $requerimiento;

        return $this;
    }

    /**
     * Method to set the value of field idLiderTecnico
     *
     * @param integer $idLiderTecnico
     * @return $this
     */
    public function setIdLiderTecnico($idLiderTecnico) {
        $this->idLiderTecnico = $idLiderTecnico;

        return $this;
    }

    /**
     * Method to set the value of field idLiderFuncional
     *
     * @param integer $idLiderFuncional
     * @return $this
     */
    public function setIdLiderFuncional($idLiderFuncional) {
        $this->idLiderFuncional = $idLiderFuncional;

        return $this;
    }

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

    public function setIdModulo($idModulo) {
        $this->idModulo = $idModulo;

        return $idModulo;
    }

    /**
     * Returns the value of field idCodigo
     *
     * @return integer
     */
    public function getIdCodigo() {
        return $this->idCodigo;
    }

    /**
     * Returns the value of field valorCodigo
     *
     * @return string
     */
    public function getValorCodigo() {
        return $this->valorCodigo;
    }

    /**
     * Returns the value of field descripcionCodigo
     *
     * @return string
     */
    public function getDescripcionCodigo() {
        return $this->descripcionCodigo;
    }

    /**
     * Returns the value of field fechaRegistro
     *
     * @return string
     */
    public function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    /**
     * Returns the value of field requerimiento
     *
     * @return string
     */
    public function getRequerimiento() {
        return $this->requerimiento;
    }

    /**
     * Returns the value of field idLiderTecnico
     *
     * @return integer
     */
    public function getIdLiderTecnico() {
        return $this->idLiderTecnico;
    }

    /**
     * Returns the value of field idLiderFuncional
     *
     * @return integer
     */
    public function getIdLiderFuncional() {
        return $this->idLiderFuncional;
    }

    /**
     * Returns the value of field idTipoCodigo
     *
     * @return integer
     */
    public function getIdTipoCodigo() {
        return $this->idTipoCodigo;
    }

    public function getIdModulo() {
        return $this->idModulo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("manco");
        $this->setSource("catalogo_codigo");
        $this->belongsTo('idLiderTecnico',
                         '\Persona',
                         'idpersona',
                         ['alias' => 'Persona']);
        $this->belongsTo('idLiderFuncional',
                         '\Persona',
                         'idpersona',
                         ['alias' => 'Persona']);
        $this->belongsTo('idTipoCodigo',
                         '\Tipocodigo',
                         'idTipoCodigo',
                         ['alias' => 'Tipocodigo']);
        $this->belongsTo('idModulo',
                         '\Modulo',
                         'idModulo',
                         ['alias' => 'Modulo']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CatalogoCodigo[]|CatalogoCodigo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CatalogoCodigo|\Phalcon\Mvc\Model\ResultInterface
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
                        'idCodigo' => 'idCodigo',
                        'valorCodigo' => 'valorCodigo',
                        'descripcionCodigo' => 'descripcionCodigo',
                        'fechaRegistro' => 'fechaRegistro',
                        'requerimiento' => 'requerimiento',
                        'idLiderTecnico' => 'idLiderTecnico',
                        'idLiderFuncional' => 'idLiderFuncional',
                        'idTipoCodigo' => 'idTipoCodigo',
                        'idModulo' => 'idModulo'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'catalogo_codigo';
    }
}