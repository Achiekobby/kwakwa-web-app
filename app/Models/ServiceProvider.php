<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];


    public function service_category(){
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}
