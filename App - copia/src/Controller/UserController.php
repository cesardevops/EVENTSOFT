<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Filesystem\Filesystem;
class UserController extends AbstractController
{

    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    public function  login(AuthenticationUtils $authenticationUtils){
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUserName = $authenticationUtils->getLastUsername();

        return $this->render('user/login.html.twig', array(
            'error' => $error,
            'last_name' => $lastUserName,
        ));
    }

    public function  register(Request $request, UserPasswordEncoderInterface $encoder )
    {
        $_EMAIL     = $request->get("email",null);
        $user = new User();

        $FRM_REGISTER   = $this->createForm(RegisterType::class, $user);

        # region for register user
        $FRM_REGISTER->handleRequest($request);
        if($FRM_REGISTER->isSubmitted() && $FRM_REGISTER->isValid()){

            // This is just an example. In application this will come from Javascript (via an AJAX or something)
            $timezone_offset_minutes = $user->getTimezone();
            // Convert minutes to seconds
            $timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);
            $user->setTimezone($timezone_name);
            date_default_timezone_set($timezone_name);

            $_chk = $this->CheckEmail($_EMAIL);

            if($_chk){
                #el usuario existe
            }
            else
            {
                $date_now = new \DateTime('now');
                $user->setCreatedAt($date_now);
                $user->setUpdatedAt($date_now);
                $encoded = $encoder->encodePassword($user,$user->getPassword());
                $user->setPassword($encoded);
                $user->setRoles("ROLE_USER");
                $user->setPhoto('0');
                $user->setGender( $user->getGender() == 1 ? 1 : 0);

                # SAVE USER
                $_EM = $this->getDoctrine()->getManager();
                $_EM->persist($user);
                $_EM->flush();

                return $this->redirectToRoute("login");
            }

        }


        return $this->render('user/register.html.twig', [
            'controller_name'   => 'HomeController',
            "form_register" => $FRM_REGISTER->createView(),
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

    public function  edit(Request $request,UserPasswordEncoderInterface $encoder){
        $_USERSESSION = $this->getUser();
        $_USER = $this->getDoctrine()->getRepository(User::class)->find($_USERSESSION->getId());

        $FRM   = $this->createForm(EditUserType::class, $_USER);

        # region for register user updates
        $FRM->handleRequest($request);
        if($FRM->isSubmitted() && $FRM->isValid()){

            $encoded = $encoder->encodePassword($_USER,$_USER->getPassword());
            $_USER->setPassword($encoded);
            var_dump($_USER);

            # SAVE USER
            $_EM = $this->getDoctrine()->getManager();
            $_EM->persist($_USER);
            $_EM->flush();
        }

        return $this->render('user/edit.html.twig', [
            'controller_name' => 'UserController',
            "form_register" => $FRM->createView(),
        ]);
    }
    public function editphoto(Request $request){
        $_USERSESSION   = $this->getUser();
        $_id            = $_USERSESSION->getId();
        $_PHOTOBLOOB    = $request->request->get("image", null);

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($_id);

        $result = [
            'status' => 'bad',
        ];
        if(!empty($user))
        {
            $name_image = 'ev-db-images-'.uniqid().uniqid().'.jpg';
            $filesystem = new Filesystem();
            $filesystem->touch('images/users/avatars/'.$name_image);
            $user->setCoverprofile($name_image);


            $in = fopen($_PHOTOBLOOB, "rb");
            $out = fopen('images/users/avatars/'.$user->getCoverprofile(), "wb");
            while ($chunk = fread($in, 8192)) {
                fwrite($out, $chunk, 8192);
            }
            fclose($in);
            fclose($out);

            $user->setPhoto('1');
            # SAVE USER
            $_EM = $this->getDoctrine()->getManager();
            $_EM->persist($user);
            $_EM->flush();

            $result = [
                'status' => 'ok',
                'blob' => $_PHOTOBLOOB,
                'img' => 'images/users/avatars/'.$name_image
            ];
        }

        return new JsonResponse($result,200);

    }

}
