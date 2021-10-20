<div>
    <form wire:onchange="save">
        <x-jet-input type="file" class="mt-1 block w-full" wire:model="image" autocomplete="image" />
        <x-jet-input-error for="image" class="mt-2" />
    </form>
</div>
