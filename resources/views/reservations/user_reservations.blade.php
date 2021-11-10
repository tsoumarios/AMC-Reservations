<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'My reservations' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight flex">Reservations <a href="javascript:history.go(0)"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 reloader ml-1 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg></a>
            </h1></br>
           
          

            @if($user->reservation()->count() > 0)
                @foreach($user->reservation()->latest()->get() as $reservation)
                    <div class="navigation-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-5">

                        <div style = "display:none;">
                            {{  $company = $reservation->company}}
                            {{  $time = $reservation->time }}
                            {{  $date = $reservation->date }}
                        </div>                
                        <div class="console_info">
                        @if($company->profile_photo_path)
                            <img style="width: 80px; height:80px; object-fit: cover; border-radius: 50%;" src="/storage/{{$company->profile_photo_path}}" alt="{{$company->company_name}}">
                            @else
                            <div class="company-default">{{$company->company_name}}</div>
                        @endif
                            <p>{{ $company->company_name }}</p>
                        </div>

                        <div class="console_info">
                            <h3  class="font-semibold text-xl">Date & Time</h3>
                            <p>{{ $date }}</p>
                            <p>{{ $time }}</p>
                        </div>

                        @if($reservation->rejected_at != null)
                            <br><small class="res_status-date flex justify-center">
                                <h3 class="font-semibold text-xl ">Status</h3>
                                <b class="mr-1 text-red">Rejected at: </b>{{$reservation->rejected_at}}
                            </small>
                        @endif

                        @if($reservation->verified_at != null && $reservation->rejected_at === null)
                            <br><small class="res_status-date flex justify-center">
                                <h3  class="font-semibold text-xl ">Status</h3>
                                <b class="mr-1 text-green">Verified at: </b>{{$reservation->verified_at}}
                            </small>   
                            @elseif($reservation->rejected_at === null)
                            <br>
                            <small class="res_status-date flex justify-center">
                            <h3  class="font-semibold text-xl ">Status</h3>
                                <b class="mr-1">Waiting for response..</br></b>
                                    Reservation sent at:
                                </br>{{$reservation->created_at}}
                            </small>  
                        @endif

                    </div></br>
                @endforeach  
                @else
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                        <div class="console_info">
                            <h3 class="font-semibold text-xl">You don't have any reservations yet! :-)</h3>
                        </div>
                    </div>
            @endif
        </div>
    </div>
</x-app-layout> 
        