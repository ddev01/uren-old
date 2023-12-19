<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstimatePermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $estimate = $request->route('estimate');
        $shared = null;

        // Check if the user is logged in
        if (auth()->check()) {
            $shared = $estimate->shares()->where('user_email', auth()->user()->email)->first();
        }

        if ($estimate->user_id !== auth()->id() && $estimate->public === 0 && !$shared) {
            abort(404);
        }
        return $next($request);
    }
}
