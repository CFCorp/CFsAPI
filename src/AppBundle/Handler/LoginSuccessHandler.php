<?php
namespace AppBundle\Handler;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface{
    /**
     * @var RouterInterface $router
     */
    protected $router;
    /**
     * @var AuthorizationCheckerInterface $autherizationChecker
     */
    protected $autherizationChecker;

    /**
     * LoginSuccessHandler constructor.
     * @param RouterInterface $router
     * @param AuthorizationCheckerInterface $autherizationChecker
     */
    public function __construct(RouterInterface $router, AuthorizationCheckerInterface $autherizationChecker)
    {
        $this->router = $router;
        $this->autherizationChecker = $autherizationChecker;
    }


    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if($this->autherizationChecker->isGranted("ROLE_ADMIN")){
            $response = new RedirectResponse($this->router->generate('Uploader'));
        }
        if($this->autherizationChecker->isGranted("ROLE_USER")){
            $response = new RedirectResponse($this->router->generate("token"));
        }
        return $response;
    }
}