<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            DB::table('user_activities')->insert([
                'user_id' => Auth::id(),
                'path' => $request->path(),
                'method' => $request->method(),
                'ip_address' => $request->ip(),
                'created_at' => now(),
            ]);
        }

        return $next($request);
    }
}
