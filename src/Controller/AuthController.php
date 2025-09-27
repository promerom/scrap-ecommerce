<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    #[Route('/connect/google', name: 'connect_google_start')]
    public function connectGoogle()
    {
        // Este endpoint redirige automáticamente al login de Google
        return $this->redirectToRoute('connect_google_check');
    }

    #[Route('/connect/google/check', name: 'connect_google_check')]
    public function connectCheck()
    {
        // Symfony gestionará el login y redirección automáticamente.
        return $this->redirectToRoute('frontend_home');
    }
}