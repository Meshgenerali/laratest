<?php

namespace App\Http\Controllers\WebAuthn;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Laragear\WebAuthn\Http\Requests\AssertedRequest;
use Laragear\WebAuthn\Http\Requests\AssertionRequest;
use function response;

use Illuminate\Support\Facades\Event;
use Laragear\WebAuthn\Events\CredentialCloned;
use App\Notifications\firstNotification;

class WebAuthnLoginController
{
    /**
     * Returns the challenge to assertion.
     *
     * @param  \Laragear\WebAuthn\Http\Requests\AssertionRequest  $request
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function options(AssertionRequest $request): Responsable
    {
        return $request->toVerify($request->validate(['email' => 'sometimes|email|string']));
    }

    /**
     * Log the user in.
     *
     * @param  \Laragear\WebAuthn\Http\Requests\AssertedRequest  $request
     * @return \Illuminate\Http\Response
     */
    // use Illuminate\Http\RedirectResponse;
    // use Illuminate\Http\Response;
    
    public function login(AssertedRequest $request): Response|RedirectResponse
    {
        Event::listen(CredentialCloned::class, function ($cloned) {
            $notification = new FirstNotification($cloned->credential);
            $cloned->credential->user->notify($notification);
        });
    
        if ($request->login()) {

            // Login successful

            return redirect()->url('redirection');
            
        } else {

            // Login failed

            return response()->json(['message' => 'Login failed'], 422);
        }
    }
    


    
}
