'use strict'
const img = document.querySelector('#previewImg')
const fileInput = document.querySelector('input[type="file"]')
const sendButton = document.querySelector('#send')

fileInput.addEventListener('input', updatePreview)

if (sendButton) {
  fileInput.addEventListener('change', () => sendButton
    ?.removeAttribute('disabled'))
}

document.querySelector('#previewWrapper')
  .addEventListener('click', () => fileInput.click())

function updatePreview() {
  const imgFile = fileInput.files[0]
  let url = URL.createObjectURL(imgFile)
  img.src = url
}
