<?php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Lexik\Bundle\JWTAuthenticationBundle\Events;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;


use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Scheb\TwoFactorBundle\Security\Authentication\Token\TwoFactorTokenInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationSuccessResponse;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class TwoFactorAuthenticationSuccessHandler implements AuthenticationSuccessHandlerInterface
{

    private $cookieProviders;

    protected $jwtManager;
    protected $dispatcher;
    protected $removeTokenFromBodyWhenCookiesUsed;

    /**
     * @param iterable|JWTCookieProvider[] $cookieProviders
     */
    public function __construct(JWTTokenManagerInterface $jwtManager, EventDispatcherInterface $dispatcher, $cookieProviders = [], bool $removeTokenFromBodyWhenCookiesUsed = true)
    {
        $this->jwtManager = $jwtManager;
        $this->dispatcher = $dispatcher;
        $this->cookieProviders = $cookieProviders;
        $this->removeTokenFromBodyWhenCookiesUsed = $removeTokenFromBodyWhenCookiesUsed;
    }

    
    public function onAuthenticationSuccess(Request $request, TokenInterface $token): Response
    {
        
        // dd("TwoFactorAuthenticationSuccessHandler");
        // Return the response to tell the client that authentication including two-factor
        // authentication is complete now.

       // $user= $token->getUser();

       // $jwt = $this->jwtManager->create($user);
        

        return new Response('{"login": "success", "2fa_complete": true}');
   }

    /**
     * @return Response
     */
    public function handleAuthenticationSuccess(UserInterface $user, $jwt = null)
    {
        if (null === $jwt) {
            $jwt = $this->jwtManager->create($user);
        }

        $jwtCookies = [];
        foreach ($this->cookieProviders as $cookieProvider) {
            $jwtCookies[] = $cookieProvider->createCookie($jwt);
        }

        $response = new JWTAuthenticationSuccessResponse($jwt, [], $jwtCookies);
        $event = new AuthenticationSuccessEvent(['token' => $jwt], $user, $response);

        $this->dispatcher->dispatch($event, Events::AUTHENTICATION_SUCCESS);
        $responseData = $event->getData();

        if ($jwtCookies && $this->removeTokenFromBodyWhenCookiesUsed) {
            unset($responseData['token']);
        }

        if ($responseData) {
            $response->setData($responseData);
        } else {
            $response->setStatusCode(JWTAuthenticationSuccessResponse::HTTP_NO_CONTENT);
        }

        return $response;
    }
}