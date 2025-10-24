<?php
require_once __DIR__.'/config/app.php';
use GoogleSearchResults as GoogleSearch;

$paramas = [
    'engine' => 'facebook_profile',
    'profile_id' => 'ana.soares.171373'
];

$search = new GoogleSearch(KEY_API);

$results = $search->get_json($paramas);

echo '<pre>';
print_r($results);


