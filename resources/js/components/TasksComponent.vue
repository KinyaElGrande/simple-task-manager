<template>
    <draggable
        class="flex flex-col divide-y divide-indigo-200"
        animation: 200,
        v-model="tasks"
        @start="drag=true"
        @end="drag=false"
        :element="'ul'"
    >
        <li v-for="task in tasks" :key="task.id" class="bg-white shadow-lg draggable cursor-move">
            <div
                class="flex flex-row justify-between items-center p-3 cursor-pointer"
            >
                <span class="text-gray-700">{{ task.title }}</span>
                <span class="flex items-center text-sm font-medium">
                    <a
                        href=""
                        class="text-indigo-600 hover:text-indigo-900 mr-3"
                        >Edit</a
                    >
                    <button
                        class="text-white bg-red-500 hover:bg-red-700 p-1 rounded"
                        type="submit"
                    >
                        Delete
                    </button>
                </span>
            </div>
        </li>
    </draggable>
</template>

<script>
import draggable from "vuedraggable";
export default {
    props: ['project'],
    components: {
        draggable
    },
    data() {
        return {
            tasks: []
        }
    },
    mounted() {
        this.getTasks()
    },
    methods: {
        getTasks() {
            axios
                .get("/project/" + this.project + "/tasks")
                .then(response => {
                    this.tasks = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>
