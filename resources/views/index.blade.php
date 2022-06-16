@extends('layouts.app')

@section('content')
    <div class="hero">
        <img id="hero-image" src="images/our-story-ball.png" alt="">
        <div id="hero-text">
            <p>Leisure Leagues Product Manager</p>
            <a href="{{ url('/products') }}"><button class="homepage-btn">View Products</button></a>
        </div>
    </div>
    
@endsection