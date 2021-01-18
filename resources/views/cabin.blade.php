@extends('layouts.app')
@section('content')
    @include('layouts.main')
<div class="container">
    <?php $counter = 0; ?>
    @foreach($cabins as $key => $data)
        <?php if ($counter%3 == 0) { ?>
        <div class="row">
            <?php } ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$data->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Kapacita: {{$data->capacity}}</h6>
                        <p class="card-text">Popis: {{$data->info}}</p>
                        <a href="{{ route('reservations', $data->id) }}"class="btn btn-dark">Rezervovať</a>
                    </div>
                </div>
            </div>
                <?php
                $counter++;
                if ($counter%3 == 0) { ?>
        </div>
        <?php
        }
        ?>
    @endforeach
</div>
@endsection
