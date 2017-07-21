@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        <div id="appTest">

                            <table class="table-responsive">
                                <todo-list
                                        v-for="todo in todos"
                                        v-bind:todo-obj="todo"
                                        v-bind:key="todo.id"
                                        ></todo-list>
                            </table>


                            <textarea v-model="todoText"></textarea>
                            <button v-on:click="addTodo">Dodaj</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/todo.js') }}"></script>

@endsection