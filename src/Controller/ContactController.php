<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
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
            $message = (new Email())
                // On attribue l'expéditeur
                ->from($form->get('email')->getData())
                // On attribue le destinataire
                ->to('sowoumarousmane@gmail.com')
                ->subject('test ok')
                // On crée le texte avec la vue
                ->text(
                    $this->renderView(
                        'contact/email.html.twig', compact('contact')
                    ),
                    'text/html'
                )
            ;
            $mailerInterface->send($message);
            $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.');
        }
        return $this->render('contact/index.html.twig', [
            'contactForm' => $form->createView()
        ]);
    }
}
