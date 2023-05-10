<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        $now = Carbon::now();
        $last_online = Carbon::parse($user->last_online);
        $diff_hours = $now->diffInHours($last_online);

        if ($diff_hours > 23) {
            Auth::logout();
            return redirect('/sesiones');
        } else {
            $diff_minutes = $now->diffInMinutes($last_online);
            if ($diff_minutes > 5 || is_null($last_online)) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['last_online' => $now]);
            }
        }

        return $next($request);
    }
}
