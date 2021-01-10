<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = "tb_todo";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'due_date',
    ];


    // accessor

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format("Y-m-d H:i:s");
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format("Y-m-d H:i:s");
    }
}
