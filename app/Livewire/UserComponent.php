<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use Livewire\Component;
use App\Repositories\UserRepositoryInterface;
use Livewire\Attributes\Computed;

class UserComponent extends Component
{
   
    public UserForm $userForm;
    private $userRepository;
    public $editID = 0; 

    public function __construct()
    {
        $this->userRepository = app(UserRepositoryInterface::class);
    }

    public function createUser()
    {
        $this->userForm->validate();
        $this->userForm->setDefaultPassword();
        $this->userRepository->createUser($this->userForm->all());
        session()->flash('message', 'User created successfully!');
        $this->userForm->reset();
    }

    public function getUser($id)
    {
        $this->editID = $id;
        $this->userForm->name = $this->userRepository->getUserById($id)->name;
        $this->userForm->email = $this->userRepository->getUserById($id)->email;
    }

    public function saveEditedUser()
    {
        $this->userForm->validate();
        $this->userForm->setDefaultPassword();
        $this->userRepository->editUser($this->editID, $this->userForm->all());
        session()->flash('message', 'User updated successfully!');
        $this->editID = 0;
        $this->userForm->reset();
    }

    public function deleteUser($id)
    {
        $this->userRepository->deleteUser($id);
        session()->flash('message', 'User deleted successfully!');
    }

    public function render()
    {
        return view('livewire.user-component', [
            'users' => $this->userRepository->getAllUsers(),
        ]);
    }
}
