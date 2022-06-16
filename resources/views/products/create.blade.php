@extends('layouts.app')

@section('content')
    <h5 class="page-title">Add Product</h5>
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
            <form action="/products" method="POST" enctype="multipart/form-data">
                @csrf
                <br>
                <div>
                    <input type="text" name="sku" placeholder="SKU">
                </div>
                <br>
                <div>
                    <input type="text" name="name" placeholder="Product Name">
                </div>
                <br>
                <div>
                    <textarea name="description" placeholder="Product Description"></textarea>
                </div>
                <br>
                <div>
                    <label class="cursor-pointer">
                        <span>Select an image</span>
                        <input type="file" name="image_path" class="hidden">
                    </label>
                </div>
                <br>
                <div>
                    <button class="homepage-btn" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection