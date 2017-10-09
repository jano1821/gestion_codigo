<?php

class Modulo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idModulo;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    public $prefijoModulo;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $correlativoModulo;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=false)
     */
    public $descripcionModulo;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $fechaRegistro;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=false)
     */
    public $estadoRegistro;

    /**
     * Method to set the value of field idModulo
     *
     * @param integer $idModulo
     * @return $this
     */
    public function setIdModulo($idModulo)
    {
        $this->idModulo = $idModulo;

        return $this;
    }

    /**
     * Method to set the value of field prefijoModulo
     *
     * @param string $prefijoModulo
     * @return $this
     */
    public function setPrefijoModulo($prefijoModulo)
    {
        $this->prefijoModulo = $prefijoModulo;

        return $this;
    }

    /**
     * Method to set the value of field correlativoModulo
     *
     * @param integer $correlativoModulo
     * @return $this
     */
    public function setCorrelativoModulo($correlativoModulo)
    {
        $this->correlativoModulo = $correlativoModulo;

        return $this;
    }

    /**
     * Method to set the value of field descripcionModulo
     *
     * @param string $descripcionModulo
     * @return $this
     */
    public function setDescripcionModulo($descripcionModulo)
    {
        $this->descripcionModulo = $descripcionModulo;

        return $this;
    }

    /**
     * Method to set the value of field fechaRegistro
     *
     * @param string $fechaRegistro
     * @return $this
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Method to set the value of field estadoRegistro
     *
     * @param string $estadoRegistro
     * @return $this
     */
    public function setEstadoRegistro($estadoRegistro)
    {
        $this->estadoRegistro = $estadoRegistro;

        return $this;
    }

    /**
     * Returns the value of field idModulo
     *
     * @return integer
     */
    public function getIdModulo()
    {
        return $this->idModulo;
    }

    /**
     * Returns the value of field prefijoModulo
     *
     * @return string
     */
    public function getPrefijoModulo()
    {
        return $this->prefijoModulo;
    }

    /**
     * Returns the value of field correlativoModulo
     *
     * @return integer
     */
    public function getCorrelativoModulo()
    {
        return $this->correlativoModulo;
    }

    /**
     * Returns the value of field descripcionModulo
     *
     * @return string
     */
    public function getDescripcionModulo()
    {
        return $this->descripcionModulo;
    }

    /**
     * Returns the value of field fechaRegistro
     *
     * @return string
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Returns the value of field estadoRegistro
     *
     * @return string
     */
    public function getEstadoRegistro()
    {
        return $this->estadoRegistro;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("manco");
        $this->setSource("modulo");
        $this->hasMany('idModulo', 'CatalogoCodigo', 'idModulo', ['alias' => 'CatalogoCodigo']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Modulo[]|Modulo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Modulo|\Phalcon\Mvc\Model\ResultInterface
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
            'idModulo' => 'idModulo',
            'prefijoModulo' => 'prefijoModulo',
            'correlativoModulo' => 'correlativoModulo',
            'descripcionModulo' => 'descripcionModulo',
            'fechaRegistro' => 'fechaRegistro',
            'estadoRegistro' => 'estadoRegistro'
        ];
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'modulo';
    }

}
