<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'items';

    public function parts() {
        return $this->belongsToMany(Part::class, 'item_parts');
    }
}
