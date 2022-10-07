const findSelectedCheckbox = checksArray => checksArray.find(check => check.checked === true);

const uncheckCheckboxes = checks => {
  checks.forEach(check => check.checked = false);
}

export { findSelectedCheckbox, uncheckCheckboxes };