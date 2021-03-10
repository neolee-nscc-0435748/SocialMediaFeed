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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    //Ref: https://spatie.be/docs/laravel-permission/v3/advanced-usage/exceptions
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            return back()->with('status', 'Denied - You do not have permissions to access Admin pages');
        }

        return parent::render($request, $exception);
    }
}
