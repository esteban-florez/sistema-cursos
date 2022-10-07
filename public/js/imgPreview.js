const img = document.querySelector('#previewImg');
const fileInput = document.querySelector('input[type="file"]');
fileInput.addEventListener('input', updatePreview);
document.querySelector('#previewWrapper').addEventListener('click', () => fileInput.click());

function updatePreview() {
  const imgFile = fileInput.files[0];
  let url = URL.createObjectURL(imgFile);
  img.src = url;
}