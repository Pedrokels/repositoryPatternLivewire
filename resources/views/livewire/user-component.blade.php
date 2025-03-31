<div>
    <div class="bg-white p-5 w-xl">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <form wire:submit="createUser" class="flex-col flex space-y-2">
            <input id="name" name="name" type="text" wire:model="userForm.name" placeholder="Name"
                autocomplete="off">
                
            @error('userForm.name')
                <span class="">{{ $message }}</span>
            @enderror
            <input id="email" name="email" type="email" wire:model="userForm.email" placeholder="Email"
                autocomplete="off">
            @error('userForm.email')
                <span class="">{{ $message }}</span>
            @enderror
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</button>
        </form>
        <livewire:view-user-component />
    </div>

</div>
