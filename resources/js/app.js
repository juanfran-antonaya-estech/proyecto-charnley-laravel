import './bootstrap';
import VanillaTilt from 'vanilla-tilt';


// Script necesario para el efecto de tilt en las tarjetas


document.addEventListener('DOMContentLoaded', () => {
  const cards = document.querySelectorAll('.tilt');
  if (cards.length) {
    VanillaTilt.init(cards, {
      max: 15,            // ángulo máximo
      speed: 400,         // velocidad de la animación
      perspective: 1000,  // el mismo que el css
      glare: false,       // opcional: brillo
      "max-glare": 0.3
    });
  }
});
