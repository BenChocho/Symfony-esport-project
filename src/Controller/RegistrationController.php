<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\User;
use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder, Swift_Mailer $mailer)
    {
// 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
// 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
// 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
// 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
// ... do any other work - like sending them an email, etc
            $message = (new \Swift_Message('Confirmation de compte'))
                ->setFrom(['jolesport.iesa@gmail.com' => 'JolE-sport'])
                ->setTo($user->getEmail())
                ->setBody('Votre compte JolE-sport a bien été créé !');
            $mailer->send($message);
            return $this->redirectToRoute('home');
        }
        return $this->render(
            'Registration/register.html.twig',
            array('form' => $form->createView())
        );
    }
}
