<?php

namespace Manohar\Address\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class City extends ReadOnlyModel
{
    protected $table = 'cities';

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    /**
     * Below are helpers.
     * Use in select options
     */

    /**
     * getCityCache() Use in select options
     */
    public static function getCityCache()
    {
        return Cache::remember('all_cities', now()->addDay(), function () {
            return self::all()->pluck('name', 'id');
        });
    }

    /**
     * Get full address like: [Kathmandu Metropolitan City, Kathmandu, Bagmati Pradesh]
     *
     * @param int $cityId
     * @return string|null
     */
    public static function fullAddressByCityId(int $cityId): ?string
    {
        $query = static::where('cities.id', $cityId)
            ->join('districts', 'cities.district_id', '=', 'districts.id')
            ->join('provinces', 'districts.province_id', '=', 'provinces.id')
            ->selectRaw("cities.name || ', ' || districts.name || ', ' || provinces.name as formatted_address")
            ->first();
        return $query?->formatted_address;
    }
}
