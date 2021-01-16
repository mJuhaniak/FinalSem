<div id="carouselExampleIndicators" class="carousel slide py-4" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ (url('pictures/slideShow1.jpg')) }}" alt="First slide">
            <div class="content centered">
                <h1>{{ old('name') }}</h1>
                <p>{{ old('info') }}</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ (url('pictures/slideShow2.jpg')) }}" alt="Second slide">
            <div class="content centered">
                <h1>{{ old('name') }}</h1>
                <p>{{ old('info') }}</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ (url('pictures/slideShow3.webp')) }}" alt="Third slide">
            <div class="content centered">
                <h1>{{ old('name') }}</h1>
                <p>{{ old('info') }}</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



