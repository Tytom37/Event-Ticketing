<script setup>
import { Link } from '@inertiajs/vue3';
import Nav from '@/Components/Nav.vue';
import { Inertia } from '@inertiajs/inertia';
</script>

<template>
    <main>
        <Nav />
        <div class="backgroundimg">
            <div class="text">
                <h1>About Us</h1>
            </div>
        </div>
        <div class="cont">
            <div class="story">
                <div class="box">
                    <div class="mini-container">
                    <h1>Our Story</h1>
                    <p>Eventex was born out of a desire to revolutionize the event planning industry. Our founders, seasoned professionals with decades of combined experience in event management, saw a need for a more personalized and innovative approach to planning events. With this vision, Eventex was established to offer bespoke event planning services that cater to the unique needs and preferences of each client.</p>
                    <h1>Our Mission</h1>
                    <p>Our mission is simple: to create unforgettable experiences that leave lasting impressions. We strive to provide our clients with exceptional service, meticulous attention to detail, and creative solutions that bring their dreams to life. From concept to execution, we are dedicated to making every event we handle a seamless and enjoyable experience for our clients.</p>
                </div>
                <div class="mini-container">
                    <h1>What We Offer</h1>
                    <ul>
                        <li>• Comprehensive Event Planning: From initial brainstorming to the final execution, we cover every aspect of event planning, ensuring that no detail is overlooked.</li><br>
                        <li>• Tailored Services: We understand that each event is unique. Our team works closely with clients to tailor our services to their specific needs, preferences, and budgets.</li><br>
                        <li>• Creative Design: Our design team excels in creating stunning and innovative event concepts that reflect the personality and vision of our clients.</li><br>
                        <li>• Vendor Coordination: We have established relationships with top vendors in the industry, ensuring that you receive the best services and products for your event.</li><br>
                        <li>• On-site Management: Our experienced coordinators are on-site during the event to manage logistics and ensure everything runs smoothly, allowing you to enjoy your special day stress-free.</li>
                    </ul>
                </div>
                </div>
                <div class="img"></div>
            </div>
        </div>
    </main>
</template>

<style scoped>

.text {
    text-shadow: 3px 3px 2px rgb(0, 47, 255);
    color: white;
    padding: 100px;
    font-size: 50px;
}

.box {
    display: flex;
}

.img {
    background-image: url('https://images.unsplash.com/photo-1602306834394-6c8b7ea0ed9d?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    margin: auto;
    border-radius: 20px;
    height: 500px;
    width: 1000px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.backgroundimg {
    height: 428px;
    background-image: url('https://images.unsplash.com/photo-1547815749-838c83787de2?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    background-position: center;
    background-repeat: no-repeat;
}

.mini-container {
    width: 40%;
    padding: 50px;
    margin-left: 90px;
}

li {
    text-decoration: dotted;
}

.story {
    background-color: white;
    padding: 50px;

}

.story h1 {
    font-weight: bolder;
    font-size: 2em;
    margin-bottom: 0.5em;
}

.story p {
    font-size: 1.2em;
    margin-bottom: 20px;
    text-align: justify;
}

</style>