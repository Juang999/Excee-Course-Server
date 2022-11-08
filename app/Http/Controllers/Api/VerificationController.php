<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function notVerified()
    {
        return response()->json([
            'status' => 'rejected',
            'message' => 'your account is not verified'
        ], 300);
    }

    public function verify(EmailVerificationRequest $request)
    {
        try {
            $request->fulfill();

            return response()->json([
                'status' => 'success',
                'message' => 'account verified'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => 'account rejected'
            ], 200);
        }
    }

    public function resendEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return response()->json([
            'status' => 'success',
            'message' => 'resend email'
        ]);
    }
}
