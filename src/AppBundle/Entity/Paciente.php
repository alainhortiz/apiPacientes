<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paciente
 *
 * @ORM\Table(name="paciente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PacienteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Paciente
{
    /**
     * @ORM\ManyToOne(targetEntity="Municipio",inversedBy="paciente")
     * @ORM\JoinColumn(name="municipio_id",referencedColumnName="id")
     */
    protected $municipio;

    /**
     * @ORM\ManyToOne(targetEntity="Sexo",inversedBy="paciente_sexo")
     * @ORM\JoinColumn(name="sexo_id",referencedColumnName="id")
     */
    protected $sexo;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="carnetIdentidad", type="string", length=11)
     */
    private $carnetIdentidad;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="primerApellido", type="string", length=100)
     */
    private $primerApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="segundoApellido", type="string", length=100, nullable=true)
     */
    private $segundoApellido;

    /**
     * @var int
     *
     * @ORM\Column(name="edad", type="integer")
     */
    private $edad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="usuarioCreated", type="string", length=100, nullable=true)
     */
    private $usuarioCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="sistemaCreated", type="string", length=20, nullable=true)
     */
    private $sistemaCreated;

    /**
     * @var int
     *
     * @ORM\Column(name="personaNo", type="integer", nullable=true)
     */
    private $personaNo;

    /**
     * @var string
     *
     * @ORM\Column(name="fonNombre", type="string", length=100, nullable=true)
     */
    private $fonNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="fonprimerApellido", type="string", length=100, nullable=true)
     */
    private $fonprimerApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="fonsegundoApellido", type="string", length=100, nullable=true)
     */
    private $fonsegundoApellido;


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
     * Set carnetIdentidad
     *
     * @param string $carnetIdentidad
     *
     * @return Paciente
     */
    public function setCarnetIdentidad($carnetIdentidad)
    {
        $this->carnetIdentidad = $carnetIdentidad;

        return $this;
    }

    /**
     * Get carnetIdentidad
     *
     * @return string
     */
    public function getCarnetIdentidad()
    {
        return $this->carnetIdentidad;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Paciente
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
     * Set primerApellido
     *
     * @param string $primerApellido
     *
     * @return Paciente
     */
    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;

        return $this;
    }

    /**
     * Get primerApellido
     *
     * @return string
     */
    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    /**
     * Set segundoApellido
     *
     * @param string $segundoApellido
     *
     * @return Paciente
     */
    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;

        return $this;
    }

    /**
     * Get segundoApellido
     *
     * @return string
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     *
     * @return Paciente
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return int
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Paciente
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set usuarioCreated
     *
     * @param string $usuarioCreated
     *
     * @return Paciente
     */
    public function setUsuarioCreated($usuarioCreated)
    {
        $this->usuarioCreated = $usuarioCreated;

        return $this;
    }

    /**
     * Get usuarioCreated
     *
     * @return string
     */
    public function getUsuarioCreated()
    {
        return $this->usuarioCreated;
    }

    /**
     * Set sistemaCreated
     *
     * @param string $sistemaCreated
     *
     * @return Paciente
     */
    public function setSistemaCreated($sistemaCreated)
    {
        $this->sistemaCreated = $sistemaCreated;

        return $this;
    }

    /**
     * Get sistemaCreated
     *
     * @return string
     */
    public function getSistemaCreated()
    {
        return $this->sistemaCreated;
    }

    /**
     * Set personaNo
     *
     * @param integer $personaNo
     *
     * @return Paciente
     */
    public function setPersonaNo($personaNo)
    {
        $this->personaNo = $personaNo;

        return $this;
    }

    /**
     * Get personaNo
     *
     * @return int
     */
    public function getPersonaNo()
    {
        return $this->personaNo;
    }

    /**
     * Set fonNombre
     *
     * @param string $fonNombre
     *
     * @return Paciente
     */
    public function setFonNombre($fonNombre)
    {
        $this->fonNombre = $fonNombre;

        return $this;
    }

    /**
     * Get fonNombre
     *
     * @return string
     */
    public function getFonNombre()
    {
        return $this->fonNombre;
    }

    /**
     * Set fonprimerApellido
     *
     * @param string $fonprimerApellido
     *
     * @return Paciente
     */
    public function setFonprimerApellido($fonprimerApellido)
    {
        $this->fonprimerApellido = $fonprimerApellido;

        return $this;
    }

    /**
     * Get fonprimerApellido
     *
     * @return string
     */
    public function getFonprimerApellido()
    {
        return $this->fonprimerApellido;
    }

    /**
     * Set fonsegundoApellido
     *
     * @param string $fonsegundoApellido
     *
     * @return Paciente
     */
    public function setFonsegundoApellido($fonsegundoApellido)
    {
        $this->fonsegundoApellido = $fonsegundoApellido;

        return $this;
    }

    /**
     * Get fonsegundoApellido
     *
     * @return string
     */
    public function getFonsegundoApellido()
    {
        return $this->fonsegundoApellido;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setEdadValue()
    {
        $this->edad = 50;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setFonNombreValue()
    {
        $this->fonnombre = metaphone($this->nombre,5);
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setFonPrimerApellidoValue()
    {
        $this->fonprimerApellido = metaphone($this->primerApellido,5);
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setFonSegundoApellidoValue()
    {
        $this->fonsegundoApellido = metaphone($this->segundoApellido,5);
    }



    /**
     * Set municipio
     *
     * @param \AppBundle\Entity\Municipio $municipio
     *
     * @return Paciente
     */
    public function setMunicipio(\AppBundle\Entity\Municipio $municipio = null)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return \AppBundle\Entity\Municipio
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set sexo
     *
     * @param \AppBundle\Entity\Sexo $sexo
     *
     * @return Paciente
     */
    public function setSexo(\AppBundle\Entity\Sexo $sexo = null)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return \AppBundle\Entity\Sexo
     */
    public function getSexo()
    {
        return $this->sexo;
    }
}
