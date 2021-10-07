@include("messages")
<form action="{{ $action }}" id="form" class="form" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @if($formType == "edit")
    @method("PUT")
    @endif
    <div class="mb-3 row">
        <label class="col-md-4 form-label form-label">Property Type</label>
        <div class="col-md-8">
            <select class="form-select" name="property_type" required>
                <option value="" hidden>Select property type</option>
                <option value="House" @if($property->property_type == 'House' || old('property_type') == 'House') selected @endif>House</option>
                <option value="Tenament" @if($property->property_type == 'Tenament' || old('property_type') == 'Tenament') selected @endif>Tenament</option>
                <option value="Bunglow" @if($property->property_type == 'Bunglow' || old('property_type') == 'Bunglow') selected @endif>Bunglow</option>
                <option value="Apartment" @if($property->property_type == 'Apartment' || old('property_type') == 'Apartment') selected @endif>Apartment</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">County</label>
        <div class="col-md-8">
            <input type="text" name="county" value="{{ $property->county ? $property->county : old('county') }}" class="form-control" required />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Town</label>
        <div class="col-md-8">
            <input type="text" name="town" value="{{ $property->town ? $property->town : old('town') }}" class="form-control" required />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Country</label>
        <div class="col-md-8">
            <input type="text" name="country" value="{{ $property->country ? $property->country : old('country') }}" class="form-control" required />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Postcode</label>
        <div class="col-md-8">
            <input type="text" name="postcode" value="{{ $property->postcode ? $property->postcode : old('postcode') }}" class="form-control" required />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Latitude</label>
        <div class="col-md-8">
            <input type="text" name="latitude" value="{{ $property->latitude ? $property->latitude : old('latitude') }}" class="form-control" required />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Longitude</label>
        <div class="col-md-8">
            <input type="text" name="longitude" value="{{ $property->longitude ? $property->longitude : old('longitude') }}" class="form-control" required />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Description</label>
        <div class="col-md-8">
            <textarea name="description" class="form-control" required>{{ $property->description ? $property->description : old('description') }}</textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Full Detail URL</label>
        <div class="col-md-8">
            <input type="url" name="full_detail_url" value="{{ $property->full_detail_url ? $property->full_detail_url : old('full_detail_url') }}" class="form-control" required />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Displayable Address</label>
        <div class="col-md-8">
            <input type="text" name="displayable_address" value="{{ $property->displayable_address ? $property->displayable_address : old('displayable_address') }}" class="form-control" required />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Image</label>
        <div class="col-md-8">
            <input type="file" name="image" class="form-control" @if($formType == 'add') required @endif />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Number of Bedrooms</label>
        <div class="col-md-8">
            <select class="form-select" name="no_of_bedrooms" required>
                <option value="" hidden>Select number of bedrooms</option>
                <option value="1" @if($property->no_of_bedrooms == '1' || old('no_of_bedrooms') == '1') selected @endif>1</option>
                <option value="2" @if($property->no_of_bedrooms == '2' || old('no_of_bedrooms') == '2') selected @endif>2</option>
                <option value="3" @if($property->no_of_bedrooms == '3' || old('no_of_bedrooms') == '3') selected @endif>3</option>
                <option value="4" @if($property->no_of_bedrooms == '4' || old('no_of_bedrooms') == '4') selected @endif>4</option>
                <option value="5+" @if($property->no_of_bedrooms == '5+' || old('no_of_bedrooms') == '5+') selected @endif>5+</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Number of Bathrooms</label>
        <div class="col-md-8">
            <select class="form-select" name="no_of_bathrooms" required>
                <option value="" hidden>Select number of bathrooms</option>
                <option value="1" @if($property->no_of_bedrooms == '1' || old('no_of_bedrooms') == '1') selected @endif>1</option>
                <option value="2" @if($property->no_of_bedrooms == '2' || old('no_of_bedrooms') == '2') selected @endif>2</option>
                <option value="3" @if($property->no_of_bedrooms == '3' || old('no_of_bedrooms') == '3') selected @endif>3</option>
                <option value="4" @if($property->no_of_bedrooms == '4' || old('no_of_bedrooms') == '4') selected @endif>4</option>
                <option value="5+" @if($property->no_of_bedrooms == '5+' || old('no_of_bedrooms') == '5+') selected @endif>5+</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Price</label>
        <div class="col-md-8">
            <input type="text" name="price" value="{{ $property->price ? $property->price : old('price') }}" class="form-control" required />
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-md-4 form-label">Property for</label>
        <div class="col-md-8">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="property_for" value="Rent" id="property_for_rent" checked>
                <label class="form-check-label" for="property_for_rent">
                    Rent
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="property_for" value="Sale" id="property_for_sale" {{ $property->property_for == "Sale" ? "checked" : "" }}>
                <label class="form-check-label" for="property_for_sale">
                    Sale
                </label>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary btn-sm">{{ $formType == "edit" ? "Update" : "Add" }} Property</button>
    </div>
</form>

@push("scripts")
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#form").validate({
            messages: {
                property_type: "Please select property type",
                county: "Please enter county",
                town: "Please enter town",
                country: "Please enter country",
                latitude: "Please enter Latitude",
                longitude: "Please enter Longitude",
                postcode: "Please enter postcode",
                description: "Please enter description",
                full_detail_url: "Please enter full detail url",
                displayable_address: "Please enter displayable address",
                image: "Please select image",
                no_of_bedrooms: "Please select no of bedrooms",
                price: "Please enter property price",
            },
        });
    });
</script>
@endpush