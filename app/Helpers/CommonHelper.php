<?php

namespace App\Helpers;

use App\Models\GeneralSettings;
use Carbon\Carbon;

class CommonHelper
{
    /**
     * Convert date from DD-MM-YYYY to YYYY-MM-DD
     */
    public static function toDatabaseFormat($date)
    {
        if (!$date) return null;
        return Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d');
    }

    /**
     * Convert date from YYYY-MM-DD to DD-MM-YYYY
     */
    public static function toDisplayFormat($date)
    {
        if (!$date) return null;
        return Carbon::parse($date)->format('d-m-Y');
    }

    public static function getGeneralSetting($key = null)
    {
        $settings = GeneralSettings::first();
        if (!$settings) {
            return $key ? null : [];
        }
        return $key ? ($settings->$key ?? null) : $settings->toArray();
    }
}
