const roleSelect = $('#role')
const gradeSelect = document.querySelector('#grade')
const areaSelect = document.querySelector('#areaId')
const degreeSelect = document.querySelector('#degree')

const enable = el => {
  el.setAttribute('required', '')
  el.removeAttribute('disabled')
}

const disable = el => {
  el.setAttribute('disabled', '')
  el.removeAttribute('required')
}

function update() {
  const value = roleSelect.val()

  if (value === 'Estudiante') {
    enable(gradeSelect)
    disable(areaSelect)
    disable(degreeSelect)
  }
  
  if (value === 'Instructor') {
    disable(gradeSelect)
    enable(areaSelect)
    enable(degreeSelect)
  }

  if (value === '') {
    disable(gradeSelect)
    disable(areaSelect)
    disable(degreeSelect)
  }
}

roleSelect.on('change', update)

update()