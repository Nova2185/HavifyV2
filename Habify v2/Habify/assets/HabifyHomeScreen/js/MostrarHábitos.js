// Obtener los valores de los span
const nombreHabito = document.getElementById('Nombre_habito').textContent;
const tipoHabito = document.getElementById('Tipo_habito').textContent;
const fechaInicio = document.getElementById('Fecha_Inicio').textContent;
const colorPrimario = document.getElementById('Color_Primario').textContent;
const colorSecundario = document.getElementById('Color_Secundario').textContent;

// Crear los elementos HTML dinámicamente
const projectBoxWrapper = document.createElement('div');
projectBoxWrapper.className = 'project-box-wrapper';

const projectBox = document.createElement('div');
projectBox.className = 'project-box';
projectBox.style.backgroundColor = colorPrimario;

const projectBoxHeader = document.createElement('div');
projectBoxHeader.className = 'project-box-header';

const boxContentDate = document.createElement('span');
boxContentDate.className = 'box-content-date';
boxContentDate.textContent = fechaInicio;

const moreWrapper = document.createElement('div');
moreWrapper.className = 'more-wrapper';

const projectBtnMore = document.createElement('button');
projectBtnMore.className = 'project-btn-more';

const moreIcon = document.createElement('svg');
moreIcon.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
moreIcon.setAttribute('width', '24');
moreIcon.setAttribute('height', '24');
moreIcon.setAttribute('viewBox', '0 0 24 24');
moreIcon.setAttribute('fill', 'none');
moreIcon.setAttribute('stroke', 'currentColor');
moreIcon.setAttribute('stroke-width', '2');
moreIcon.setAttribute('stroke-linecap', 'round');
moreIcon.setAttribute('stroke-linejoin', 'round');
moreIcon.className = 'feather feather-more-vertical';

const circle1 = document.createElement('circle');
circle1.setAttribute('cx', '12');
circle1.setAttribute('cy', '12');
circle1.setAttribute('r', '1');

const circle2 = document.createElement('circle');
circle2.setAttribute('cx', '12');
circle2.setAttribute('cy', '5');
circle2.setAttribute('r', '1');

const circle3 = document.createElement('circle');
circle3.setAttribute('cx', '12');
circle3.setAttribute('cy', '19');
circle3.setAttribute('r', '1');

const projectBoxContentHeader = document.createElement('div');
projectBoxContentHeader.className = 'project-box-content-header';

const boxContentHeader = document.createElement('p');
boxContentHeader.className = 'box-content-header';
boxContentHeader.textContent = nombreHabito;

const boxContentSubheader = document.createElement('p');
boxContentSubheader.className = 'box-content-subheader';
boxContentSubheader.textContent = tipoHabito;

const boxProgressWrapper = document.createElement('div');
boxProgressWrapper.className = 'box-progress-wrapper';

const boxProgressHeader = document.createElement('p');
boxProgressHeader.className = 'box-progress-header';
boxProgressHeader.textContent = 'Progreso';

const boxProgressBar = document.createElement('div');
boxProgressBar.className = 'box-progress-bar';

const boxProgress = document.createElement('span');
boxProgress.className = 'box-progress';
boxProgress.style.backgroundColor = colorSecundario;

const boxProgressPercentage = document.createElement('p');
boxProgressPercentage.className = 'box-progress-percentage';

const projectBoxFooter = document.createElement('div');
projectBoxFooter.className = 'project-box-footer';

const daysLeft = document.createElement('div');
daysLeft.className = 'days-left';
daysLeft.style.color = '#570091';

// Obtener la fecha actual
const today = new Date();

// Convertir la fecha de inicio en objeto de fecha
const startDate = new Date(fechaInicio);

// Calcular la diferencia de días entre la fecha de inicio y la fecha actual
const timeDiff = Math.abs(today.getTime() - startDate.getTime());
const diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

// Verificar si han pasado 21 días desde la fecha de inicio
const completedDays = 21;
const daysRemaining = completedDays - diffDays % completedDays;

// Calcular el porcentaje de progreso
const progressPercentage = ((completedDays - daysRemaining) / completedDays) * 100;

// Actualizar el estilo y el contenido del progreso
boxProgress.style.width = `${progressPercentage}%`;
boxProgressPercentage.textContent = `${Math.round(progressPercentage)}%`;

// Verificar si se ha completado
if (daysRemaining === 0) {
  daysLeft.textContent = 'Completado!';
} else {
  daysLeft.textContent = `${daysRemaining} Dias Restantes`;
}

// Construir la estructura de la caja del proyecto
projectBoxHeader.appendChild(boxContentDate);
projectBtnMore.appendChild(moreIcon);
moreWrapper.appendChild(projectBtnMore);
projectBoxHeader.appendChild(moreWrapper);

projectBoxContentHeader.appendChild(boxContentHeader);
projectBoxContentHeader.appendChild(boxContentSubheader);

boxProgressBar.appendChild(boxProgress);

boxProgressWrapper.appendChild(boxProgressHeader);
boxProgressWrapper.appendChild(boxProgressBar);
boxProgressWrapper.appendChild(boxProgressPercentage);

projectBoxFooter.appendChild(daysLeft);

projectBox.appendChild(projectBoxHeader);
projectBox.appendChild(projectBoxContentHeader);
projectBox.appendChild(boxProgressWrapper);
projectBox.appendChild(projectBoxFooter);

projectBoxWrapper.appendChild(projectBox);

// Agregar la nueva caja del proyecto al contenedor
const container = document.getElementById('HabitosNuevos-container');
container.appendChild(projectBoxWrapper);
