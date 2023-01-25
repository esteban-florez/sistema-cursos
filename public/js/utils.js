const findSelectedCheckbox = checksArray => checksArray.find(check => check.checked === true)

// UNUSED
const uncheckCheckboxes = checks => {
  checks.forEach(check => check.checked = false)
}

export { findSelectedCheckbox, uncheckCheckboxes }