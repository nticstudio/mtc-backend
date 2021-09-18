<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/api/login", name="api_login")
     *     
     */
    public function login() {
        // $user = $this->getUser();

        // return $this->json([
        //     'username' => $user->getUsername(),
        //     'role' =>   $user->getRoles()
        // ]);
    }
    
}
