const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: 'server.php',
            todos: [],
            new_task: "",
        }
    },
    methods: {
        //metodo per la lettura dei todos
        getTodos() {
            axios.get(this.apiUrl).then((response) => {
                console.log(response);
                this.todos = response.data;
            })
        },
        deleteTodo(index) {
            axios.post(this.apiUrl, {'index':index, 'delete':true}, {headers: {'Content-Type': 'multipart/form-data'}})
            .then(response => {
                this.todos = response.data
            })
        },
        changeDone(index) {
            axios.post(this.apiUrl, {'index':index, 'edit':true, 'text': this.todos[index].text}, {headers: {'Content-Type': 'multipart/form-data'}})
            .then(response => {
                this.todos = response.data
            })
        },
        addTask() {
            axios.post(this.apiUrl, {'new_task':this.new_task, 'add':true}, {headers: {'Content-Type': 'multipart/form-data'}})
            .then(response => {
                this.todos = response.data
                this.new_task = "";
            })
        }
    },
    created() {
        //lettura dei todos
        this.getTodos();
    }
}).mount('#app');