<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $table="exercises";
    protected $primaryKey="id";
    public $timestamps=true or false;
    protected $fillable = [
        'name',
        'counter',
        'duration',
        'description',
        'calories',
        'gif_url',
        'points',
       // 'sportprogram_id',
      //  'part_id'
    ];
  //  public $with=['Sportprogram'];
    public function parts(){
        return $this->belongsToMany('App\Models\Part','part_exercises','exercise_id','part_id');
    }
    public function sports(){
        return $this->belongsToMany('App\Models\Sportprogram','exercise_sprograms','exercise_id','sportprogram_id');
    }
}
