<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class TestmailController extends AbstractController
{
    /**
     * @Route("/testmail", name="testmail")
     */
    public function index(\Swift_Mailer $mailer): Response
    {

        


        $message = new \Swift_Message('Test email');
        $message->setFrom('sowoumarousmane@gmail.com');
        $message->setTo('sowoumarousmane@gmail.com');
        $message->setBody(
            $this->renderView(
                'testmail/email-confirmation.twig'
            ),
            'text/html'
        );
        return $this->render('testmail/email-confirmation.twig', [
            'controller_name' => 'TestmailController',
        ]);
    }
}
