<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class IndexPage extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['head_title', 'head_mini', 'serv_title', 'serv_main', 'serv_mini', 'task_title', 'task_mini', 'exp_title', 'exp_mini', 'stock_title', 'stock_mini', 'inst_title', 'inst_mini', 'faq_title', 'faq_mini', 'rev_title', 'rev_mini'];
}
