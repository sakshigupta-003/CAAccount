<?php

if (!function_exists('company_settings')) {
    function settings($key = null, $default = null)
    {
       if ($key === null) {
            return \App\Models\CompanySetting::allData(); // Full object
        }
        return \App\Models\CompanySetting::getValue($key, $default); // Single value
    }
}