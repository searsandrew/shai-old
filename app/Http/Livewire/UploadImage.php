<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;

use Livewire\Component;

class UploadImage extends Component
{
    use WithFileUploads;

    public $image;
    public $filename;

    public function save()
    {
        $this->validate([
            'image' => 'image|mimes:png|max:2048'
        ]);

        $this->image->storeAs('images', $this->filename);

        $this->emit($this->filename . '-uploaded');
    }

    public function render()
    {
        return view('livewire.upload-image');
    }
}
