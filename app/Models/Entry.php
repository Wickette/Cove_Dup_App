<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = ['cove_id', 'type', 'title', 'body', 'url', 'media_path'];

    public function cove()
    {
        return $this->belongsTo(Cove::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
