<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventCreateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/event", name="event")
     */
    public function index()
    {

        $repo = $this->getDoctrine()->getRepository(Event::class);
        $res = $repo->findAll();

        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
            'eventos' => $res
        ]);
    }

    public function create(Request $request)
    {
        $event = new Event();
        $FRM_REGISTER   = $this->createForm(EventCreateType::class, $event);
        $FRM_REGISTER->handleRequest($request);
        if ($FRM_REGISTER->isSubmitted() && $FRM_REGISTER->isValid()) {

            $images_projects = $FRM_REGISTER->get('coverImage')->getData();

            if($images_projects)
            {
                $originalFilename = pathinfo($images_projects->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$images_projects->guessExtension();

                // moves the file to the directory where brochures are stored
                $images_projects->move(
                    $this->getParameter('imgEvents'),
                    $newFilename
                );
                $event->setCoverImage($newFilename);
            }else
            {
                $event->setCoverImage(null);
            }
            $_USERSESSION = $this->getUser();
            $event->setUser($_USERSESSION);
            $event->setInterest(0);


            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            //return $this->redirectToRoute('proyectos_show', array('idProyecto' => $tableProyecto->getIdproyecto()));
        }
        else{
        }

        return $this->render('event/create.html.twig', [
            'controller_name' => 'EventController',
            "form_register" => $FRM_REGISTER->createView(),
        ]);
    }
}
