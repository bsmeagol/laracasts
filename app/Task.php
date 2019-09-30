<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title','description','completed','project_id'
    ];
    //
    public function project()
    {
            return $this->belongsTo(Project::class);
    }
    public function complete(bool $hascompleted)
    {
        $this->update(['completed' => $hascompleted]);
    }
}
