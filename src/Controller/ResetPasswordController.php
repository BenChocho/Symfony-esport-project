<?php
/**
 * Created by PhpStorm.
 * User: alexandresmagghe
 * Date: 29/03/2018
 * Time: 12:09
 */

namespace App\Controller;

use App\Entity\User;
use App\Form\ForgotPassword;
use App\Form\PasswordResetType;
use Swift_Mailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Swift_Message;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;


class ResetPasswordController extends Controller
{

    /**
     * @Route("/emailcheck", name="forgotpassword")
     * @param Request $request
     * @param Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function forgotpassword(Request $request, Swift_Mailer $mailer)
    {
        $form = $this->createForm(ForgotPassword::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['email' => $email]);
            if (!$user) {
                return $this->render('forgotpass/emailcheck.html.twig', [
                    'form' => $form->createView(),
                    'invalid_email' => $email,
                ]);
            }
            $token = uniqid('bde-', true);
            $url = $this->generateUrl('login', [
                'token' => $token,
            ], UrlGeneratorInterface::ABSOLUTE_URL);
            $mailBody = 'Pour reset ton password click ici : ' . $url;
            $message = (new Swift_Message('Nouveau mot de passe'))
                ->setFrom(['jolesport.iesa@gmail.com' => 'Joliesport'])
                ->setTo('alex.s95120@gmail.com')
                ->setBody($mailBody);
            $mailer->send($message);
            $user->setResetPasswordToken($token);
            $this->getDoctrine()->getManager()->persist($user);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Coucou');
            return $this->redirectToRoute('login');
        }
        return $this->render('forgotpass/emailcheck.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/reset/{token}", name="changepassword")
     * @param Request $request
     * @param string $token
     * @param EncoderFactoryInterface $factory
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function changepassword(Request $request, string $token, EncoderFactoryInterface $factory)
    {
        /** @var User $user */
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['resetPasswordToken' => $token]);
        if (!$user) {
            $this->addFlash('error', 'tu es mauvais');
            return $this->redirectToRoute('login');
        }
        // user form update
        $form = $this->createForm(PasswordResetType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $encoder = $factory->getEncoder(User::class);
            $user->setPassword($encoder->encodePassword($user->getPlainPassword(), $user->getSalt()));
            $user->eraseCredentials();
            $user->setResetPasswordToken(null);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Bien ouej Nadeige');
            return $this->redirectToRoute('login');
        }
        return $this->render('forgotpass/changepassword.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}