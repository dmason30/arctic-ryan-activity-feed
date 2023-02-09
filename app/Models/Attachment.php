<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public $timestamps = false;

    use HasFactory;
    use HasUuids;

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function attachable()
    {
        return $this->morphTo();
    }
}
