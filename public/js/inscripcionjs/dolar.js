function getDolarPrice() {
  fetch('https://s3.amazonaws.com/dolartoday/data.json')
    .then(data => data.json())
    .then(json => {
      console.log("i'll try to do my best <3")
      document.querySelector('html').dataset.dolarPrice = json.USD.transferencia
    })
    .catch(err => {
      console.log(err)
      getDolarPrice()
    })
}

getDolarPrice()