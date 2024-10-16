<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    protected $table="parts";
    protected $primaryKey="id";
    public $timestamps=true or false;
    protected $fillable = [
        'name_of_part',
     //   'image_url',
    ];
    public function exercises(){
        return $this->belongsToMany('App\Models\Exercise','part_exercises','part_id','exercise_id');
    }
    public function users(){
        return$this->belongsToMany('App\Models\User','user_parts','part_id','user_id');
    }
}
