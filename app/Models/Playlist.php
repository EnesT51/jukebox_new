<?php

namespace App\Models;

use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    protected $fillable = ['name'];
    use HasFactory;

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'playlist_song');
    }
    public function User(){
        
        return $this->belongsTo(User::class);
    }
}
