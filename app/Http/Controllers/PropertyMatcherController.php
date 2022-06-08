<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Repositories\Interfaces\SearchProfileInterface;
use App\Traits\UtilityFunctions;

class PropertyMatcherController extends Controller
{
    use UtilityFunctions;

    private $searchProfileRepository;

    public function __construct(SearchProfileInterface $searchProfileRepository)
    {
        $this->searchProfileRepository = $searchProfileRepository;
    }

    public function getProperties(Property $property) {
        $results['success'] = false;
        $results['message'] = "Invalid request";

        if(empty($property)) {
            return response()->json($results, 200);
        }

        $propertyFields = json_decode($property->fields);

        if(empty($propertyFields)) {
            return response()->json($results, 200);
        }

        $searchProfile = $this->searchProfileRepository->getProfileMatches($propertyFields);

        if($searchProfile->isEmpty()) {
            $results['message'] = "No Search Profile Found";

            return response()->json($results, 200);
        }

        $results = [];

        foreach ($searchProfile as $key => $value) {
           $checkMatches = $this->getScores(json_decode($value->search_fields),$propertyFields);

           $results[$key]['searchProfileId']    = $value->id;
           $results[$key]['score']              = $checkMatches['score'];
           $results[$key]['strictMatchesCount'] = $checkMatches['strictMatchesCount'];
           $results[$key]['looseMatchesCount']  = $checkMatches['looseMatchesCount'];
        }

        $keys = array_column($results, 'score');
        array_multisort($keys, SORT_DESC, $results);

        return response()->json($results, 200);
    }
}
