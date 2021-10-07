@extends ("layout")

@section ("title")
- Add Property
@endsection

@section ("content")
<h2>Add Property</h2>

<div class="row mt-3">
    <div class="col-md-10 col-lg-8 col-xl-6">
        @include("properties.form", [
            "action" => route('properties.store'),
            "property" => $property,
            "formType" => "add",
        ])
    </div>
</div>
@endsection

