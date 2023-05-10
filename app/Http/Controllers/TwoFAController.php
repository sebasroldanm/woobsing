<?php

namespace App\Http\Controllers;

use App\Mail\SendEmailCode;
use App\Models\UserEmailCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class TwoFAController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('2fa');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);


        $find = UserEmailCode::where('user_id', auth()->user()->id)
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(30))
            ->first();
        // dd(auth()->user()->id, $request->code);
        if (!is_null($find)) {
            Session::put('user_2fa', auth()->user()->id);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Ingresó el código incorrecto o caduco su vigencia.');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resend()
    {
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

        return back()->with('success', 'Ventimos el código en su correo electrónico.');
    }
}
