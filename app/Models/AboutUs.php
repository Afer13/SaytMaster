<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    public function getItems(){
        $items=json_decode($this->items);
        return $items;
    }
    public function getItemsGroup(){
        return $this->splitItems($this->getItems());
    }

    function splitItems($array) {
        $length = count($array);
        $mid = ceil($length / 2);
        $firstGroup = array_slice($array, 0, $mid);
        $secondGroup = array_slice($array, $mid);
        return [$firstGroup, $secondGroup];
    }
}
