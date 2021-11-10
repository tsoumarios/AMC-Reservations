<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'company_id', 
        'user_id', 
        'image', 
    ];

    public function company() 
    {
        return $this->belongsTo(Company::class);
    }
}
