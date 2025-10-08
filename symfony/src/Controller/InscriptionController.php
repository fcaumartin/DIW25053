<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ValidationType;
use App\Form\InscriptionType;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(Request $request, MailerInterface $mailer, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(InscriptionType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $destinataire = $form->get('email')->getData();

            $token = uniqid();

            // dd($token);

            $u = new User();
            $u->setToken($token);
            $u->setEmail($destinataire);
            $u->setPassword("quimachepas");
            $manager->persist($u);
            $manager->flush();


            $email = (new TemplatedEmail())
                ->from('nepasrepondre@site.com')
                ->to($destinataire)
                ->subject('Votre inscription')
                ->htmlTemplate('mail/validation.html.twig')
                ->context([
                    "token" => $token
                ])
                ;

            $mailer->send($email);

            $this->addFlash('notice', 'Consulter votre boite aux lettres...');
            return $this->redirect("/");
        }

        return $this->render('inscription/index.html.twig', [
            'form' => $form,
        ]);
    }


    #[Route('/validation/{token}', name: 'app_validation')]
    public function validation(
        UserPasswordHasherInterface $hasher, 
        UserRepository $repo, 
        Request $request, 
        EntityManagerInterface $manager, 
        $token
    ): Response
    {
        $user = $repo->findOneBy([ "token" => $token]);

        // dd($user);

        $form = $this->createForm(ValidationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $password = $form->get('password')->getData();

            $password_hash = $hasher->hashPassword($user, $password);
            $user->setPassword($password_hash);

            $manager->flush();

            $this->addFlash('notice', 'Bravo...');
            return $this->redirect("/login");
        }

        return $this->render('inscription/validation.html.twig', [
            "form" => $form    
        ]);
    }
}
