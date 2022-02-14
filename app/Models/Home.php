<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Home extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['title','price','cover_image','city','desc','sales_agent','sales_agent_phone','link'];


    /**
     * Get all of the post's images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }



public function properties()
{
    return $this->belongsToMany(KeyProperty::class,'properties','key_property_id','home_id')->withPivot(['value','icon','price']);
}
}
