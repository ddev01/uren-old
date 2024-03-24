<?php

namespace App\Http\Middleware;

use App\Models\Estimate;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstimatePermissions
{
    public function handle(Request $request, Closure $next): Response
    {
        $estimate = $request->route('estimate');

        // Ensure $estimate is an instance of the Estimate model
        if (! $estimate instanceof Estimate) {
            abort(404, 'Estimate not found.');
        }

        $shared = null;

        // Check if the user is logged in
        if (auth()->check()) {
            /** @var User $user */
            $user = auth()->user();
            if ($user instanceof User) { // Explicitly checking the instance
                $shared = $estimate->shares()->where('user_email', $user->email)->first();
            }
        }

        // Adjusted comparison for 'public' property
        // Assuming 'public' is an integer (0 or 1) in the database
        if ($estimate->user_id !== auth()->id() && $estimate->public == 0 && ! $shared) {
            abort(404);
        }

        return $next($request);
    }
}
