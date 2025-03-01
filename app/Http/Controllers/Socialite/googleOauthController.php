<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Auth;

class googleOauthController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $newUser = User::updateOrCreate(
                [
                    'email' => $googleUser->getEmail(),
                ],
                [
                    'name' => $googleUser->getName(),
                    'email_verified_at' => now(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('random_password'),
                ],
            );

            Auth::login($newUser);

            return redirect()->route('home')->with('success', 'User Logged In Successfully!');
        } catch (RequestException $e) {
            return redirect()->back()->with('error', 'Impossible de se connecter à Internet. Vérifiez votre connexion et réessayez.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Erreur de connexion à la base de données. Veuillez contacter l\'administrateur.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Une erreur inattendue s\'est produite. Veuillez réessayer.');
        }
    }
}
