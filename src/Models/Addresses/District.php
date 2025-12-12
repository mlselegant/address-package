<?php

namespace Manohar\Address\Models\Addresses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
    protected $table = 'districts';

    protected $guarded = [];

    public $timestamps = false;

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
