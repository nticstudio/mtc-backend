<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/api/login", name="login")
     *     
     */
    public function login() {
        // $user = $this->getUser();

        // return $this->json([
        //     'username' => $user->getUsername(),
        //     'role' =>   $user->getRoles()
        // ]);
    }

     /**
     * @Route("/api/logout", name="api_logout", methods="GET")
     *     
     */
    public function logout() {
        return new JsonResponse(null,204);
    }


    
}
