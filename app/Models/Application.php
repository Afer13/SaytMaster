<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    public function type(){
        return $this->hasOne(ApplicationType::class,'id','type_id');
    }
}
