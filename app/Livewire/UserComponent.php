<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use Livewire\Component;
use App\Repositories\UserRepositoryInterface;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

class UserComponent extends Component
{
    public UserForm $userForm;
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UserRepositoryInterface::class);
    }

    public function createUser()
    {
        $this->userForm->validate();
        $this->userForm->setDefaultPassword();
        $createdUser = $this->userRepository->createUser($this->userForm->all());
        session()->flash('message', 'User created successfully!');
        $this->userForm->reset();
        $this->dispatch('userCreated', dataCreated: $createdUser);
    }

    public function render()
    {
        return view('livewire.user-component', [
            'users' => $this->userRepository->getAllUsers(),
        ]);
    }
}
