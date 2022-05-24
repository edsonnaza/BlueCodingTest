<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Controller\ShortLinkController;

class ShortLink extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'shortlink', 'longlink','counter','title'
    ];
}
