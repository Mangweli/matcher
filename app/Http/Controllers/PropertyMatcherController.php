<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\SearchFields;
use App\Models\SearchProfile;
use Illuminate\Http\Request;

class PropertyMatcherController extends Controller
{
    public function getProperties(Property $property) {
        $results['success'] = false;
        $results['message'] = "Invalid request";

        if(empty($property)) {
            return response()->json($results, 200);
        }





        dd(
            "Property",
            $property->toArray(),
            "PropertyType",
            PropertyType::where('id', $property->property_type_id)->get()->toArray(),
            "Property Fields",
            PropertyField::where("Property_id", $property->id)->get()->toArray(),
            "Search Fields",
            SearchFields::limit(10)->get()->toArray()

        );
    }
}
