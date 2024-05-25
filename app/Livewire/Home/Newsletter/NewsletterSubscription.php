<?php

namespace App\Livewire\Home\Newsletter;

use App\Models\Subscription;
use Livewire\Component;

class NewsletterSubscription extends Component
{

    public $email;

    public function subscribe() {
        $this->validate([
            'email' => 'required|email|max:255|min:4|unique:subscriptions,email,except,id'
        ]);

        $lang = app()->getLocale();

        Subscription::create([
            'email' => $this->email,
            'status' => '1',
            'code' => $lang,
            'ip' => \Request::ip(),
        ]);

        session()->flash('success-message', 'Congratulations!! You will be updated with the promotions everyday.');
    }

    public function render()
    {
        return view('livewire.home.newsletter.newsletter-subscription');
    }
}
