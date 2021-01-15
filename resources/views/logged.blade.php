@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<?php /** @var Array $data */ ?>

<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<div class="cards">
    <div class="card">
        <img class="card-img-top" src="https://cf.bstatic.com/images/hotel/max1024x768/229/229488709.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Ubytovanie</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="?c=home&a=news" class="btn btn-dark">Viac</a>
        </div>
    </div>

    <div class="card">
        <img class="card-img-top" src="https://cf.bstatic.com/images/hotel/max1024x768/229/229488709.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Galéria</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="?c=home&a=gallery" class="btn btn-dark">Viac</a>
        </div>
    </div>

    <div class="card">
        <img class="card-img-top" src="https://t.aimg.sk/magaziny/P5NRr6JFTB_ThsbVVLltpg~Ilustra-n-foto.jpg?t=Lzk2MHg1NDAvc21hcnQ&h=8cSvplSnnYZrbFfNAv3llQ&e=2145916800&v=1" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Rezervácie</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="?c=reservation" class="btn btn-dark">Viac</a>
        </div>
    </div>

    <div class="card">
        <img class="card-img-top" src="http://localhost/Sem/pictures/mapa.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Kontakt</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="?c=home&a=contact" class="btn btn-dark">Viac</a>
        </div>
    </div>
</div>
