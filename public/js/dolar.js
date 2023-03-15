'use strict'
function getDolarPrice() {
  const url = document.querySelector('#serialized').dataset.dolar

  fetch(url)
    .then(data => data.text())
    .then(html => {
      const doc = (new DOMParser).parseFromString(html, 'text/html')
      
      const price = parseFloat(
        doc.querySelector('#dolar strong').innerText.replaceAll(',', '.')
      )

      localStorage.setItem('usd-price', price)
    })
    .then(() => {
      console.log("i'll try to do my best <3")
      document.querySelector('.loading-container').remove()
      document.querySelector('#stepperSection').setAttribute('style', '')
    })
    .catch(err => {
      console.log(err)
    })
}

getDolarPrice()