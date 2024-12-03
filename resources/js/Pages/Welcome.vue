

<script setup>
import { Head,Link } from '@inertiajs/vue3';
</script>
<template>
    <Head title="Welcome" />
    <div class="main">
        <header class="hero">
  <div class="hero-overlay text-center">
    <div class="container d-flex flex-column justify-content-center align-items-center">
      <h1 class="display-4 fw-bold">Welcome Student Information And Management Portal Portal</h1>
      <p class="lead">Manage your academic journey with ease – access grades, schedules, and more.</p>
      <div class="d-flex flex-row gap-3">
        <Link :href="route('login')" class="btn btn-light btn-lg mt-3 text-decoration-none">Login</Link>
        <Link :href="route('register')" class="btn btn-outline-light btn-lg mt-3">Register</Link>
      </div>
    </div>
   
  </div>
</header>

    </div>
</template>

<style lang="css" scoped>
    .main {
      font-family: 'Roboto', sans-serif;
      width: 100vw;
      height: 100vh;

    }
    .hero {
      background: url('../../images/room.jpg') center/cover no-repeat;
      height: 100vh;
      color: white;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }
    .hero-overlay {
      background: rgba(0, 0, 0, 0.5);
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .search-bar {
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      padding: 15px;
    }
    .search-btn {
      background-color: #dc3545;
      color: white;
    }
    .btn-outline-light:hover {
      background-color: white;
      color: black;
    }
    
</style>