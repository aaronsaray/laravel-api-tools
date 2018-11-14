<?php
/**
 * Requires JSON Middleware - will kick out this request if its not a json request
 */
declare(strict_types=1);

namespace AaronSaray\LaravelApiTools\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

/**
 * Class RequiresJson
 *
 * This middleware rejects the request if it doesn't have
 * an accept application/json header
 *
 * @package AaronSaray\LaravelApiTools\Middleware
 */
class RequiresJson
{
    /**
     * Handle an incoming request - reject if not application/json
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!$request->wantsJson()) {
            throw new NotAcceptableHttpException(
                'Please request with HTTP header: Accept: application/json'
            );
        }

        return $next($request);
    }
}
