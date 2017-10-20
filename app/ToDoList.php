<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    protected $table = "tbl_list";
    protected $primary = "id";
    protected $fillable = ['title','description','done','image'];
    public $timestamps = false;
}
