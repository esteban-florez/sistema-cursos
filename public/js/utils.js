function findSelectedCheckbox (checksArray) {
  return checksArray.find(check => check.checked === true)
}
export { findSelectedCheckbox }
