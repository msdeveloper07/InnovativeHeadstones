<?php

// Get Country Name
function get_country_name($country_id) {
    $res = DB::table('countries')->select('name')->where('id', $country_id)->first();
    return $res->name;
}
// Get State Name
function get_state_name($state_id) {
    $res = DB::table('states')->select('name')->where('id', $state_id)->first();
    return $res->name;
}

// Get City Name
function get_city_name($city_id) {
    $res = DB::table('cities')->select('name')->where('id', $city_id)->first();
    return $res->name;
}

