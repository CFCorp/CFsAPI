<?php
/**
 * Created by PhpStorm.
 * User: darre
 * Date: 03-May-18
 * Time: 13:30
 */

namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        // You get the exception object from the received event
        $exception = $event->getException();
        $message = sprintf(
            'My Error says: %s with code: %s',
            $exception->getMessage(),
            $exception->getCode()
        );

        // Customize your response object to display the exception details
        $response = new Response();
        $response->setContent($message);

        // HttpExceptionInterface is a special type of exception that
        // holds status code and header details
        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
            $response->headers->replace($exception->getHeaders());
        } else {
            $response->setStatusCode(500);
            return;
        }

        if($exception instanceof NotFoundHttpException){
            $response = new RedirectResponse('https://www.computerfreaker.cf/404.html', 302);
        }

        // Send the modified response object to the event
        $event->setResponse($response);
    }

    public function onNotFoundException(NotFoundHttpException $exception){
        $broken = $exception->getStatusCode();

        if($broken instanceof NotFoundHttpException){
            $response = new RedirectResponse('https://www.computerfreaker.cf/404.html', 302);
            return $response;
        }
        return $broken;
    }
}