<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function __invoke(){
        request()->validate(['email' => 'required|email']);    
        try{
            // $newsletter = new Newsletter();
            // $newsletter->subscribe(request('email'));
            // or
            (new Newsletter())->subscribe(request('email'));
            
        } catch(\Exception $e){
            throw ValidationException::withMessages([
                'email' => 'please enter valide Email'
            ]);
        }
        return redirect('/')->with('success', 'You are now signed up for our newsletter');
    }
}
