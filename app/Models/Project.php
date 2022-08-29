<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table='projects';
    protected $fillable=[
        'name',
        'description',
        'time',
        'price',
        'image',
        'status'
    ];
    public function comment(){
        return $this->hasMany('App\Models\Comment', 'project_id', 'id');
    }
}
