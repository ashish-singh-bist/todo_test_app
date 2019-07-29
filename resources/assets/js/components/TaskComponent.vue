<template>
    <section class="task">
        <div class='row'>
            <h1>Todo Test App</h1>
            <h4>New/Update Task</h4>
            <!-- form start -->
            <form action="#" @submit.prevent="createUpdateTask()">
                <div class="input-group">
                    <input v-model="task.title" type="text" name="title" class="form-control" autofocus required>
                    <span class="input-group-btn">
                        <button type="submit" v-if='editable_id==0' class="btn btn-primary">Add Task</button>
                        <button type="submit"  v-if='editable_id>0' class="btn btn-primary">Update Task</button>
                    </span>
                </div>
            </form>
            <!-- form end -->
        </div>
        <div class='row'>
            <h4>All Tasks</h4>
        </div>
        <div class="row">
            <!-- table start -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Created Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if='tasks.length === 0'><td colspan="4">There are no tasks!</td></tr>
                    <tr v-for="(task, index) in tasks">
                        <td>{{ task.title }}</td>
                        <td class="text-center">{{ task.status }}</td>
                        <td class="text-center">{{ task.created_at }}</td>
                        <td class="text-center">
                            <button @click="editTask(task.id)" class="btn btn-success btn-xs">Edit</button>
                            <button @click="deleteTask(task.id)" class="btn btn-danger btn-xs">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- table end -->
        </div>
    </section>
</template>
<script>
    function Task({ id, title, status, created_at}) {
        this.id = id;
        this.title = title;
        this.status = status;
        this.created_at = created_at;
    }

    import TaskComponent from './TaskComponent.vue';

    export default {
        data() {
            return {
                tasks: [],
                loader: false,
                task: {
                    title: ''
                },
                editable_id: 0,
            }
        },
        created() {
            this.fetchTaskList();
        },
        methods: {
            // fetch task list with the help of api
            fetchTaskList() {
                this.loader = true;
                window.axios.get('/api/tasks').then(({ data }) => {
                    data.forEach(task => {
                        this.tasks.push(new Task(task));
                    });
                    this.loader = false;
                }, (error)  =>  {
                    this.loader = false;
                });
            },
            // create new task or update existing one with the help of api
            createUpdateTask() {
                if(this.editable_id){
                    this.loader = true;
                    // create task api call
                    window.axios.put(`/api/task/update/${this.editable_id}`, this.task).then(({ data }) => {
                        // Once ajax resolves we can update the task
                        this.tasks.find(task => task.id === this.editable_id).title = this.task.title;
                        this.loader = false;
                        this.editable_id = 0;
                        this.task.title = '';
                    }, (error)  =>  {
                        this.loader = false;
                    });
                }else{                
                    this.loader = true;
                    // update task api call
                    window.axios.post('/api/task/create', this.task).then(({ data }) => {
                        this.tasks.unshift(new Task(data));
                        this.task.title = "";
                        this.loader = false;
                    }, (error)  =>  {
                        this.loader = false;
                    });
                }
            },
            // put a task in edit mode
            editTask(id) {
                let index = this.tasks.findIndex(task => task.id === id);
                this.editable_id = id;
                this.task.title = this.tasks[index].title;
            },
            // delete task permanently from db
            deleteTask(id) {
                this.loader = true;
                // delete task api call
                window.axios.delete(`/api/task/delete/${id}`).then(() => {
                    let index = this.tasks.findIndex(task => task.id === id);
                    this.tasks.splice(index, 1);
                    this.loader = false;
                }, (error)  =>  {
                    this.loader = false;
                });
            }
        },
        components: {
            TaskComponent
        },
        watch: {
            // loader for processing time
            loader(val) {
                document.getElementById('loader').className = val ? "running" : "";
            }
        }
    }
</script>