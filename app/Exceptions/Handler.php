<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {

        if($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ||
            $exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException ||
            $exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException){
            $error = [
                'message'=> $exception->getMessage(),
                'type'   => \get_class($exception),
                'url'    => $request->url(),
                'method' => $request->method(),
                'data'   => $request->all(),
            ];

            $message = $exception->getStatusCode().' : ' . $error['url'] . "\n" . \json_encode($error, JSON_PRETTY_PRINT);

            \Log::debug($message);
        }
        return parent::render($request, $exception);

    }
}
