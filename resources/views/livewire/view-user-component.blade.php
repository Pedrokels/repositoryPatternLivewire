<div>
    <ul>
        @foreach ($users as $user)
            <li>
                @if ($editID === $user->id)
                    <input type="text" wire:model="userForm.name" placeholder="Name">
                    <input type="email" wire:model="userForm.email" placeholder="Email">
                    <button wire:click="saveEditedUser">Save changes</button>
                @else
                    <span>{{ $user->name }}</span>
                    <span>{{ $user->email }}</span>
                @endif
                <button wire:click="getUser({{ $user->id }})">Edit</button>
                <button wire:click="deleteUser({{ $user->id }})">Delete</button>
            </li>
        @endforeach
    </ul>
    {{ $users->links() }}
</div>
