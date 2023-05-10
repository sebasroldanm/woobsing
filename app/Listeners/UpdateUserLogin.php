<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateUserLogin
{
    protected $request;
    /**
     * Create the event listener.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $ip = $this->request->ip();
        $user = Auth::user();
        $user->last_online = now();
        $user->save();

        session()->put('origin_sesion', true);

        if ($user->role_id = 1 && $ip == '127.0.0.1') {
            DB::table('loging_log')->insert([
                'id_user' => $user->id,
                'ip_address' => $ip,
                'created_at' => Carbon::now()
            ]);
        }
    }
}
