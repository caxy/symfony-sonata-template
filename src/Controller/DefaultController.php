<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     *
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        if(!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('fos_user_security_login');
        }

        return $this->redirectToRoute('sonata_admin_dashboard');
    }

    /**
     * @Route("/profile", name="override_profile")
     *
     * @return RedirectResponse
     */
    public function profile(): RedirectResponse
    {
        return $this->redirectToRoute('sonata_admin_dashboard');
    }
}