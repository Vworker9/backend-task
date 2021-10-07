<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{
    private $routeName = "properties.";
    private $viewFolder = "properties.";
    private $uploadPath = "user-uploads/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::paginate(10);
        return view($this->viewFolder . "index", compact("properties"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property = new Property();
        return view($this->viewFolder . "create", compact("property"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "property_type" => "required",
            "county" => "required",
            "town" => "required",
            "country" => "required",
            "postcode" => "required",
            "description" => "required",
            "displayable_address" => "required",
            "image" => "required|image",
            "no_of_bedrooms" => "required",
            "no_of_bathrooms" => "required",
            "price" => "required",
        ]);

        $property = new Property();
        $this->saveProperty($request, $property);
        
        return redirect()->route($this->routeName . "index")->with("success", "Property added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return redirect()->route($this->routeName . "index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view($this->viewFolder . "edit", compact("property"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            "property_type" => "required",
            "county" => "required",
            "town" => "required",
            "country" => "required",
            "postcode" => "required",
            "description" => "required",
            "displayable_address" => "required",
            "image" => "image",
            "no_of_bedrooms" => "required",
            "no_of_bathrooms" => "required",
            "price" => "required",
        ]);

        $this->saveProperty($request, $property);
        
        return redirect()->route($this->routeName . "index")->with("success", "Property updted successfully");
    }

    private function saveProperty (Request $request, $property) {
        $property->property_type = $request->property_type;
        $property->county = $request->county;
        $property->town = $request->town;
        $property->country = $request->country;
        $property->postcode = $request->postcode;
        $property->description = $request->description;
        $property->displayable_address = $request->displayable_address;
        $property->no_of_bedrooms = $request->no_of_bedrooms;
        $property->no_of_bathrooms = $request->no_of_bathrooms;
        $property->price = $request->price;
        $property->property_for = $request->property_for;
        $property->save();
        
        if($request->hasFile("image")) {
            if(!empty($property->image_url)) File::delete($property->image_url);
            if(!empty($property->thumbnail_url)) File::delete($property->thumbnail_url);
                
            $file = $request->file("image");
            $property->saveImage($file->getPathname(), $file->getClientOriginalName());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        File::delete($property->image_url);
        File::delete($property->thumbnail_url);

        $property->delete();

        return redirect()->route($this->routeName . "index")->with("success", "Property deleted successfully");
    }
}
