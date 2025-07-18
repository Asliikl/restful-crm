<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Task extends Model
{
    protected $fillable = ['employee_id', 'title', 'status'];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
