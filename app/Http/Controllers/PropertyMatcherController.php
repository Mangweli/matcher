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

        if(empty($searchProfile)) {
            return response()->json($results, 200);
        }

        foreach ($searchProfile as $key => $value) {
           $checkMatches = $this->getMatches(json_decode($value->search_fields),$propertyFields);
        }

        dd(
            $propertyFields,
            $query->get(),
            $searchProfile

        );


        // dd(
        //     "Property",
        //     $property->toArray(),
        //     "PropertyType",
        //     PropertyType::where('id', $property->property_type_id)->get()->toArray(),
        //     "Property Fields",
        //     PropertyField::where("Property_id", $property->id)->get()->toArray(),
        //     "Search Fields",
        //     SearchFields::limit(10)->get()->toArray()

        // );
    }
}
