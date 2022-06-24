@component("layouts.layout")
    @styles("property-form")
    <div class="propertyForm">
        <h1>{{$title}}</h1>
        <form action="{{$action}}" method="post" class="form">
            @if($error ?? false)
                <div class="error">{{$error}}</div>
            @endif
            <div class="input">
                <label for="name">Name</label>
                <input value="{{$data->name ?? ""}}" type="text" name="name" id="name" required>
            </div>
            <div class="input">
                <label for="address">Address</label>
                <input value="{{$data->address ?? ""}}" type="text" name="address" id="address" required>
            </div>
            <div class="input">
                <label for="city">City</label>
                <input value="{{$data->city ?? ""}}" type="text" name="city" id="city" required>
            </div>
            <div class="input">
                <label for="country">Country</label>
                <input value="{{$data->country ?? ""}}" type="text" name="country" id="country" required>
            </div>
            {{--                 select that has two options hotel | apartment and hotel is selected by default--}}
            <div class="input">
                <label for="type">Property Type</label>
                <select name="type" id="type">
                    @foreach(["apartment", "hotel"] as $type)
                        <option value="{{$type}}" {{ ($data->type ?? "") == $type ? "selected" : ""}}>{{ucfirst($type)}}</option>
                    @endforeach
                </select>
                <div class="input">
                    <label for="price">Price</label>
                    <input value="{{$data->price ?? ""}}" type="number" name="price" id="price"
                           placeholder="Price per night"
                           required>
                </div>
                <div class="input">
                    <label for="guests">Guests</label>
                    <input value="{{$data->guests ?? ""}}" min="1" type="number" name="guests" id="guests"
                           placeholder="Number of guests"
                           required>
                </div>
                <div class="input">
                    <label for="image">Preview Image</label>
                    <input value="{{$data->image ?? ""}}" type="text" name="image" id="image" required>
                </div>
                <div class="input">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"
                              required>{{$data->description ?? ""}}</textarea>
                </div>
                <button type="submit">{{$button}}</button>
            </div>
        </form>
    </div>
@endcomponent