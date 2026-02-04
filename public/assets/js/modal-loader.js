// document.addEventListener('click', function (e) {
//   const modalButton = e.target.closest('[data-modal]');
//   const url = modalButton.getAttribute('data-modal');
//   const globalModal = document.getElementById('globalModal');
//   const modalContent = document.getElementById('modalContent');
//   e.preventDefault();

//   fetch(url)
//     .then(response => response.text())
//     .then(html => {
//       modalContent.innerHTML = html;
//       new bootstrap.Modal(globalModal).show();
//     })
//     .catch(error => console.error('Failed to load modal:', error));
// });



document.addEventListener('click', function (e) {
  const modalButton = e.target.closest('[data-modal]');
  if (!modalButton) return;
  e.preventDefault();

  const url = modalButton.getAttribute('data-modal');
  const globalModal = document.getElementById('globalModal');
  const modalContent = document.getElementById('modalContent');

  fetch(url)
    .then(response => response.text())
    .then(html => {
      modalContent.innerHTML = html;
      new bootstrap.Modal(globalModal).show();

      // If the Modal has a Photo Input show preview on change
      const photoInput = modalContent.querySelector('input[type="file"][name="photo"]');
      if (photoInput) {
        photoInput.addEventListener('change', function () {
          const photoDiv = modalContent.querySelector('div[id="photoPreview"]');
          if (photoDiv) {
            photoDiv.style.backgroundImage = 'none';
            const file = this.files[0];
            if (file) {
              const reader = new FileReader();
              reader.onload = function (e) {
                photoDiv.style.backgroundImage = `url('${e.target.result}')`;
              }
              reader.readAsDataURL(file);
            }
          }
        });
      }
    })
    .catch(error => console.error('Failed to load modal:', error));
});