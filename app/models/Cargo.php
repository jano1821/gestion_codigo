<?php

class Cargo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idCargo;

    /**
     *
     * @var string
     * @Column(type="string", length=250, nullable=true)
     */
    public $descripcionCargo;

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
     * Method to set the value of field descripcionCargo
     *
     * @param string $descripcionCargo
     * @return $this
     */
    public function setDescripcionCargo($descripcionCargo)
    {
        $this->descripcionCargo = $descripcionCargo;

        return $this;
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
     * Returns the value of field descripcionCargo
     *
     * @return string
     */
    public function getDescripcionCargo()
    {
        return $this->descripcionCargo;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("manco");
        $this->setSource("cargo");
        $this->hasMany('idCargo', 'Persona', 'idCargo', ['alias' => 'Persona']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cargo[]|Cargo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cargo|\Phalcon\Mvc\Model\ResultInterface
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
            'idCargo' => 'idCargo',
            'descripcionCargo' => 'descripcionCargo'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cargo';
    }

}
