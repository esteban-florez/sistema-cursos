const switches = document.querySelectorAll('input.custom-control-input');

switches.forEach(switchEl => switchEl.addEventListener('input', handleSwitchInput));

function handleSwitchInput(e) {
  const switchEl = e.target;
  const labelEl = document.querySelector(`label[for="${switchEl.id}"]`);
  
  if(switchEl.value === 'true') {
    switchEl.value = 'false';
    labelEl.innerText = 'No';
    toggleLabelClass(labelEl);
  } else {
    switchEl.value = 'true';
    labelEl.innerText = 'Sí';
    toggleLabelClass(labelEl);
  }
}

function toggleLabelClass(label) {
  label.classList.toggle('text-success');
  label.classList.toggle('text-danger');
}