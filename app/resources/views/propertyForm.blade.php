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
            <div class="input">
                <label for="price">Price</label>
                <input value="{{$data->price ?? ""}}" type="number" name="price" id="price"
                       placeholder="Price per night"
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
        </form>
    </div>
@endcomponent