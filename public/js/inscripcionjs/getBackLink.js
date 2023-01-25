function getBackLink() {
  const form = document.querySelector('form[data-back]')
  return form.dataset.back
}

export default getBackLink