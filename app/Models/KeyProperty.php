<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyProperty extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function homes()
    {
        return $this->belongsToMany(Home::class,'properties','home_id','key_property_id')->withPivot(['value','icon','price']);
    }
}
