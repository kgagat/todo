@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        Zaloguj sie zeby zobaczyc swoja liste todo!
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/todo.js') }}"></script>

@endsection
