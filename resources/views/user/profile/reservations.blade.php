
@extends('layouts.app')
@section('content')
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <a href="{{ route('user.profile', Auth::id()) }}">Profil</a>
                    <a href="{{ route('user.reservations', Auth::id()) }}">Rezervácie</a>
                    <a href="{{ route('user.delete', Auth::id()) }}">Zmazať účet</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php $counter = 0; ?>
        @foreach($reservations as $key => $data)
            <?php if ($counter%3 == 0) { ?>
            <div class="row">
                <?php } ?>
                <div class="col-md-4 pt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$data->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Počet osôb: {{$data->people}}</h6>
                            <p class="card-text">Dátum príchodu: {{$data->arrival_date}}</p>
                            <p class="card-text">Dátum odchodu: {{$data->departure_date}}</p>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeReservation">Zmazať</button>
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
    <div class="modal fade" id="removeReservation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Zrušiť rezerváciu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Chcete naozaj zrušiť vybranú rezerváciu?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Nie</button>
                    <a href="{{ route('reservations.delete', $data->id) }}" class="btn btn-danger">Áno</a>
                </div>
            </div>
        </div>
    </div>
@endsection

