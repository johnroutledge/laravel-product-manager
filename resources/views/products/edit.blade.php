@extends('layouts.app')

@section('content')
    <h5 class="page-title">Edit Product</h5>
    <hr>
        
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="add-product-container">
        <div class="add-div">
            <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <br>
                <p>SKU:</p>
                <div>
                    <input type="text" name="sku" value="{{ $product->sku }}">
                </div>
                <br>
                <p>Name:</p>
                <div>
                    <input type="text" name="name" value="{{ $product->name }}">
                </div>
                <br>
                <p>Description:</p> 
                <div>
                    <textarea name="description">{{ $product->description }}</textarea>
                </div>
                <br>
                <!-- Add image section back in when figured out how to -->
                <!-- <p>Image:</p>
                <div>
                    <input type="file" name="image_path" class="hidden">
                </div>
                <br> -->
                <div>
                    <a href="{{ url('/products') }}"><button class="mb-2 leagues-btn">Cancel</button></a>
                    <button class="delete-btn" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection

