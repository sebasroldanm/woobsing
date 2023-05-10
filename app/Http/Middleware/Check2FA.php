<?php

namespace App\Http\Middleware;

use App\Mail\SendEmailCode;
use App\Models\User;
use App\Models\UserEmailCode;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Check2FA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('user_2fa')) {
            $code = rand(1000, 9999);
            UserEmailCode::updateOrCreate(
                ['user_id' => auth()->user()->id],
                ['code' => $code]
            );

            try {

                $details = [
                    'title' => 'Mail Send',
                    'code' => $code
                ];

                Mail::to(auth()->user()->email)->send(new SendEmailCode($details));
            } catch (Exception $e) {
                info("Error: " . $e->getMessage());
            }
            return redirect()->route('2fa.index');
        }

        return $next($request);
    }
}
