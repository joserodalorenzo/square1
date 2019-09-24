@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bienvenido</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('fecha.crear')}}" method="POST">
                            @csrf

                            @error('date')
                            <div class="alert alert-danger">
                                Tienes que indicar una fecha.
                            </div>
                            @enderror
                            <input type="date" name="date" id="date" placeholder="Fecha de nacimineto" value="{{old('date')}}">
                            <button name="btn" type="submit" id="btn" class="btn btn-success">Calcular
                            </button>
                        </form>

                        <div class="fecha">
                            @if(session('fechaback'))
                                <div class="alert alert-success">
                                    {{session('fechaback')}}
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
