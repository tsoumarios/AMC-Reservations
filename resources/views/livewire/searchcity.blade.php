<div>
    <div class = "border-dashboard-box">
        <div class="homesearch-wr">
            <div class="homesearch">
                <!-- <x-jet-label for="customcity" value="Choose you city" /> -->
                    <div class="dropdown-container">
                          
                        <select  wire:model="city" >
                            <option value="">Select City:</option>
                            @foreach($allCompanies->unique('city') as $company)
                                <option value='{{ $company->city }}'>{{ $company->city}}</option>
                            @endforeach

                        </select>
                        <div class="select-icon">
                            <svg focusable="false" viewBox="0 0 104 128" width="25" height="35" class="icon">
                            <path d="m2e1 95a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm14 55h68v1e1h-68zm0-3e1h68v1e1h-68zm0-3e1h68v1e1h-68z"></path>
                            </svg>
                        </div>
                    </div>        
            </div>
       
        
            @if(count($categories) > 0)
                <div class="homesearch">
                    <!-- <x-jet-label for="customcity" value="Choose Category" /> -->
                    <div class="dropdown-container">
                            <select wire:model="category_id" >
                                <option value="">Select Category:</option>
                                @foreach($categories as $category)
                                    <option value='{{ $category->id }}'>{{ $category->title }}</option>
                                @endforeach
                            </select>
                             <div class="select-icon">
                                <svg focusable="false" viewBox="0 0 104 128" width="25" height="35" class="icon">
                                <path d="m2e1 95a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm14 55h68v1e1h-68zm0-3e1h68v1e1h-68zm0-3e1h68v1e1h-68z"></path>
                                </svg>
                            </div>
                    </div>
                </div>
            @endif
        </div>

    @if($companies->count() > 0)
  
                <h1>Companies found: {{ $companies->whereIn('city', $city)->whereIn('category_id', $category_id)->count() }}</h1>

            @foreach($companies->whereIn('city', $city)->whereIn('category_id', $category_id)  as $company)
            
                @if($companies->whereIn('city', $city)->whereIn('category_id', $category_id)->count() > 0)
                <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg p-10">
                    <div class="company_card">  
                        @if($company->profile_photo_path)
                            <img style="width: 80px; height:80px; object-fit: cover; border-radius: 50%;" src="/storage/{{$company->profile_photo_path}}" alt="{{$company->company_name}}">
                            @else
                            <div class="company-default">{{$company->company_name}}</div>
                        @endif
                        <div class="company_card_left">
                            <h3  class="font-semibold text-xl ">{{$company->company_name}}</h3>
                            
                            <p>{{$company->category()->pluck('title')[0]}}</p>
                            <p>{{$company->city}}</p>
                        </div>
                        <div class="company_card_right">
                        <x-jet-button class="ml-4">
                            <a href="/company_profile/{{$company->id}}">
                            Make a reservation
                            </a>
                        
                        </x-jet-button>
                        </div>
                    </div>
                </div></br>
                
                @endif
            @endforeach
            
            @if($category_id === "")
            <div class="selected-city">
                Select a category
            </div>
           
            @else
            @if($companies->whereIn('city', $city)->whereIn('category_id', $category_id)->count() === 0)

            <div class="selected-city-long">
                No shops available in this category.
            </div>
          
            @endif
            @endif
        @elseif($city === "" )
            <div class= "selected-city">
                Select a city
            </div>
        @endif
</div>
