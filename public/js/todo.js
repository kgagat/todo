Vue.component('todoList', {
    props: ['todoObj'],
    template: '<tr>' +
    '<td><div class="round"><input v-bind:id="todoObj.id" type="checkbox" v-on:click="toggle" v-model="todoObj.done" /><label v-bind:for="todoObj.id"></label></div></td>' +
    '<td class="textTodo">{{todoObj.description}}</td>' +
    '<td><button v-on:click="deleteTodo" class="btn-xs btn-danger">delete</button></td>' +
    '</tr>',

    methods: {
        toggle: function () {
            var self = this;
            axios.post('/todo/toggleTodo', {
                'todoId': this.todoObj.id
            }).then(function (response) {
                console.log(self.todoObj.done = response.data.done);
            });
        },
        deleteTodo: function () {
            var self = this;
            axios.post('/todo/deleteTodo', {
                'todoId': this.todoObj.id
            }).then(function (response) {
                console.log(response);
                self.$emit('usun', self.todoObj);
            });

        }
    }
});


var app = new Vue({
        el: '#appTest',
        data: {
            todos: [],
            todoText: '',
            error: '',
            isLogged: czyZalogowany

        },
        methods: {
            zapiszSortowanie: function () {
                console.log('Zapisz sortowanie na serwerku!');
                var todosIds = [];
                this.todos.forEach(function(todo){
                    todosIds.push(todo.id);
                    });
                axios.post('/todo/sortTodo', {
                    'todosIds': todosIds
                }).then(function (response) {
                    console.log(response.data);
                });

                    // AJAX tu!
                // wysylam: ???
                console.log(todosIds);

            },
            addTodo: function () {
                var self = this;
                this.error = '';
                axios.post('/todo/addTodo', {
                    'newTodo': this.todoText
                }).then(function (response) {
                    console.log(response);
                    self.todos.unshift({
                            'id': response.data.id,
                            'description': response.data.description,
                            'done': response.data.done
                        }
                    );
                    self.todoText = '';

                }).catch(function (error) {
                    console.log(error);
                    var errors = error.response.data.newTodo[0];
                    //console.log(errors);
                    self.error = errors;

                });


            },
            toggle: function () {
                console.log('toggle?');
            },
            deleteTod: function (todo) {
                console.log('Should delete this todo: ', todo);
                var index = this.todos.indexOf(todo);
                if (index > -1) {
                    this.todos.splice(index, 1);
                }
            }
        },
        created: function () {
            var self = this;
            axios.get('/todo').then(function (response) {
                    console.log(response.data);
                    self.todos = response.data;
                }
            );

        }
    })
    ;


