<div>
    <x-jet-form-section submit="submitInstagramAccount">
        <x-slot name="title">
            {{ __('Add Instagram Account') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('Tambahkan Akun Instagram Yang Dikelola Disini') }}
        </x-slot>
    
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="state.username" autocomplete="username" />
                <x-jet-input-error for="username" class="mt-2" />
            </div>
    
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="password" />
                <x-jet-input-error for="password" class="mt-2" />
            </div>
    
        </x-slot>
    
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>
    
            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
