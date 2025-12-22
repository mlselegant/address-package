<?php

namespace Manohar\Address\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends ReadOnlyModel
{
    protected $table = 'districts';

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'district_id');
    }
}
