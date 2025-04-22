<template>
  <div class="container py-4">
    <header class="mb-4 text-center">
      <h1 class="display-4">Frases de Chuck Norris</h1>
    </header>
    <main>
      <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 g-4">
        <div v-for="(item, index) in chuck" :key="index" class="col">
          <chuck-card :icon="item.icon_url" :text="item.value"></chuck-card>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import ChuckCard from './components/ChuckCard.vue';

export default {
  name: 'App',
  components: {
    ChuckCard
  },
  data() {
    return {
      chuck: [
        {
          "icon_url": "https://img.europapress.es/fotoweb/fotonoticia_20150310130850-732359_600.jpg",
          "value": "Chuck Norris puede saltar en paracaídas al espacio exterior."
        },
        {
          "icon_url": "https://www.lavanguardia.com/files/image_449_220/uploads/2020/03/10/5fa908e2329b4.jpeg",
          "value": "El principal producto de Chuck Norris es el dolor."
        },
        {
          "icon_url": "https://cdn.filmtotaal.nl/images/original/4m33xefdqsps_hero.jpg",
          "value": "Chuck Norris no lee libros. Los mira fijamente hasta que encuentra la información que busca."
        },
        {
          "icon_url": "https://www1.wdr.de/stichtag/stichtagmaerzzehn-100~_v-gseapremiumxl.jpg",
          "value": "El tiempo no espera a nadie. A menos que ese hombre sea Chuck Norris."
        },
        {
          "icon_url": "https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2021/03/chuck-norris-2260397.jpg?tf=3840x",
          "value": "Si deletreas Chuck Norris en Scrabble, ganas. Para siempre."
        }
      ]
    }
  }
}
</script>

<style>
body {
  background-color: #f5f5f5;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

h1 {
  color: #ffffff;
  text-shadow: 1px 1px 5px rgb(0, 0, 0);
}
</style>
