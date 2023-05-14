const projectBoxes = document.querySelectorAll('.project-box-wrapper');
const popupOverlay = document.getElementById('popupOverlay');
const popup = document.querySelector('.popup');
const boxContentHeaderInput = document.getElementById('box-content-header-input');
const boxContentSubheaderInput = document.getElementById('box-content-subheader-input');
const boxContentDateInput = document.getElementById('box-content-date-input');
const saveBtn = document.getElementById('saveBtn');

// Generar identificadores únicos para cada caja
projectBoxes.forEach((box, index) => {
  box.setAttribute('id', `project-box-${index}`);
});

// Mostrar el popup y establecer los valores actuales al hacer clic en el botón
function showPopup(boxId) {
  const box = document.getElementById(boxId);
  const boxContentHeader = box.querySelector('.box-content-header');
  const boxContentSubheader = box.querySelector('.box-content-subheader');
  const boxContentDate = box.querySelector('.box-content-date');

  boxContentHeaderInput.value = boxContentHeader.textContent;
  boxContentSubheaderInput.value = boxContentSubheader.textContent;
  boxContentDateInput.value = boxContentDate.textContent;

  popupOverlay.style.display = 'flex';

  saveBtn.onclick = function() {
    boxContentHeader.textContent = boxContentHeaderInput.value;
    boxContentSubheader.textContent = boxContentSubheaderInput.value;
    boxContentDate.textContent = boxContentDateInput.value;

    popupOverlay.style.display = 'none';
  };
}

// Asignar evento de clic solo al botón dentro de cada caja
projectBoxes.forEach((box) => {
  const btnMore = box.querySelector('.project-btn-more');
  const boxId = box.getAttribute('id');

  btnMore.onclick = function() {
    showPopup(boxId);
  };
});

// Ocultar el popup al hacer clic fuera de él
popupOverlay.onclick = function(event) {
  if (event.target === popupOverlay) {
    popupOverlay.style.display = 'none';
  }
};
