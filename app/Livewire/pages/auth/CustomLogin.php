<?php

namespace App\Livewire\Pages\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class CustomLogin extends Component
{
    public LoginForm $form;

    public function render()
    {
        return view('livewire.pages.auth.login');
    }

    public function login(): void
    {
        $this->validate();
        $this->form->authenticate();
        Session::regenerate();
        $this->redirectIntended(route('dashboard'), navigate: true);
    }
}
