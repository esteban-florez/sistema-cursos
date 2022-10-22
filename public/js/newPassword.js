const showButtons = document.querySelectorAll(
	'.input-group-append > button')
const submitButton = document.querySelector(
	'button[type="submit"]')

// submitButton.addEventListener('click', () => {
// 	const inputs = document.querySelectorAll('input')
// 	inputs.forEach(input => input.type = 'password')
// })

showButtons.forEach(button => {
	button.addEventListener('click', toggleShowPassword)
});

function toggleShowPassword(e) {
	e.preventDefault();
	const icon = e.target.children[0]
	const passwordInput = e.target.parentElement.parentElement.children[0]
	
	passwordInput.type = 
		(passwordInput.type === 'password') ? 'text' : 'password'

	icon.classList.toggle('fa-eye');
	icon.classList.toggle('fa-eye-slash')
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

