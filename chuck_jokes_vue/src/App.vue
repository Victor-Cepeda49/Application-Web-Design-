<template>
  <div id="app">
    <header>
      <h1>Frases de Chuck Norris</h1>
    </header>
    <main>
      <ul class="chuck-list">
        <li v-for="(item, index) in chuck" :key="index" class="chuck-item">
          {{ item.value }}
        </li>
      </ul>
    </main>
  </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      chuck: [
        {
          "value": "Chuck Norris puede saltar en paracaídas al espacio exterior."
        },
        {
          "value": "El principal producto de Chuck Norris es el dolor."
        },
        {
          "value": "Chuck Norris no lee libros. Los mira fijamente hasta que obtiene la información que quiere."
        },
        {
          "value": "El tiempo no espera a nadie. A menos que ese hombre sea Chuck Norris."
        },
        {
          "value": "Si escribes Chuck Norris en Scrabble, ganas. Para siempre."
        },
      ]
    }
  }
}
</script>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #262323;
  color: #000000;
}

#app {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

header {
  text-align: center;
  margin-bottom: 30px;
}

h1 {
  color: #fffb00;
  font-size: 2.5rem;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
}

.chuck-list {
  list-style-type: none;
}

.chuck-item {
  background-color: white;
  border-left: 5px solid #00ff22;
  padding: 15px 20px;
  margin-bottom: 15px;
  border-radius: 0 5px 5px 0;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s, box-shadow 0.2s;
}

.chuck-item:hover {
  transform: translateX(5px);
  box-shadow: 2px 4px 8px rgba(0,0,0,0.15);
}
</style>
