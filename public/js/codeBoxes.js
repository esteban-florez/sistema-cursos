const input = document.querySelector('#codeInput');
const spans = document.querySelectorAll('.box');
const boxes = [...spans];

document.addEventListener('keydown', e => console.log(e))

boxes.forEach(box => box.addEventListener('click', () => input.focus()));

input.addEventListener('focus', setCursor);
input.addEventListener('input', setCursor);
input.addEventListener('input', updateBoxesValues);
input.addEventListener('blur', removeFocus);

function removeFocus() {
	boxes.forEach(box => box.classList.remove('box-selected'));
}

function updateBoxesValues() {
	boxes.forEach(box => box.innerText = '');
	const code = this.value;
	const chars = code.split(''); 
	chars.forEach((char, i) => {
		boxes[i].innerText = char;
	});
}

function setCursor() {
	let pos = this.value.length;
	removeFocus();
	if(pos === 4) pos = 3;
	boxes[pos].classList.add('box-selected');
}