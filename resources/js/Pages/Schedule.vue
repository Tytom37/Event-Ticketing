<script setup>
import { Link } from '@inertiajs/vue3';
import Nav from '@/Components/Nav.vue';
import { Inertia } from '@inertiajs/inertia';
import { defineProps } from 'vue';

const props = defineProps ({
    schedules: Array
})
</script>

<template>

    <main>
        <Nav />
        <div class="backgroundimg">
            <div class="text">
                <h1>Schedules</h1>
            </div>
        </div>
        <div class="outer-container">
            <div class="container">
                <div class="contents" v-for="sched in schedules" :key="sched.id">
                    <div class="box1">
                        <h1>{{ sched.name }}</h1><br>
                        <h2>Venue: {{ sched.venue }}</h2><br>
                        <h4>Address: {{ sched.address }}</h4>
                        <h4>Mobile Number: {{ sched.mobile_no }}</h4>
                    </div>
                    <table>
                        <tr>
                            <th>Start of Event</th>
                            <th>End of Event</th>
                        </tr>
                        <tr>
                            <td>{{ sched.timestart }}</td>
                            <td>{{ sched.timeend }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>

</template>

<style scoped>

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
}
  
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    text-align: center;
    padding: 8px;
}
  
td {
    background-color: lightgray;
}
  
th {
    background-color: rgb(203, 240, 203);
}
  
.contents:nth-child(odd) {
    background-color: lightyellow;
}
  
.contents:nth-child(even) {
    background-color: lightsalmon;
}
  
.box1 h1 {
    font-size: 40px;
    font-weight: bold;
}
  
.box1 h2 {
    font-size: 20px;
    font-weight: bold;
}
  
.outer-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
  
.container {
    padding: 100px;
}
  
.backgroundimg {
    height: 428px;
    background-image: url('https://images.unsplash.com/photo-1506784983877-45594efa4cbe?q=80&w=2068&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    background-position: center;
    background-repeat: no-repeat;
}
  
.text {
    text-shadow: 3px 3px 2px rgb(255, 165, 0);
    color: white;
    padding: 100px;
    font-size: 50px;
}
  
.contents {
    border-radius: 20px;
    padding: 50px;
    margin-bottom: 20px;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    display: flex;
    justify-content: space-between;
}
  
.box1 {
    padding: 10px;
    display: flex;
    flex-direction: column;
}

</style>