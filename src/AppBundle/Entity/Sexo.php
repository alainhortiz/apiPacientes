<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Sexo
 *
 * @ORM\Table(name="sexo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SexoRepository")
 */
class Sexo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Paciente",mappedBy="sexo")
     */
    protected $paciente_sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20)
     */
    private $nombre;

    public function __construct()
    {
        $this->paciente_sexo = new ArrayCollection();
    }

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Sexo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add pacienteSexo
     *
     * @param \AppBundle\Entity\Paciente $pacienteSexo
     *
     * @return Sexo
     */
    public function addPacienteSexo(\AppBundle\Entity\Paciente $pacienteSexo)
    {
        $this->paciente_sexo[] = $pacienteSexo;

        return $this;
    }

    /**
     * Remove pacienteSexo
     *
     * @param \AppBundle\Entity\Paciente $pacienteSexo
     */
    public function removePacienteSexo(\AppBundle\Entity\Paciente $pacienteSexo)
    {
        $this->paciente_sexo->removeElement($pacienteSexo);
    }

    /**
     * Get pacienteSexo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPacienteSexo()
    {
        return $this->paciente_sexo;
    }
}
