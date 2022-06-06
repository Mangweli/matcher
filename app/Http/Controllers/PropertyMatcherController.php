<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyField;
use App\Models\PropertyType;
use App\Models\SearchFields;
use Illuminate\Http\Request;

class PropertyMatcherController extends Controller
{
    public function index() {
        $property = Property::inRandomOrder()->first();

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
