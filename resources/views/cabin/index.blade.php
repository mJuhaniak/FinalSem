@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Cabins') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="mb-3" >
                            <a href="{{ route('cabin.create') }}" class="btn btn-sm btn-success" role="button">Add new cabin</a>
                        </div>
                        {!!  $grid->show()  !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
