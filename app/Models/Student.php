<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['class_room_id', 'name', 'nis'];

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
