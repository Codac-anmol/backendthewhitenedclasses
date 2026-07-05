<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Blocks access to the admin panel for anyone who isn't logged in
     * as an admin. Register this as the 'admin' route middleware alias
     * (see README.md for the exact line to add).
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->is_admin) {
            abort(403, 'You do not have access to the admin panel.');
        }

        return $next($request);
    }
}
