<?php

namespace Manohar\Address\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends ReadOnlyModel
{
    protected $table = 'provinces';

    public function districts(): HasMany
    {
        return $this->hasMany(District::class, 'province_id', 'id');
    }
}
