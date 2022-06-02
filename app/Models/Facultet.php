<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facultet extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function groups(){
        return $this->hasMany(Group::class);
    }

    public  function students(){
        return $this->hasManyThrough(Student::class, Group::class);
    }

}
