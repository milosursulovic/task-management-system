<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'assigned_to',
        'created_by',
        'completed'
    ];

    public function user()
    {
        return $this->belongsTo(CustomUser::class, 'assigned_to');
    }

    public function creator()
    {
        return $this->belongsTo(CustomUser::class, 'created_by');
    }
}
