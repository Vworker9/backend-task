@extends ("layout")

@section ("title")
- Edit Property
@endsection

@section ("content")
<h2>Edit Property</h2>

<div class="row mt-3">
    <div class="col-md-10 col-lg-8 col-xl-6">
        @include("properties.form", [
            "action" => route('properties.update', [ 'property' => $property->id ]),
            "property" => $property,
            "formType" => "edit",
        ])
    </div>
</div>
@endsection

