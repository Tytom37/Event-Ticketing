<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

const navbar = ref(null);
const currentRoute = ref('');

onMounted(() => {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.value.classList.add('scrolled');
      navbar.value.classList.remove('transparent');
    } else {
      navbar.value.classList.add('transparent');
      navbar.value.classList.remove('scrolled');
    }
  });
  
  const page = usePage();
  currentRoute.value = page.url;
});

const isActive = (route) => {
  return currentRoute.value === route;
};
</script>

<template>
    <main>
        <nav id="navbar" ref="navbar" class="navbar transparent">
            <div class="title">
                EventEx
            </div>
            <div class="links">
                <Link :class="{ active: isActive('/') }" class="home" href="/">Home</Link>
                <Link :class="{ active: isActive('/schedule') }" class="schedule" href="/schedule">Schedules</Link>
                <Link :class="{ active: isActive('/complete')}" class="complete" href="/complete">Bookings</Link>
                <Link :class="{ active: isActive('/about') }" class="aboutpage" href="/about">About Us</Link>
                <Link :class="{ active: isActive('/scanner')}" class="scanner" href="/scanner">Scan QRCode</Link>
            </div>
        </nav>
    </main>
</template>

<style scoped>

.title, .links a {
    font-size: 16px;
}

.title {
    display: flex;
    font-size: 30px;
}

nav {
    display: flex;
    padding: 25px;
    color: white;
    align-items: center;
    gap: 90px;
    transition: background-color 0.3s ease;
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
}

nav.transparent {
    background-color: transparent;
}

nav.scrolled {
    background-color: lightsalmon;
}

.links {
    display: flex;
    gap: 15px;
}

.links a {
    transition: transform 0.3s ease;
    padding: 10px;
}

.links a:hover {
    text-decoration: underline;
    text-underline-offset: 7px;
}

.links a.active {
    text-decoration: underline;
    text-underline-offset: 7px;
}
</style>