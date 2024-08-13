<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'parts';

    public function parts() {
        return $this->belongsToMany(Item::class, 'item_parts');
    }
}
