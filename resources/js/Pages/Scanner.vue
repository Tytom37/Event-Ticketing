<script setup>
import Nav from '@/Components/Nav.vue';
import { Html5QrcodeScanner } from 'html5-qrcode';
import { onMounted } from 'vue';

function onScanSuccess(decodedText, decodedResult) {
    console.log(`Code matched = ${decodedText}`, decodedResult);
    document.getElementById('result').value = decodedText;
    alert("ID Number: " + decodedText); 
}

function onScanFailure(error) {
    console.warn(`Code scan error = ${error}`);
}

onMounted(() => {
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: { width: 250, height: 250 }, autoScan: false }
    );
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
});
</script>

<template>
    <main>
        <Nav />
        <div class="imgbck">
            <div class="box-container">
                <h1>Scan QR Here</h1>
                <div class="scanner">
                    <div id="reader" class="qrscan" style="width: 320px;"></div>
                </div>
                <div class="result">
                    <label for="result" class="id">ID Number:</label>
                    <input type="text" name='result' id='result' readonly>
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>

.imgbck {
    text-align: center;
    align-items: center;
    padding: 200px;
    height: 500px;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-image: url('https://images.unsplash.com/photo-1612814266697-e5814f3063cf?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
}

.box-container {
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;    
    background-color: white;
    gap: 20px;
    text-align: center;
    align-items: center;
    width: 25%;
    padding: 20px;
    height: 500px;
    display: flex;
    flex-direction: column;
}

</style>