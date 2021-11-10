<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Make a reservation in {{$company_name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10 navigation-effect">

                <div class="console_info">
                    <h3  class="font-semibold text-xl ">Company Name</h3>
                    <p>{{$company_name}}</p><br/>
                
                </div>
                
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">E-mail Address</h3>
                    <p>{{$company_email}}</p>
                </div>
                
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Category</h3>
                    <p>{{$category}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Location</h3>
                    <p>{{$city}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Postal Code</h3>
                    <p>{{$post_code}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Address</h3>
                    <p>{{$address}}</p>
                </div>
               
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Phone number</h3>
                    <p>{{$phone_num}}</p>
                </div>
                
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Open time</h3>
                    <p>{{$open_time}}</p>
                </div>
                
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Close time</h3>
                    <p>{{$close_time}}</p>
                </div>

            </div>
            </br>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg console_info_wr res_make p-10 navigation-effect">
                <p>Please wait for company's verifications via SMS and email</p></br>

                <div class="flex">
                    <form method="POST" action="{{ route('reservation_save') }}">
                    @csrf
                    <canvas id="canvas" class="p-0"></canvas> <!--Confetti Generator-->
                        <div class="input" style="display:none;">
                            <label for="company_id">Reservation Date</label>
                            <input name="company_id" type="text" value="{{$company->id}}">
                        </div>
                        <div class="input">
                            <label for="date" class="font-semibold">Reservation Date</label>
                            
                            
                            <div class="group my-3">
                                <label class="input-label pr-3">Pick date</label>
                                <input name="date" type="text" id="pickdate">
                                <span class="bar"></span>
                            </div>
                            @if($company->reservation_frequency === '15')
                            <div class="group my-3">
                                <label class="input-label pr-3">Pick time</label>
                                <input name="time" type="text" id="picktime15">
                            </div>
                            @elseif($company->reservation_frequency === '30')
                            <div class="group my-3">
                                <label class="input-label pr-3">Pick time</label>
                                <input name="time" type="text" id="picktime30">
                            </div>
                            @else
                            <div class="group my-3">
                                <label class="input-label pr-3">Pick time</label>
                                <input name="time" type="text" id="picktime60">
                            </div>
                            @endif
                        </div>
                  
                        <x-jet-validation-errors class="mb-4" />
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <label for="terms" class="flex items-center">
                                            <input type = "checkbox" id="terms" class = "checkbox-login rounded" name="terms">
                                        </label>
    
                                        <div class="ml-2 mb-2 text-left">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif
                        
                        <div>
                        <x-jet-button id="button" class="ml-4 ready confeti message submitMessage button-text" onclick="clickButton();">
                            {{ __('Register') }}
                        </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 
        