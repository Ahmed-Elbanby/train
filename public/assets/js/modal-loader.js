document.addEventListener('click', function (e) {
  const modalButton = e.target.closest('[data-modal]');
  const url = modalButton.getAttribute('data-modal');
  const globalModal = document.getElementById('globalModal');
  const modalContent = document.getElementById('modalContent');
  e.preventDefault();

  fetch(url)
    .then(response => response.text())
    .then(html => {
      modalContent.innerHTML = html;
      new bootstrap.Modal(globalModal).show();
    })
    .catch(error => console.error('Failed to load modal:', error));
});
