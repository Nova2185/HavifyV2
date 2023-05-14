// Primero, seleccionamos todos los elementos con la clase "project-box-wrapper"
const elements = document.querySelectorAll('.project-box-wrapper');

// Para el primer elemento, contamos el número de elementos que tienen la clase "project-box-wrapper" y cuyo "box-progress" no tiene un ancho del 100%
const element1Count = Array.from(elements).filter(el => el.querySelector('.box-progress').style.width !== '100%').length;
document.getElementById('element1-count').textContent = element1Count;

// Para el segundo elemento, contamos el número de elementos que tienen la clase "project-box-wrapper" y cuyo "box-progress" tiene un ancho del 80% al 90%
const element2Count = Array.from(elements).filter(el => {
  const width = parseInt(el.querySelector('.box-progress').style.width);
  return width >= 80 && width <= 90;
}).length;
document.getElementById('element2-count').textContent = element2Count;

// Para el tercer elemento, contamos simplemente el número de elementos con la clase "project-box-wrapper"
const element3Count = elements.length;
document.getElementById('element3-count').textContent = element3Count;
