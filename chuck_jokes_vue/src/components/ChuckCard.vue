<template>
    <div class="card h-100">
      <img :src="icon" class="card-img-top" alt="Chuck Norris">
      <div class="card-body">
        <p class="card-text">{{ text }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'ChuckCard',
    props: {
      icon: {
        type: String,
        required: true
      },
      text: {
        type: String,
        required: true
      }
    }
  }
  </script>
  
  <style scoped>
  .card {
    transition: transform 0.3s;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  }
  
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
  }
  
  .card-img-top {
    max-height: 200px;
    object-fit: contain;
    padding: 1rem;
    background-color: #f8f9fa;
  }
  </style>