<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        "service_name",
        "slug",
        "tagline",
        "service_category_id",
        "price",
        "discount",
        "discount_type",
        "service_image",
        "thumbnail",
        "service_description",
        "inclusion",
        "exclusion",
        "status"
    ];

    public function service_category(){
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }
}
