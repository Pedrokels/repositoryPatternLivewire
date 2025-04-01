<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use Livewire\Component;
use App\Repositories\UserRepositoryInterface;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;
    protected $user;
    public UserForm $userForm;
    public $editID = 0;

    public function __construct()
    {
        $this->user = app(UserRepositoryInterface::class);
    }
    public function createUser()
    {
        $this->userForm->validate();
        $this->userForm->setDefaultPassword();
        $this->user->createUser($this->userForm->all());
        // session()->flash('message', 'User created successfully!');
        $this->userForm->reset();
    }

    public function getUser($id)
    {
        $this->editID = $id;
        $this->userForm->editName = $this->user->getUser($id)->name;
        $this->userForm->editEmail = $this->user->getUser($id)->email;
    }

    public function saveEditedUser()
    {
        $this->userForm->validate();
        $this->userForm->setDefaultPassword();
        $this->user->editUser($this->editID, $this->userForm->all());
        // session()->flash('message', 'User updated successfully!');
        $this->editID = 0;
        $this->userForm->reset();
    }
    public function deleteUser($id)
    {
        $this->user->deleteUser($id);
        // session()->flash('message', 'User deleted successfully!');
    }

    public function render()
    {
        return view('livewire.user-component', [
            'users' => $this->user->getAllUsers(),
        ]);
    }
}
