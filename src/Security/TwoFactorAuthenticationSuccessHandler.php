<?php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
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

        $user= $token->getUser();

        $jwt = $this->jwtManager->create($user);
        

        return new Response('{"login": "success", "2fa_complete": true, "token": '. $jwt.'}');
   }
}