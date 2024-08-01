<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class LogValidationErrors
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        // dd($response);   
        if ($response->status() == 422 && $response->original['errors']) {
            $errors = $response->original['errors'];
            $jsonErrors = json_encode($errors, JSON_PRETTY_PRINT);

            File::put(storage_path('logs/validation_errors.json'), $jsonErrors);
        }

        return $response;
    }
}
