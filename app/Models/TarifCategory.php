<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class TarifCategory extends Model
{
    use HasFactory;
    use Translatable;
    public function tarifs()
    {
        // hasMany связывает эту модель с моделью Product
        return $this->hasMany(Tarif::class);
    }
    protected $translatable = ['title', 'main'];
}
