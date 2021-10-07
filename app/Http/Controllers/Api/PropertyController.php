<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index () {
        $properties = Property::all();
        return response()->json([
            "status" => "1",
            "message" => "Properties retrieved successfully",
            "data" => $properties,
        ]);
    }

    public function store (Request $request) {
        $property_type = $request->get("property_type");
        $county = $request->get("county");
        $town = $request->get("town");
        $country = $request->get("country");
        $postcode = $request->get("postcode");
        $description = $request->get("description");
        $displayable_address = $request->get("displayable_address");
        $image_url = $request->get("image_url");
        $no_of_bedrooms = $request->get("no_of_bedrooms");
        $no_of_bathrooms = $request->get("no_of_bathrooms");
        $price = $request->get("price");
        $property_for = $request->get("property_for");

        if(empty($property_type) || empty($county) || empty($town) || empty($country) ||
            empty($postcode) || empty($description) || empty($displayable_address) || empty($image_url) ||
            empty($no_of_bedrooms) || empty($no_of_bathrooms) || empty($price) || empty($property_for))
        {
            return response()->json([
                "status" => "0",
                "message" => "Parameter(s) missing",
            ]);
        }

        $property = new Property();
        $property->property_type = $property_type;
        $property->county = $county;
        $property->town = $town;
        $property->country = $country;
        $property->postcode = $postcode;
        $property->description = $description;
        $property->displayable_address = $displayable_address;
        $property->no_of_bedrooms = $no_of_bedrooms;
        $property->no_of_bathrooms = $no_of_bathrooms;
        $property->price = $price;
        $property->property_for = $property_for;
        $property->save();

        $property->saveImage($image_url);

        return response()->json([
            "status" => "1",
            "message" => "Property added successfully",
            "data" => $property,
        ]);
    }

    public function update (Request $request, Property $property) {
        $property_type = $request->get("property_type");
        $county = $request->get("county");
        $town = $request->get("town");
        $country = $request->get("country");
        $postcode = $request->get("postcode");
        $description = $request->get("description");
        $displayable_address = $request->get("displayable_address");
        $image_url = $request->get("image_url");
        $thumbnail_url = $request->get("thumbnail_url");
        $no_of_bedrooms = $request->get("no_of_bedrooms");
        $no_of_bathrooms = $request->get("no_of_bathrooms");
        $price = $request->get("price");
        $property_for = $request->get("property_for");

        if(!empty($property_type)) {
            $property->property_type = $property_type;
        }
        if(!empty($county)) {
            $property->county = $county;
        }
        if(!empty($town)) {
            $property->town = $town;
        }
        if(!empty($country)) {
            $property->country = $country;
        }
        if(!empty($postcode)) {
            $property->postcode = $postcode;
        }
        if(!empty($description)) {
            $property->description = $description;
        }
        if(!empty($displayable_address)) {
            $property->displayable_address = $displayable_address;
        }
        if(!empty($no_of_bedrooms)) {
            $property->no_of_bedrooms = $no_of_bedrooms;
        }
        if(!empty($no_of_bathrooms)) {
            $property->no_of_bathrooms = $no_of_bathrooms;
        }
        if(!empty($price)) {
            $property->price = $price;
        }
        if(!empty($property_for)) {
            $property->property_for = $property_for;
        }
        if(!empty($image_url)) {
            $property->image_url = $image_url;
        }
        if(!empty($thumbnail_url)) {
            $property->thumbnail_url = $thumbnail_url;
        }

        $property->save();

        return response()->json([
            "status" => "1",
            "message" => "Property updated successfully",
            "data" => $property,
        ]);
    }

    public function destroy(Property $property)
    {
        $property->delete();
        
        return response()->json([
            "status" => "1",
            "message" => "Property deleted successfully",
        ]);
    }
}
