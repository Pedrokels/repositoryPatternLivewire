<?php

namespace App\Livewire;

use App\Repositories\UserRepositoryInterface;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\UserForm;

class ViewUserComponent extends Component
{
    public UserForm $userForm;
    private $userRepository;
    public $editID = 0;

    public function __construct()
    {
        $this->userRepository = app(UserRepositoryInterface::class);
        
    } 
    // This is a listener for the userCreated event 
    #[On('userCreated')]
    public function dataSaved($createdUser = null) {}

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
        return view('livewire.view-user-component', [
            'users' => $this->userRepository->getAllUsers(),
        ]);
    }
}
