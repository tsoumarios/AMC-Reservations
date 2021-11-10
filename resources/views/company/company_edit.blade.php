        
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit {{$company->company_name}} Information
            </h2>
        </x-slot>
        
        @if(auth()->user()->company->id === $company->id)
    
        <x-jet-authentication-card>
            <div class="image_upload-wr">
                @livewire('image-upload')
            </div>
            <h1>Edit Company Information</h1>

            <x-slot name="logo">
                <!-- <x-jet-authentication-card-logo /> -->
            </x-slot>
           
          

            <x-jet-validation-errors class="mb-4" />
        
            <form method="POST" action="/company_profile/{{$company->id}}">
                @csrf
                @method('PATCH')

            
                <div class="form-inputs">
                    <div class="mt-4">
                        <x-jet-label for="company_name" value="Company Name" />
                        <x-jet-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" value="{{ old('company_name') ?? $company->company_name }}" required autofocus autocomplete="company_name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="company_email" value="Company email" />
                        <x-jet-input id="company_email" class="block mt-1 w-full" type="email" name="company_email" value="{{ old('company_email') ?? $company->company_email }}"/>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="afm" value="AFM" />
                        <x-jet-input id="afm" class="block mt-1 w-full" type="text" name="afm" value="{{ old('afm') ?? $company->afm }}"/>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="phone_num" value="Phone number" />
                        <x-jet-input id="phone_num" class="block mt-1 w-full" type="text" name="phone_num" value="{{ old('phone_num') ?? $company->phone_num }}"/>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="address" value="Address" />
                        <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ old('address') ?? $company->address }}"/>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="city" value="City" />
                        <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" value="{{ old('city') ?? $company->city }}"/>
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="post_code" value="Post code" />
                        <x-jet-input id="post_code" class="block mt-1 w-full" type="text" name="post_code" value="{{ old('post_code') ?? $company->post_code }}"/>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
            @else
            <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg p-10">
                    You are not authorized to edit this company's profile.
                </div>
            </div>
            @endif
    </x-app-layout>