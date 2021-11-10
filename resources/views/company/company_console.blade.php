<x-app-layout style="min-height:1500px">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Company Console' }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="navigation-effect edit-button" href="{{ route('company_profile_edit', $company->pluck('id')[0]) }}"><small>Edit your Information</small></a>
            <div class="navigation-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                <div class="console_info">
                    @if($company->pluck('profile_photo_path')[0])
                            <img src="/storage/{{ $company->pluck('profile_photo_path')[0] }}" style="border-radius:50%; width: 80px; height: 80px; object-fit: cover;" alt=" {{$company->pluck('company_name')[0]}}" srcset="">
                            @else
                            <div class="company-default">{{$company->pluck('company_name')[0]}}</div>
                        @endif
                </div>
                <div class="console_info">  
                    <h3 class="font-semibold text-xl ">Owner name</h3>
                    <p>{{$ownername}}</p><br/>
                </div>

                <div class="console_info">
                    <h3  class="font-semibold text-xl ">Company Name</h3>
                    <p>{{$company_name}}</p><br/>
                
                </div>
                
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company Email</h3>
                    <p>{{$company_email}}</p>
                </div>
                
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company Category</h3>
                    <p>{{$category}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company Location</h3>
                    <p>{{$city}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company Postal Code</h3>
                    <p>{{$post_code}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company Address</h3>
                    <p>{{$address}}</p>
                </div>

            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Configurations</h1></br>
     
            @livewire('company-config')
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight" >Reservations</h1></br>
           <!-- Tabs -->
           <ul id="tabs" class="inline-flex w-full px-5 pt-2 glass-effect">
                <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#first">Incoming</a></li>
                <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">Verified</a></li>
                <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">Rejected</a></li>
                <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#fourth">All</a></li>
            </ul>
            
            @if($reservations != null)
                <!-- Tab Contents -->
                <div id="tab-contents">
                    <div id="first" class="console_tab p-4">
                        <div class="flex justify-center items-center">
                            <h1 class="px-3 py-3">Incomming reservations</h1>
                            <a href="javascript:history.go(0)"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 reloader w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg></a>
                        </div>
                        @if($reservations->where('verified_at', null)->where('rejected_at', null)->count() === 0)
                        <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                            <div class="console_info">
                                <h3 class="font-semibold text-xl">You don't have any incoming reservations at this momment! :-)</h3>
                            </div>
                        </div>
                        @else
                            @foreach($reservations->where('verified_at', null)->where('rejected_at', null) as $reservation)
                                @livewire('console-reservations', 
                                ['reservation' => $reservation,
                                'user_name' => $users->whereIn('id',$reservation->user_id)->pluck('name')[0], 
                                'time' => $reservation->time,
                                'date' => $reservation->date  ,
                                'date' => $reservation->date 
                                ])
                            @endforeach  
                        @endif
                    </div>
                    
                    <div id="second" class="console_tab hidden p-4">
                        <div class="flex justify-center items-center">
                            <h1 class="px-3 py-3">Verified reservations</h1>
                           
                            <a href="javascript:history.go(0)"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 reloader w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg></a>
                        </div>
                    @if($reservations->whereNotNull('verified_at')->count() === 0)
                        <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                            <div class="console_info">
                                <h3 class="font-semibold text-xl">You have not any reservations yet! :-)</h3>
                            </div>
                        </div>
                    @else
                        @foreach($reservations->whereNotNull('verified_at') as $reservation)
                                @livewire('console-reservations', 
                                ['reservation' => $reservation,
                                'user_name' => $users->whereIn('id',$reservation->user_id)->pluck('name')[0], 
                                'time' => $reservation->time,
                                'date' => $reservation->date  
                                ])
                        @endforeach  
                    @endif
                    </div>
                    
                    <div id="third" class="console_tab hidden p-4">
                        <div class="flex justify-center items-center">
                            <h1 class="px-3 py-3">Rejected reservations</h1>
                            
                            <a href="javascript:history.go(0)"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 reloader w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg></a>
                        </div>
                        @if($reservations->whereNotNull('rejected_at')->count() < 1)
                            <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                                <div class="console_info">
                                    <h3 class="font-semibold text-xl">You have not any rejected reservations yet! :-)</h3>
                                </div>
                            </div>
                        @else
                            @foreach($reservations->whereNotNull('rejected_at') as $reservation)
                                @livewire('console-reservations', 
                                ['reservation' => $reservation,
                                'user_name' => $users->whereIn('id',$reservation->user_id)->pluck('name')[0], 
                                'time' => $reservation->time ,
                                'date' => $reservation->date  
                                ])
                            @endforeach  
                        @endif
                    </div>

                    <div id="fourth" class="console_tab hidden p-4">
                        <div class="flex justify-center items-center">
                        <h1 class="px-3 py-3">All reservations</h1>
                        
                        <a href="javascript:history.go(0)"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 reloader w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg></a>
                    </div>
                        @if($reservations->count() < 1)
                                <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                                    <div class="console_info">
                                        <h3 class="font-semibold text-xl">You have not any reservations yet! :-)</h3>
                                    </div>
                                </div>
                            @else
                            @foreach($reservations as $reservation)
                                    @livewire('console-reservations', 
                                    ['reservation' => $reservation,
                                    'user_name' => $users->whereIn('id',$reservation->user_id)->pluck('name')[0], 
                                    'time' => $reservation->time,
                                    'date' => $reservation->date  
                                    ])
                            @endforeach  
                        @endif
                    </div>
                </div>

                @else
                    <div class="navigation-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                        <div class="console_info">
                            <h3 class="font-semibold text-xl">You don't have any reservations yet! :-(</h3>
                        </div>
                    </div>
            @endif
        </div>
    </div>
</x-app-layout> 
        