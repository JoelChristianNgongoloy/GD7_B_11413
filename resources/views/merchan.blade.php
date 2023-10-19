@extends('dashboard')

@section('content')

<style>
    .table-container {
        background-color: #23141E;
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        padding-top: 20px;
        padding-left: 20px;
        padding-right: 20px;
        left: 0;
        z-index: -1;
        overflow-x: hidden;
    }

    .item {
        height: 500px;
        width: 1200px;
        background-color: #23141E;
        overflow-y: scroll;
    }

    .item::-webkit-scrollbar-track-piece {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #1C0414;
    }

    .item::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #D6B56E;
    }

    .item::-webkit-scrollbar {
        width: 7px;
    }

    .table-container .content-index {
        margin-top: 20px;
        margin-left: 20px;
    }

    hr {
        border: 1px solid #D6B56E;
    }

    h2,
    h4,
    h5,
    p {
        font-family: goldenbook, serif;
        font-style: normal;
    }

    h2,
    h4,
    h5 {
        color: #FFFFFF;
    }

    .title:hover h2 {
        color: #D6B56E;
    }

    .title p {
        color: #FFFFFF;
        margin-bottom: 2px;
        margin-right: 10px;
    }

    .card {
        background-color: #23141E;
        box-shadow: 3px 4px 10px 5px rgba(0, 0, 0, .3);
        width: 300px;
        height: 300px;
        color: #FFFFFF;
        margin-top: 40px;
        border-radius: 0px;
        transition: box-shadow 0.3s, transform 0.3s;
    }

    .card:hover {
        box-shadow: 5px 6px 27px 10px #D6B56E;
    }

    .inner {
        transition: transform 0.3s;
    }

    .inner:hover {
        transition: transform 0.3s;
        transform: scale(1.1);
    }


    .seatplan {
        width: 500px;
        height: 600px;
        border: 1px solid #D6B56E;
        border-radius: 10px;
        elevation: 2;
        box-shadow: 0 0 10px #D6B56E;
    }

    .btn-book {
        background-color: transparent;
        border: 1px solid #D6B56E;
        border-radius: 10px;
        color: #FFFFFF;
        elevation: 1;
    }

    .btn-book:hover {
        background-color: #D6B56E;
        color: #000000;
    }
</style>
<div class="container-details">
    <div class="table-container">
        <div class="content-index">
            <div class="title" style="display: flex; justify-content: center">
                <h2 class="mt-3">2022 IU CONCERT〈The Golden Hour: Under The
                    Orange Sun〉</h2>
            </div>
            <div class="mt-4" style="display: flex; justify-content: center;">
                <h4>Our Official Merchandise</h4>
            </div>
            @if($merchandise->isEmpty())
            <div class="d-flex justify-content-center mt-3">
                <h3 style="color:white">No Merchandise available at the moment.</h3>
            </div>
            <hr>
            @else
            <div class="wrap mt-4 d-flex justify-content-center">
                <div class="item row row-cols-3">
                    @php
                    $images = ['1.freya.jpg', '2.zee.jpg', '3.flora.jpg', '4.ashel.jpg', '5.fiony.jpg', '6.amanda.jpg', '7.feni.jpg'];
                    @endphp
                @foreach($merchandise as $item)
                @if (!empty($images))
                    @php
                        $random = array_rand($images);
                        $selectImage = $images[$random];
                        unset($images[$random]);
                    @endphp
                @endif
                    <div class="inner col-3" style="margin: 0px 70px 20px 20px;">      
                        <div class="card d-flex justify-content-center align-items-center">
                            <img style="width: 200px;" src="{{ url('images/' .$selectImage) }}" alt="">
                        </div>
                        <div class="mt-3">
                            <h4>{{$item->name}}</h4>
                            <h5>IDR {{number_format ($item->price, 0,',','.')}}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection