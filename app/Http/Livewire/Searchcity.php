<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Category;

class Searchcity extends Component
{
    //City model
    protected $table = 'categories';
    public $city = "";
    public $category_id = "";

    public function render()
    {
        $city = $this->city;
     
        $category_id = $this->category_id;
        
        $allCompanies = Company::all();
        $companies = $allCompanies->whereIn('city', $city);
        $categories = Category::all();
        return view('livewire.searchcity', compact('companies', 'categories', 'category_id', 'allCompanies'));
    }
}
