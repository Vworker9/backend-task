@extends ("layout")

@section ("title")
- Property List
@endsection

@section ("content")
<h2>List of properties</h2>

@include("messages")

<div class="mt-3">
    <a href="{{ route('properties.create') }}" class="btn btn-primary btn-sm">Create a Property</a>
</div>
<div class="property-list">
    @if($properties->count() > 0)
        @foreach ($properties as $property)
            <div class="property d-flex flex-wrap gap-3">
                <div>
                    <img src="{{ asset($property->thumbnail_url) }}" alt="Property Image" />
                </div>
                <div>
                    <p><strong>Property Name: </strong>{{ $property->property_type }}</p>
                    <p><strong>County: </strong>{{ $property->county }}</p>
                    <p><strong>Town: </strong>{{ $property->town }}</p>
                    <p><strong>Country: </strong>{{ $property->country }}</p>
                    <p><strong>Postcode: </strong>{{ $property->postcode }}</p>
                    <p><strong>Description: </strong>{{ $property->description }}</p>
                    <p><strong>Displayable Address: </strong>{{ $property->displayable_address }}</p>
                    <p><strong>Number Of Bedrooms: </strong>{{ $property->no_of_bedrooms }}</p>
                    <p><strong>Number Of Bathrooms: </strong>{{ $property->no_of_bathrooms }}</p>
                    <p><strong>Price: </strong>{{ $property->price }}</p>
                    <p><strong>Property for: </strong>{{ $property->property_for }}</p>
                    <p class="mt-2">
                        <a href="{{ route('properties.edit', [ 'property' => $property->id ]) }}" class="btn btn-info btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm btn-delete ms-2" data-property-id="{{ $property->id }}">Delete</button>
                        <form action="{{ route('properties.destroy', [ 'property' => $property->id ]) }}" method="POST" id="property-form-{{ $property->id }}">
                            @csrf
                            @method("DELETE")
                        </form>
                    </p>
                </div>
            </div>
            <hr />
        @endforeach
        {{ $properties->links('pagination') }}
    @else
    <p>No properties found</p>
    @endif
</div>
@endsection

@push("scripts")
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-delete").bind("click", function (event) {
            event.preventDefault();
            if(confirm("Are you sure to delete this property?")) {
                var id = $(this).data("property-id");
                $("#property-form-" + id).submit();
            }
        });
    });
</script>
@endpush
