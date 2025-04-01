<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('required')]
    public $name;

    #[Validate('required', 'email', 'unique:users,email')]
    public $email;

    #[Validate('required')]
    public $editName;

    #[Validate('required', 'email', 'unique:users,email')]
    public $editEmail;

    public $password;

    public function setDefaultPassword()
    {
        $this->password = bcrypt('password123');
    }
}
