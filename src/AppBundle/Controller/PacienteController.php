<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Paciente;

//Version 1.0 12.03.2019//
class PacienteController extends Controller
{

    /**
     * @Route("foneticoPaciente", name="fonetico_paciente")
     */
    public function foneticoPacienteAction()
    {

        $em = $this->getDoctrine()->getManager();
        $pacientes = $em->getRepository('AppBundle:Paciente')->updateFonetico();

        if (count($pacientes) > 0) {
            foreach ($pacientes as $paciente) {
                $paciente->setFonNombre(metaphone($paciente->getNombre(), 5));
                $paciente->setPrimerApellido(metaphone($paciente->getPrimerApellido(), 5));
                $paciente->setFonsegundoApellido(metaphone($paciente->getSegundoApellido(), 5));
                $em->persist($paciente);
            }
            $em->flush();

            $this->addFlash('mensaje', 'Se actualizó el fonético en ' . count($pacientes) . ' pacientes');
        } else {
            $this->addFlash('mensaje', 'No es necesario actualizar el fonético');
        }
        return $this->redirectToRoute('inicio');
    }


    /**
     * @Route("/{carnet}",name="localizar_paciente",defaults={"carnet": 1}))
     * @throws \Doctrine\ORM\ORMException
     * @Method("GET")
     */
    public function localizarPacienteAction($carnet)
    {
        $request = Request::createFromGlobals();
        $token = $request->headers->get('paciente-token');

        // La variable $status son codigos de estado en las respuestas HTTP que un servidor
        // devuelve cuando se recibe un petición HTTP Request
        // Devolver status=401 cuando el token que me envíen del cliente no sea válido.

        if (trim($token) === 'a71c28042ac8') {
            $str = strlen(trim($carnet));
            if ($str === 11) {
                $repository = $this->getDoctrine()->getRepository('AppBundle:Paciente');
                $paciente = $repository->findOneBy(array('carnetIdentidad' => $carnet));

                if (!$paciente) {
                    $data = array(
                        'existe' => false,);
                    $status = 204; //Petición válida pero no devuelve resultado.
                } else {

                    $data = array(
                        'existe' => true, 'nombre' => $paciente->getNombre(), 'primerApellido' => $paciente->getPrimerApellido(),
                        'segundoApellido' => $paciente->getSegundoApellido(), 'sexo' => $paciente->getSexo()->getNombre(),
                        'edad' => $paciente->getEdad(), 'municipio' => $paciente->getMunicipio()->getNombre(),
                        'provincia' => $paciente->getMunicipio()->getProvincia()->getNombre(),);
                    $status = 200; //Petición válida devolviendo un resultado.

                }
            } else {
                $data = array(
                    'existe' => false,);
                $status = 400; //El servidor no puede procesar un request por un error de sintaxis del cliente.
            }
        } else {
            return new Response(null);
        }


        return new JsonResponse($data, $status);


    }


}
