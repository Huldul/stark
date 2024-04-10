<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
class AboutPage extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['mission', 'head_main', 's', 't', 'a', 'r', 'k', 'cars', 'rewievs', 'years', 'backs', 'max', 'first'];
}
