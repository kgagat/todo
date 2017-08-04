@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Twoj lista do zrobienia</div>

                    <div class="panel-body">

                        <div>Test numer trzy</div>

                        <div id="appTest">
                            <div>@{{error}}</div>


                            <table class="table-responsive">
                                <draggable :list="todos" class="dragArea" v-on:end="zapiszSortowanie">
                                    <todo-list
                                            v-for="todo in todos"
                                            v-bind:todo-obj="todo"
                                            v-bind:key="todo.id"
                                            :todo-obj.sync="todo"
                                            v-on:usun="deleteTod"
                                            ></todo-list>
                                </draggable>

                            </table>

                            <div v-if="isLogged" id="todoText">
                                <textarea v-model="todoText" cols="53" rows="2"></textarea>

                                <div id="addButton">
                                    <button v-on:click="addTodo" class="btn btn-success">Dodaj</button>
                                </div>
                            </div>
                            <div v-else>
                                Musisz sie
                                <a href="login">zalogowac</a>
                                zeby dodawac nowe zadania
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>

        var czyZalogowany = @if($czyZalogowany) true
        @else false @endif;

    </script>

    <script src="{{ asset('js/todo.js') }}"></script>

@endsection