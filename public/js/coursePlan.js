const planCheck = document.querySelector('#planCourse');
const inputs = document.querySelectorAll('input[disabled]');

planCheck.addEventListener('input', updateForm);

function updateForm(e) {
  inputs.forEach(input => input.toggleAttribute('disabled'));
}