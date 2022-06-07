<?php

namespace App\Repositories;

use App\Models\SearchProfile;
use App\Repositories\Interfaces\SearchProfileInterface;

class SearchProfileRepository implements SearchProfileInterface
{
    public function getProfileMatches($propertyFields) {
        return SearchProfile::where(function($query) use($propertyFields) {
                                    foreach($propertyFields as $key => $propertyField) {
                                        $query->orWhereJsonContains('search_fields->'.$key, $propertyField);
                                    }
                            })->get();
    }
}
