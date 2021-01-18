@extends('layouts.app')
@section('content')
    @include('layouts.main')
    <div class="form-group text-danger">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
    <div class="container pt-4">
        <div class="row">
            <div class="col-10">
                <form method="post" action="{{ $action }}">
                    @csrf
                    @method($method)
                    <div class="form-group">
                        <label>Meno a priezvisko</label>
                        <input name="name" type="text" pattern="^[A-Z]{1}[a-zA-Z-]+\s[A-Z]{1}[a-zA-Z-]+$" title="Zadajte meno a priezvisko oddelené medzerou a s veľkým začiatočným písmenom" class="form-control" placeholder="Meno a priezvisko">
                    </div>
                    <div class="form-group">
                        <label>Dátum príchodu</label>
                        <input name="arrival_date" type="date" required class="form-control" value="2020-12-24">
                    </div>
                    <div class="form-group">
                        <label>Dátum odchodu</label>
                        <input name="departure_date" type="date" required class="form-control" value="2020-12-26">
                    </div>
                    <div class="form-group">
                        <label>Chata</label>
                        <input name="object_id" type="number" required title="Zadajte názov chaty" class="form-control" value="{{ $cabin->id }}" readonly>
                    </div>
                    <div class="form-group">
                        @guest
                        @else
                            <label>User ID</label>
                            <input name="user_id" type="number" required class="form-control" value="{{ $user->id }}" readonly>
                        @endguest
                    </div>
                    <div class="form-group">
                        <label>Počet ľudí</label>
                        <input name="people" type="number" required min="2" max="20" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Telefónne číslo</label>
                        <input name="phone" type="text" required pattern="^(09)([0-9]{2})+\s([0-9]{3})+\s([0-9]{3})" class="form-control"
                               title="Telefónne číslo zadajte vo formáte 09-- --- ---" placeholder="0904 232 545">
                    </div>
                    <button type="submit" class="btn btn-success" style="margin-bottom: 50px">Odoslať</button>
                    <a href="{{ route('cabin') }}" class="btn btn-primary" style="margin-bottom: 50px">Späť</a>
                </form>
            </div>
        </div>
    </div>
@endsection
