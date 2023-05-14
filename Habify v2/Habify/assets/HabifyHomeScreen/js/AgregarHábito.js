// Get the add button and popup container
const addButton = document.querySelector('.add-btn');
const popupContainer = document.getElementById('popup2-container');

// Show the popup when the add button is clicked
addButton.addEventListener('click', () => {
  popupContainer.style.display = 'flex';
});

// Hide the popup when the cancel button is clicked
const cancelButton = document.getElementById('cancel-btn');
cancelButton.addEventListener('click', () => {
  popupContainer.style.display = 'none';
});

// Add a new project when the add project button is clicked
const addProjectButton = document.getElementById('add-project-btn');
addProjectButton.addEventListener('click', () => {
  const header = document.getElementById('header-input').value;
  const subheader = document.getElementById('subheader-input').value;
  const date = document.getElementById('date-input').value;
  const primaryColor = document.getElementById('primary-color-input').value;
  const secondaryColor = document.getElementById('secondary-color-input').value;

  // Create a new project box
  const projectBoxWrapper = document.createElement('div');
  projectBoxWrapper.className = 'project-box-wrapper';

  const projectBox = document.createElement('div');
  projectBox.className = 'project-box';
  projectBox.style.backgroundColor = primaryColor;

  const projectBoxHeader = document.createElement('div');
  projectBoxHeader.className = 'project-box-header';

  const boxContentDate = document.createElement('span');
  boxContentDate.className = 'box-content-date';
  boxContentDate.textContent = date;

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
  boxContentHeader.textContent = header;

  const boxContentSubheader = document.createElement('p');
  boxContentSubheader.className = 'box-content-subheader';
  boxContentSubheader.textContent = subheader;

  const boxProgressWrapper = document.createElement('div');
  boxProgressWrapper.className = 'box-progress-wrapper';

  const boxProgressHeader = document.createElement('p');
  boxProgressHeader.className = 'box-progress-header';
  boxProgressHeader.textContent = 'Progreso';

  const boxProgressBar = document.createElement('div');
  boxProgressBar.className = 'box-progress-bar';

  const boxProgress = document.createElement('span');
  boxProgress.className = 'box-progress';
  boxProgress.style.width = '00%';
  boxProgress.style.backgroundColor = secondaryColor;

  const boxProgressPercentage = document.createElement('p');
  boxProgressPercentage.className = 'box-progress-percentage';
  boxProgressPercentage.textContent = '0%';

  const projectBoxFooter = document.createElement('div');
  projectBoxFooter.className = 'project-box-footer';

  const daysLeft = document.createElement('div');
  daysLeft.className = 'days-left';
  daysLeft.style.color = secondaryColor;
  daysLeft.textContent = ' Sin Datos';

  // Construct the project box structure
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

  // Append the new project box to the container
  const container = document.getElementById('HabitosNuevos-container');
  container.appendChild(projectBoxWrapper);

  // Hide the popup
  popupContainer.style.display = 'none';
});

