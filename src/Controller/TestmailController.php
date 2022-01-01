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
    public function index(MailerInterface $mailer): Response
    {
        $email = (new TemplatedEmail())
            ->from('sowoumarousmane@gmail.com')
            ->to('sowoumarousmane@gmail.com')
            ->subject('Bonjour Oumar Ousmane Sow')
            ->htmlTemplate('testmail/email-confirmation.twig')
            ->context([
                'delivery_date' => date_create('+3 days'),
                'order_number' => rand(5 , 5000)
            ]);
        return $this->render('testmail/index.html.twig', [
            'controller_name' => 'TestmailController',
        ]);
    }
}
