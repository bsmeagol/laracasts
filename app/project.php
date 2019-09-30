<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    //Wanneer ::create methode gebruikt wordt om niew project te generen
    //zorgt ervoor dat enkel deze vars gezet kunnen worden (vb niet id/timestamp/...)
    protected $fillable = [
      'title','description'
    ];
    //protected $guarded
    //doet omgekeerde -> zegt welke vars NIET gezet mogen worden, en dus al derest wel

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}

