<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer, MailerInterface $mailerInterface)
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $contact = $form->getData();
         //   $message = (new \Swift_Message('Nouveau contact'))
            $message = (new \Swift_Message('Nouveau contact'))
                // On attribue l'expéditeur
                ->setFrom($form->get('email')->getData())
                // On attribue le destinataire
                ->setTo('sowoumarousmane@gmail.com')
                // On crée le texte avec la vue
                ->setBody(
                    $this->renderView(
                        'contact/email.html.twig', compact('contact')
                    ),
                    'text/html'
                )
            ;
            $mailer->send($message);
            $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.');
        }
        return $this->render('contact/index.html.twig', [
            'contactForm' => $form->createView()
        ]);
    }
}
