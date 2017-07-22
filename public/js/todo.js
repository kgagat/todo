Vue.component('todoList', {
    props: ['todoObj'],
    template: '<tr>' +
    '<td>{{todoObj.description}}</td>' +
    '<input type="checkbox" v-on:click="toggle" v-model="todoObj.done" />' +
    '<button v-on:click="deleteTodo">usun</button>' +
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
                self.$emit('delete', self.todoObj);
            });

        }
    }
});


var app = new Vue({
        el: '#appTest',
        data: {
            todos: [],
            todoText: ''

        },
        methods: {
            addTodo: function () {
                var self = this;

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
                    var errors = error.response.data.description[0];
                    console.log(errors);
                    self.error = errors;

                });


            },
            toggle: function () {
                console.log('toggle?');
            },
            deleteTodo: function (todo) {
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

