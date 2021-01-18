@extends('layouts.app')

@section('content')
    @include('layouts.main')
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin-bottom: 5%">
                    <div class="card">
                        <img class="card-img-top" src="https://cf.bstatic.com/images/hotel/max1024x768/229/229488709.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Info</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="{{ route('info') }}" class="btn btn-dark">Viac</a>
                        </div>
                    </div>
            </div>
            <div class="col-md-6" style="margin-bottom: 5%">
                <div class="card">
                    <img class="card-img-top" src="https://cf.bstatic.com/images/hotel/max1024x768/229/229488709.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Galéria</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="{{ route('gallery') }}" class="btn btn-dark">Viac</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="margin-bottom: 5%">
                <div class="card">
                    <img class="card-img-top" src="https://cf.bstatic.com/images/hotel/max1024x768/229/229488709.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Ubytovanie</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="{{ route('cabin') }}" class="btn btn-dark">Viac</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="margin-bottom: 5%">
                <div class="card">
                    <img class="card-img-top" src="https://cf.bstatic.com/images/hotel/max1024x768/229/229488709.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Rezervácie</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="{{ route('cabin') }}" class="btn btn-dark">Viac</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


