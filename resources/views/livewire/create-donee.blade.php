<div>
    <form wire:submit.prevent="save">
        <input type="text" wire:model="donee.name">

        <textarea wire:model="donee.description"></textarea>

        <button type="submit">Save</button>
    </form>
    Variable: {{ $donee }}
</div>
