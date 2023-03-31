'use strict'
const input = document.querySelector('input#backup')
const label = document.querySelector('#backupLabel')
const button = document.querySelector('button#upload')

input.addEventListener('change', () => {
    label.innerText = input.files[0].name
    button?.removeAttribute('disabled')
})