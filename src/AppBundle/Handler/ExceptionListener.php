<?php
/**
 * Created by PhpStorm.
 * User: darre
 * Date: 03-May-18
 * Time: 13:30
 */

namespace AppBundle\Handler;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class ExceptionListener
{
    private function url(){
        if(isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }
        else{
            $protocol = 'http';
        }
        return $protocol . "://" . $_SERVER['HTTP_HOST'];
    }


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

        $url = $_SERVER['HTTP_HOST'];

        if($exception instanceof NotFoundHttpException){
            $response = new RedirectResponse(`$url/404.php`, 302);
        }

        // Send the modified response object to the event
        $event->setResponse($response);
    }

    public function onNotFoundException(NotFoundHttpException $exception){
        $url = $_SERVER['HTTP_HOST'];
        $broken = $exception->getStatusCode();

        if($broken instanceof NotFoundHttpException){
            $response = new RedirectResponse(`$url/404.php`, 302);
            return $response;
        }
        return $broken;
    }
}