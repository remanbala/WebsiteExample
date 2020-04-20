<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Frontpage extends Model
{
    protected $table = 'frontpage';

    protected $fillable = [
        'image',
        'title',
        'desc',
    ];

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
