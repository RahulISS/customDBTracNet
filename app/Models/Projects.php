<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Projects extends Eloquent
{
    use HasFactory;

    public function timezones(): BelongsTo
    {
        return $this->belongsTo(Timezone::class, '_id', 'timezone');
    }
}
