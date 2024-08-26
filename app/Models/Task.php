<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Add user_id to the fillable attributes
        'title',
        'description',
        'priority',
        'due_date',
        'attachments',
        'status',
        'notes',
        'completed',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
