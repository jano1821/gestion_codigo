<?php

class TipocodigoModulo extends \Phalcon\Mvc\Model {
    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idTipoCodigo;
    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idModulo;
    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $correlativoModulo;

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
     * Method to set the value of field idModulo
     *
     * @param integer $idModulo
     * @return $this
     */
    public function setIdModulo($idModulo) {
        $this->idModulo = $idModulo;

        return $this;
    }

    /**
     * Method to set the value of field correlativoModulo
     *
     * @param integer $correlativoModulo
     * @return $this
     */
    public function setCorrelativoModulo($correlativoModulo) {
        $this->correlativoModulo = $correlativoModulo;

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
     * Returns the value of field idModulo
     *
     * @return integer
     */
    public function getIdModulo() {
        return $this->idModulo;
    }

    /**
     * Returns the value of field correlativoModulo
     *
     * @return integer
     */
    public function getCorrelativoModulo() {
        return $this->correlativoModulo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("manco");
        $this->setSource("tipocodigo_modulo");
        $this->belongsTo('idModulo',
                         '\Modulo',
                         'idModulo',
                         ['alias' => 'Modulo']);
        $this->belongsTo('idTipoCodigo',
                         '\Tipocodigo',
                         'idTipoCodigo',
                         ['alias' => 'Tipocodigo']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipocodigoModulo[]|TipocodigoModulo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TipocodigoModulo|\Phalcon\Mvc\Model\ResultInterface
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
                        'idModulo' => 'idModulo',
                        'correlativoModulo' => 'correlativoModulo'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'tipocodigo_modulo';
    }
}