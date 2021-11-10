
<div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-5 my-5">

    <div class="console_info">
        <h3 class="font-semibold text-xl ">User name</h3>
        <p>{{ $user_name }}</p>
    </div>

    <div class="console_info">
        <h3  class="font-semibold text-xl ">Date & Time</h3>
        <p>{{ $time }}</p>
        <p>{{ $date }}</p>
    </div>
    <div class="res_status-wr">
        <small class="res_status-date"><b class="mr-1">Received at: </b>{{$reservation->created_at}}</small>
        @if($reservation->rejected_at != null)
        <br><small class="res_status-date"><b class="mr-1 text-red">Rejected at: </b>{{$reservation->rejected_at}}</small>
        @endif
        @if($reservation->verified_at != null && $reservation->rejected_at === null)
        <br><small class="res_status-date"><b class="mr-1 text-green">Verified at: </b>{{$reservation->verified_at}}</small>
            <x-jet-button wire:click="reject_reservation" class="ml-4 status_label status-reject">
                    Reject                       
            </x-jet-button>        
        @endif
        @if($reservation->verified_at === null && $reservation->rejected_at === null)
            <div class="res_status-buttons">
                <x-jet-button wire:click="verify_reservation" class="ml-4 status_label status-success">
                    Verify                       
                </x-jet-button>
                <x-jet-button wire:click="reject_reservation" class="ml-4 status_label status-reject">
                    Reject                       
                </x-jet-button>
            </div>
        @endif
    </div>
</div>
