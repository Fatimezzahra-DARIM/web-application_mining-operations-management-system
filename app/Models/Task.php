<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable=['task_name','task_description','admin_id'];
    // public function geologist()
    // {
    //     return $this->belongsTo(User::class, 'geologist_id');
    // }
    // public function admin()
    // {
    //     return $this->belongsTo(User::class, 'admin_id');
    // }
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
