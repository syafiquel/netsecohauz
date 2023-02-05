<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUploader extends Component
{
    use WithFileUploads;

    public $label, $image;

    public function updatedImage()
    {
        $this->emitUp('save_image', $this->image[0]->getFilename());
    }

    public function render()
    {
        return view('livewire.image-uploader', ['label' => $this->label]);
    }
}
