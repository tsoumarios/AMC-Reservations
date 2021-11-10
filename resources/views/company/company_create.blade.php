    

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Company Registration
        </h2>
    </x-slot>

    <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
                <h3>Company Registration</h3>
            </x-slot>

        <x-jet-validation-errors class="mb-4" />
        

        <form method="POST" action="{{ route('company_save') }}">
            @csrf
      
         
            <div>
                <x-jet-label for="company_name" value="Company Name" />
                <x-jet-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autofocus autocomplete="company_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="company_email" value="Company email" />
                <x-jet-input id="company_email" class="block mt-1 w-full" type="email" name="company_email" :value="old('company_email')"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="afm" value="AFM" />
                <x-jet-input id="afm" class="block mt-1 w-full" type="text" name="afm" :value="old('afm')"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="phone_num" value="Phone number" />
                <x-jet-input id="phone_num" class="block mt-1 w-full" type="text" name="phone_num" :value="old('phone_num')"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="address" value="Address" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"/>
            </div>
            <div class="mt-4">
                <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"/>
                <x-jet-label  for="city" value="City"/>
                <select  wire:model="city" >
                    <option value="">Select City:</option>
                    @foreach($cities as $city)
                        <option value='{{ $city->city }}'>{{ $city->city }}</option>
                    @endforeach

                </select>
            </div>
            <div class="mt-4">
                <x-jet-label for="post_code" value="Post code" />
                <x-jet-input id="post_code" class="block mt-1 w-full" type="text" name="post_code" :value="old('post_code')"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="open_time" value="Opening Time" />
                <input type="time" name="open_time"  type="time"/>               
            </div>
            <div class="mt-4">
                <x-jet-label for="close_time" value="Closing Time" />
                <input type="time" name="close_time"  type="time"/>         
            </div>
            <div class="mt-4">
                <x-jet-label for="reservation_frequency" value="Reservation Frequency" />
                <select name="reservation_frequency" id="reservation_frequency">
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="60">60</option>
                </select>
            </div>
           
            <div class="mt-4">
                <x-jet-label for="category_id" value="Category" />
                <select name="category_id" id="category_id">
                @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
                </select>
            </div>


            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                        <label for="terms" class="flex items-center">
								<input type = "checkbox" id="terms" class = "checkbox-login rounded" name="terms">
							</label>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
        
    </x-jet-authentication-card>
</x-app-layout>