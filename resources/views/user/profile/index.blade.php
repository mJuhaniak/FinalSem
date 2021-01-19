@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <div class="row">
        <div class="col-md-3">
        <div class="sidebar">
            <a href="{{ route('user.profile', Auth::id()) }}">Profil</a>
            <a href="{{ route('user.reservations', Auth::id()) }}">Rezervácie</a>
            <button type="button" class="btn" data-toggle="modal" data-target="#removeAccount">
                Zrušiť účet
            </button>
        </div>
        </div>
        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Zmena údajov') }}</div>

                <div class="card-body">
                    @include('user.form')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="removeAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Zrušiť účet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Chcete naozaj zrušiť účet?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nie</button>
                <a href="{{ route('user.delete', Auth::id()) }}" class="btn btn-danger">Áno</a>
            </div>
        </div>
    </div>
</div>
@endsection
