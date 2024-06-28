<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $table = 'students';

    //mendefinisikan field yang boleh di isi
    protected $fillable = ['name','nim','major','class', 'course_id'];

    //relasi ke model course ( 1 student memiliki 1 course / 1 to 1 )
    public function course(){
        return $this->belongsTo(Course::class);
    }
}