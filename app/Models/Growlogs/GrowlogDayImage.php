<?php

namespace App\Models\Growlogs;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\GrowlogDayImageTransformer;

class GrowlogDayImage extends Model
{
    public $transformer = GrowlogDayImageTransformer::Class;

}
