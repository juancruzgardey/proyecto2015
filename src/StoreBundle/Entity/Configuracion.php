<?php

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuracion
 *
 * @ORM\Table(name="configuracion")
 * @ORM\Entity(repositoryClass="StoreBundle\Repository\ConfiguracionRepository")
 */
class Configuracion
{
    /**
     * @var int
     *
     * @ORM\Column(name="idConfiguracion", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="string", length=255)
     */
    private $clave;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="text")
     */
    private $valor;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set clave
     *
     * @param string $clave
     *
     * @return Configuracion
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set valor
     *
     * @param string $valor
     *
     * @return Configuracion
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }
}
