<div>
    @if ($profile_photo_path)
        Photo Preview:
        <img src="{{ $profile_photo_path->temporaryUrl() }}" style="border-radius:50%; width: 150px; height: 150px; object-fit: cover;" alt=" {{$company->company_name}}">
    @elseif($old_img[0])
        <img src="/storage/{{ $company->profile_photo_path }}" style="border-radius:50%; width: 150px; height: 150px; object-fit: cover;" alt=" {{$company->company_name}}">
    @else
        <div class="company-default">{{$company->company_name}}</div>
    @endif
    <input class="custom-file-input" type="file" wire:model="profile_photo_path">
    <br/>
   <div class="flex">
    <x-jet-button  wire:click="upload" class="mr-1">
            {{ __('Upload') }}
    </x-jet-button>

    <a href="javascript:history.go(0)" wire:click="delete" class="mr-1 status-button status-reject">
        {{ __('Delete') }}
    </a>
    </div>
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>

