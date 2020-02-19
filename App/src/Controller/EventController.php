<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\User;
use App\Entity\Userxevent;
use App\Form\EventCreateType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    public function test()
    {
        $repo = $this->getDoctrine()->getRepository(Event::class);
        $result = $repo->getMyinterest(0,5,12);
        return $this->render('home/index.html.twig', [
            'events' => $result
        ]);
    }

    /**
     * @return Response
     */
    public function index()
    {
        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
        ]);
    }

    /**
     * @return Response
     */
    public function myinterests()
    {
        return $this->render('event/myinterests.html.twig');
    }

    public function whereiwillgo(){
        return $this->render('event/eventswhereIwillgo.html.twig');
    }

    /**
     * @param Request $request
     */
    public function getEvent(Request $request){
        $_IDEVENT    = $request->get("id", null);
        var_dump($_IDEVENT);
        die();

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getEvents(Request $request){
        $_FIRSTRESULT    = $request->get("firstResult", null);
        $_MAXTRESULT    = $request->get("maxtResult", null);

        $repo = $this->getDoctrine()->getRepository(Event::class);
        $result = $repo->findEventPublishes($_FIRSTRESULT,$_MAXTRESULT);

        return new JsonResponse($result,200);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
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
                // create the thumb image
                $_PHOTOBLOOB = $event->getThumb();
                $thumb_name = 'thumb-ev-images-'.uniqid().uniqid().'.jpg';
                $filesystem = new Filesystem();
                $filesystem->touch('images/users/avatars/'.$thumb_name);
                $in = fopen($_PHOTOBLOOB, "rb");
                $out = fopen('images/events/covers/'.$thumb_name, "wb");
                while ($chunk = fread($in, 8192)) {
                    fwrite($out, $chunk, 8192);
                }
                fclose($in);
                fclose($out);
                $event->setThumb($thumb_name);
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

            return $this->redirectToRoute('get_event', array('id' => $event->getId()));
        }

        return $this->render('event/create.html.twig', [
            'controller_name' => 'EventController',
            "form_register" => $FRM_REGISTER->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function SetInterestForEvent(Request $request){
        $USER_x_EVENT = new Userxevent();
        $_USERSESSION = $this->getUser();
        $_IDEVENT    = $request->get("id", null);

        $repo = $this->getDoctrine()->getRepository(Event::class);
        $_total = $repo->findEventXuser($_IDEVENT,$_USERSESSION->getId());

        $result = [
            'status' => 'bad',
        ];

        if ($_total == 0){
            $_EVENT = $this->getDoctrine()->getRepository(Event::class)->find($_IDEVENT);
            date_default_timezone_set($_USERSESSION->getTimezone());
            $USER_x_EVENT->setUser($_USERSESSION);
            $USER_x_EVENT->setEvent($_EVENT);
            $USER_x_EVENT->setInterest(true);
            $USER_x_EVENT->setAttended(false);
            $USER_x_EVENT->setCheckIn(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($USER_x_EVENT);
            $em->flush();

            $result = [
                "status"    => 'ok',
                "id_user" => $_USERSESSION->getId(),
            ];
        }
        return new JsonResponse($result,200);

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function GetMyInterest(Request $request){
        $_USERSESSION = $this->getUser();
        $_FIRSTRESULT    = $request->get("firstResult", null);
        $_MAXTRESULT    = $request->get("maxtResult", null);
        $repo = $this->getDoctrine()->getRepository(Event::class);
        $events = $repo->getMyinterest($_FIRSTRESULT, $_MAXTRESULT, $_USERSESSION->getId());

        return new JsonResponse($events,200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function SetAssistant(Request $request){
        $_USERSESSION = $this->getUser();
        $_USERXEVENT    = $request->get("id", null);

        $repo = $this->getDoctrine()->getRepository(Userxevent::class);
        $USER_x_EVENT = $repo->find($_USERXEVENT);

        date_default_timezone_set($_USERSESSION->getTimezone());
        $USER_x_EVENT->setInterest(false);
        $USER_x_EVENT->setAttended(true);
        $USER_x_EVENT->setCheckIn(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($USER_x_EVENT);
        $em->flush();

        $result = [
            "status"    => 'ok',
        ];
        return new JsonResponse($result,200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function GetIwillGo(Request $request){
        $_USERSESSION = $this->getUser();
        $_FIRSTRESULT    = $request->get("firstResult", null);
        $_MAXTRESULT    = $request->get("maxtResult", null);
        $repo = $this->getDoctrine()->getRepository(Event::class);
        $events = $repo->getMyLoves($_FIRSTRESULT, $_MAXTRESULT, $_USERSESSION->getId());

        return new JsonResponse($events,200);
    }


}
