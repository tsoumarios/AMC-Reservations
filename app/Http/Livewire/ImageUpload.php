<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Company;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class ImageUpload extends Component
{
    use WithFileUploads;

    public $profile_photo_path, $old_img;

    public function __construct() {
        $this->old_img = auth()->user()->company->profile_photo_path;
    }

    public function upload() {
        $this->validate([
            'profile_photo_path' => 'image|max:4096', 
        ]);

        // Delete old image
        $oldImage = auth()->user()->company->profile_photo_path;
        File::delete(public_path('storage/'.$oldImage));
        
        $image_path = $this->profile_photo_path->store('company_images', 'public');
        
        
        $arrayToStore = ['profile_photo_path' => $image_path];
        
        // Update new image
        auth()->user()->company()->update($arrayToStore);
        
   
            
        if (Storage::disk('public')->exists($oldImage)) {
            
            $oldImage = public_path().'/'.$oldImage;
 
            @unlink($oldImage);
     
        }

        session()->flash('message', 'Image uploaded.');

    }

    public function delete() {

        $arrayToStore = ['profile_photo_path' => null];
        
        // Update new image
        auth()->user()->company()->update($arrayToStore);
 
        $this->old_img = auth()->user()->company->profile_photo_path;

        File::delete(public_path('storage/'.$oldImage));
        session()->flash('message', 'Image deleted.');
    }

    public function render()
    {
        $company = auth()->user()->company;
        return view('livewire.image-upload', compact('company'));
    }
}
