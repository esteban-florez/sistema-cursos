const showButtons = document.querySelectorAll(
	'.input-group-append > button');
const submitButton = document.querySelector(
	'button[type="submit"]');

submitButton.addEventListener('click', () => {
	const inputs = document.querySelectorAll('input');
	debugger;
	inputs.forEach(input => input.type = 'password');
})

showButtons.forEach(button => {
	button.addEventListener('click', toggleShowPassword);
});

function toggleShowPassword(e) {
	const icon = e.target.children[0];
	const passwordInput = e.target.parentElement.parentElement.children[0];
	
	passwordInput.type = 
		(passwordInput.type === 'password') ? 'text' : 'password';

	icon.classList.toggle('fa-eye');
	icon.classList.toggle('fa-eye-slash');
}

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

