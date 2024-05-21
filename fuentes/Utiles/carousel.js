'use strict';

// Requiere una clave de API y un ID de Bin de JSONbin.io
const API_KEY = '$2a$10$AIjaA8Tho0hI8s8uxoMEBOfgSlgXj0TVHwaK0uHEPIIUe8zuDBISe';  // Reemplaza con tu clave de API
const BIN_ID = '664bba2cad19ca34f86c91ba';    // Reemplaza con el ID de tu bin

// Función para obtener los datos actuales del bin
async function getJsonData() {
    const response = await fetch(`https://api.jsonbin.io/v3/b/664bba2cad19ca34f86c91ba`, {
        method: 'GET',
        headers: {
            'X-Master-Key': '$2a$10$8Ls7wNx8qPs98jugz8slSeaydaYTVGx6/Ctqlk7FhMuYPNKF4nNNu'
        }
    });
    const data = await response.json();
    return data.record;
}

class Carousel {
  constructor(el, data) {
    this.el = el;
    this.carouselOptions = ['previous', 'play', 'next'];
    this.carouselData = data; // Usa los datos obtenidos de JSONbin
    this.carouselInView = [1, 2, 3, 4, 5];
    this.carouselContainer;
    this.carouselPlayState;
  }

  mounted() {
    this.setupCarousel();
  }

  setupCarousel() {
    const container = document.createElement('div');
    const controls = document.createElement('div');

    this.el.append(container, controls);
    container.className = 'carousel-container';
    controls.className = 'carousel-controls';

    this.carouselData.forEach((item, index) => {
      const carouselItem = item.src ? document.createElement('img') : document.createElement('div');
      container.append(carouselItem);

      carouselItem.className = `carousel-item carousel-item-${index + 1}`;
      carouselItem.src = item.src;
      carouselItem.setAttribute('loading', 'lazy');
      carouselItem.setAttribute('data-index', `${index + 1}`);

      carouselItem.addEventListener('click', () => {
          window.location.href = item.url || '#';
      });
    });

    this.carouselOptions.forEach((option) => {
      const btn = document.createElement('button');
      const axSpan = document.createElement('span');

      axSpan.innerText = option;
      axSpan.className = 'ax-hidden';
      btn.append(axSpan);

      btn.className = `carousel-control carousel-control-${option}`;
      btn.setAttribute('data-name', option);

      controls.append(btn);
    });

    this.setControls([...controls.children]);
    this.carouselContainer = container;
  }

  setControls(controls) {
    controls.forEach(control => {
      control.onclick = (event) => {
        event.preventDefault();
        this.controlManager(control.dataset.name);
      };
    });
  }

  controlManager(control) {
    if (control === 'previous') return this.previous();
    if (control === 'next') return this.next();
    if (control === 'play') return this.play();
    return;
  }

  previous() {
    this.carouselData.unshift(this.carouselData.pop());
    this.carouselInView.push(this.carouselInView.shift());

    this.carouselInView.forEach((item, index) => {
      this.carouselContainer.children[index].className = `carousel-item carousel-item-${item}`;
    });

    this.carouselData.slice(0, 5).forEach((data, index) => {
      document.querySelector(`.carousel-item-${index + 1}`).src = data.src;
    });
  }

  next() {
    this.carouselData.push(this.carouselData.shift());
    this.carouselInView.unshift(this.carouselInView.pop());

    this.carouselInView.forEach((item, index) => {
      this.carouselContainer.children[index].className = `carousel-item carousel-item-${item}`;
    });

    this.carouselData.slice(0, 5).forEach((data, index) => {
      document.querySelector(`.carousel-item-${index + 1}`).src = data.src;
    });
  }

  play() {
    const playBtn = document.querySelector('.carousel-control-play');
    const startPlaying = () => this.next();

    if (playBtn.classList.contains('playing')) {
      playBtn.classList.remove('playing');
      clearInterval(this.carouselPlayState);
      this.carouselPlayState = null;
    } else {
      playBtn.classList.add('playing');
      this.next();
      this.carouselPlayState = setInterval(startPlaying, 3500);
    };
  }
}

(async () => {
  const el = document.querySelector('.carousel');
  const data = await getJsonData(); // Obtener los datos de JSONbin
  const exampleCarousel = new Carousel(el, data); // Pasar los datos al constructor
  exampleCarousel.mounted();
})();
