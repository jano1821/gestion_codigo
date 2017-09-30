<?php

class Persona extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idpersona;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    public $nombrePersona;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idCargo;

    /**
     * Method to set the value of field idpersona
     *
     * @param integer $idpersona
     * @return $this
     */
    public function setIdpersona($idpersona)
    {
        $this->idpersona = $idpersona;

        return $this;
    }

    /**
     * Method to set the value of field nombrePersona
     *
     * @param string $nombrePersona
     * @return $this
     */
    public function setNombrePersona($nombrePersona)
    {
        $this->nombrePersona = $nombrePersona;

        return $this;
    }

    /**
     * Method to set the value of field idCargo
     *
     * @param integer $idCargo
     * @return $this
     */
    public function setIdCargo($idCargo)
    {
        $this->idCargo = $idCargo;

        return $this;
    }

    /**
     * Returns the value of field idpersona
     *
     * @return integer
     */
    public function getIdpersona()
    {
        return $this->idpersona;
    }

    /**
     * Returns the value of field nombrePersona
     *
     * @return string
     */
    public function getNombrePersona()
    {
        return $this->nombrePersona;
    }

    /**
     * Returns the value of field idCargo
     *
     * @return integer
     */
    public function getIdCargo()
    {
        return $this->idCargo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("manco");
        $this->setSource("persona");
        $this->hasMany('idpersona', 'CatalogoCodigo', 'idLiderTecnico', ['alias' => 'CatalogoCodigo']);
        $this->hasMany('idpersona', 'CatalogoCodigo', 'idLiderFuncional', ['alias' => 'CatalogoCodigo']);
        $this->belongsTo('idCargo', '\Cargo', 'idCargo', ['alias' => 'Cargo']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Persona[]|Persona|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Persona|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'idpersona' => 'idpersona',
            'nombrePersona' => 'nombrePersona',
            'idCargo' => 'idCargo'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'persona';
    }

}
