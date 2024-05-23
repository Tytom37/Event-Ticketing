<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import Nav from '@/Components/Nav.vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
    schedules: {
        type: Array,
        required: true,
    }
});

const form = useForm({
  fullname: '',
  contact_number: '',
  email: '',
  schedule_id: ''
});

const submitForm = () => {
    const randomScheduleId = props.schedules[Math.floor(Math.random() * props.schedules.length)].id;
    form.post('/attendees');
};
</script>

<template>
  <main>
    <Nav />
    <div class="backimg">
      <div class="content">
        <h3>Discover Every Event, Seamlessly with EventEx</h3>
        <h1>You envision it. We bring it to life.</h1>
      </div>
    </div>
    <div class="box">
      <form @submit.prevent="submitForm">
        <div class="form-group">
            <label for="fullname">Name </label>
            <input type="text" id="fullname" v-model="form.fullname">
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number </label>
            <input type="text" id="contact_number" v-model="form.contact_number">
        </div>
        <div class="form-group">
            <label for="email">Email </label>
            <input type="text" id="email" v-model="form.email">
        </div>
        <div class="form-group">
            <label for="schedule_id">Choose Event</label>
            <select id="schedule_id" v-model="form.schedule_id">
                <option v-for="sched in schedules" :key="sched.id" :value="sched.id">{{ sched.name }}</option>
            </select>
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  </main>
</template>

<style scoped>

button {
    background-color: rgb(178, 233, 178);
    padding: 15px 25px 15px 25px;
    border-radius: 10px;
    transform: translate(0, -30%);
}

.box {
    background-color: white;
    display: flex;
    justify-content: center;
    width: 62%;
    transform: translate(35%, -80%);
    padding: 40px;
}

input, select {
    border: 0px ;
}

select {
    width: 197px;
}

form {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    gap: 10px;
}

.form-group {
    display: flex;
    flex-direction: column;
    margin: 0 10px;
    border: 1px solid black;
    border-radius: 10px;
    padding: 10px;
}

form > button {
    align-self: flex-end;
    margin-left: 10px;
}

h3 {
    font-size: 15px;
    font-weight: bold;
}

h1 {
    font-size: 50px;
    font-weight: bold;
}

.backimg {
    background-image: url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    height: 500px;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
}

.content {
    text-shadow: 3px 3px 2px rgb(255, 165, 0);
    transform: translate(50%, 100%);
    padding: 50px;
    width: 50%;
    color: white;
    text-align: center;
}
</style>
