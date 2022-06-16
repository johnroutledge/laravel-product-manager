@extends('layouts.app')

@section('content')
    <h5 class="page-title">All Products</h5>
    <hr>
    <div class="products">
        <table>
            <tr>
                <th id="table-image">Image</th>
                <th>Name</th>
                <th>Description</th>
                <th class="table-action">Action</th>
            </tr>
            <tr></tr>
            @foreach($product as $product)
            <tr>
                <td><img class="product-image" src="images/{{ $product-> image_path }}" alt="{{ $product-> name }}"></td>
                <td><p class="vert-align"> {{ $product-> name }}</p></td>
                <td><p class="vert-align"> {{ $product-> description }}</p></td>
                <td class="table-action">
                    <a class="vert-align" href="/products/{{ $product-> id }}/edit"><button class="leagues-btn">Edit</button></a>
                    <!----- Confirm delete modal -------------------------------------->
                    <span class="vert-align">
                        <a class="text-danger" data-toggle="modal" data-target="#deleteModal{{ $product-> id }}"><button class="delete-btn">Delete</button></a>
                        <div class="modal fade" id="deleteModal{{ $product-> id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product-> id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="text-center mt-2">
                                        <h6 class="modal-title" id="deleteModal{{ $product-> id }}">
                                            Delete Product
                                        </h6>
                                    </div>
                                    <hr>
                                    <div class="modal-body">
                                        Remove {{ $product-> name }}?<br>
                                    <br>
                                    <p class="text-danger">
                                        <span class="icon">
                                            <i class="bi bi-exclamation-square"></i>
                                        </span>
                                        <span> This cannot be undone!</span>
                                    </p>
                                    </div>
                                    <div class="products modal-align pb-3 ml-3">
                                        <button type="button" class="mb-2 leagues-btn rounded-1" data-dismiss="modal">Cancel</button>
                                        <form action="/products/{{ $product-> id }}" method="POST">
                                            @CSRF
                                            @method('delete')
                                            <button class="delete-btn">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span>
                    <!----- END Confirm delete modal -------------------------------------->
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    
@endsection
