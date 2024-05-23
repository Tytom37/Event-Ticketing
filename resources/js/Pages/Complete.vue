<script setup>
import Nav from '@/Components/Nav.vue';
import QRCode from '@chenfengyuan/vue-qrcode';
import { formToJSON } from 'axios';
import html2canvas from 'html2canvas';
import jsPDF from 'jspdf';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const containerRef = ref(null);

const { attendees } = defineProps({
  attendees: {
    type: Array,
    required: true
  }
});

const generateQRCodeValue = (attend) => {
  const schedule = attend.schedule || {};
  return JSON.stringify({
    id: attend.id,
    venue: schedule.venue || 'No Venue Information Available',
    timestart: schedule.timestart || 'No Time Information Available'
  });
}

const form = useForm({
  import_file: null
});

const importCSV = (event) => {
  const file = event.target.files[0];
  if (!file) return;

  form.import_file = file;
  form.post(route('attendees.import'), {
    onSuccess: () => {},
    onError: () => {}
  });
}
</script>


<template>
  <main>
    <Nav />
    <div class="background-img">
      <div class="text">
        <h1>Bookings</h1>
      </div>
    </div>
    <div class="outer-container">
      <div class="btns">
        <a class="px-2.5 py-2 rounded bg-blue-900 text-white ml-5 max-w-[130px]" href="/complete/csv-all">Download CSV</a>
        <button class="px-2.5 py-2 rounded bg-blue-900 text-white ml-5 max-w-[120px]">
          <label for="import_file" class="cursor-pointer">Import CSV</label>
          <input type="file" id="import_file" @change="importCSV" class="hidden">
        </button>
        <a class="px-2.5 py-2 rounded bg-blue-900 text-white ml-5 max-w-[120px]" href="/complete/pdf">Generate PDF</a>
      </div>
      <div class="container" ref="containerRef">
        <div class="small-container" v-for="attend in attendees" :key="attend.id">
          <QRCode :value="generateQRCodeValue(attend)" :size="200" />
          <div class="infos">
            <h1>Attendee ID: {{ attend.id }}</h1>
            <h1>Name: {{ attend.fullname }}</h1>
            <h1>Contact Number: {{ attend.contact_number }}</h1>
            <h1>Email: {{ attend.email }}</h1>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<style scoped>

.btns {
  padding: 10px;
  display: flex;
  gap: 55px;
  transform: translate(500px, 0);
}

.text {
  text-shadow: 3px 3px 2px rgb(255, 165, 0);
  color: white;
  padding: 100px;
  font-size: 50px;
}

.background-img {
  background-image: url('https://images.unsplash.com/photo-1484807352052-23338990c6c6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
  height: 500px;
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}

.outer-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.container {
  display: grid;
  grid-template-columns: repeat(3, minmax(200px, 1fr));
  gap: 20px;
  padding: 20px;
}

.small-container {
  box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
  background-color: blanchedalmond;
  display: flex;
  gap: 10px;
  align-items: center;
  border-radius: 10px;
  padding: 10px;
}
</style>
