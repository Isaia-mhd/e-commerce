<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribe(){
        $validated = request()->validate([
            "subscribe" => "required|string|email|unique:users,email"
        ]);

        if($validated){
            Subscriber::create([
                "email" => $validated["subscribe"]
            ]);

            return redirect()->back()->with("success", "You Are Subscribed To Our Newsletters! ");
        }
    }
}
