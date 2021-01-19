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
        <div class="col-md-6 pt-4">
            <div class="card">
                <div class="card-header">{{ __('Zmena údajov') }}</div>

                <div class="card-body">
                    @include('user.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
