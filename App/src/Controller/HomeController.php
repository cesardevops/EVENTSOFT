<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name'   => 'HomeController',
        ]);
    }

    public function prices(){
        return $this->render('home/table-prices.html.twig', [
            'controller_name'   => 'HomeController',
        ]);
    }
    public function CheckEmail($Email){
        $entityManager = $this->getDoctrine()->getManager();
        $isset_user = $entityManager->getRepository(User::class)->findBy(
            array(
                "email" => $Email
            )
        );
        if(empty($isset_user))
        {
            return false;
        }else{
            return true;
        }
    }


}
