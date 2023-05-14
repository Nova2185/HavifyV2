const searchInput = document.getElementById('search-input');
searchInput.addEventListener('input', () => {
  const searchTerm = searchInput.value.toLowerCase();
  const habitBoxes = document.querySelectorAll('.project-box-wrapper');
  habitBoxes.forEach(box => {
    const habitName = box.querySelector('.box-content-header').textContent.toLowerCase();
    if (habitName.includes(searchTerm)) {
      box.style.display = 'block';
    } else {
      box.style.display = 'none';
    }
  });
});
