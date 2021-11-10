<div class="navigation-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-5">
    <div class="form-inputs conf-inputs">
        <div class="input input-hours">
            <label for="open_time">Opening Time</label>
            <p>{{$open_t}}</p>
            <label>       
                <input type="time" value="07:30:00" name="timein[]" wire:model="open_time" type="time"/>
            </label>
        </div>
        <div class="input input-hours">
            <label for="close_time">Close Time</label>
            <p>{{$close_t}}</p>
            <label>
                <input wire:model="close_time" type="time" placeholder="Please select..." />
            </label>
        </div>
        <div class="input input-hours">
            <label for="reservation_frequency">Reservation Frequency</label>
            <p>{{$reservation_fr}}</p>
            <label>
                <select wire:model="reservation_frequency" name="reservation_frequency" id="reservation_frequency">
                    <option value="15">Current: {{$reservation_fr}}</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="60">60</option>
                </select>
            </label>
        </div>
    </div>
    
    <x-jet-button  wire:click="upload" class="ml-4">
        {{ __('Save') }}
    </x-jet-button>
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>