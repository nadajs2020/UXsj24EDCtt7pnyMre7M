<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $hidden = ['category_id', 'password'];


    public function scopeActive($query)
    {

        return $query->where('active', 1);
    }

    public function getLogoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'category_id', 'latitude', 'longitude', 'active', 'name', 'address', 'email', 'logo', 'mobile');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Main_categorie', 'category_id', 'id');
    }

    public function getActive()
    {
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }
}
