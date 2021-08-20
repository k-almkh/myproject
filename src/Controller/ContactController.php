<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            // dd($contactFormData);
            $email = (new Email())
            // ->from($contactFormData['from'])
            ->from(new Address($contactFormData['from'], $contactFormData['name']))
            ->to('admin@admin.de')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('E-Mail von '.$contactFormData['name'])
            ->text($contactFormData['message']);
            // ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailer->send($email);
            $this->addFlash(
                'success',
                'Die E-Mail wurde geschickt!'
            );
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact/index.html.twig', [
            'contact_form' => $form->createView(),
        ]);
    }
}
