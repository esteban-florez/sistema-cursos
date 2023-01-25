const promise = new Promise((resolve) => {
  setTimeout(() => {
    resolve("i'll keep trying <3")
  }, 0)
})

promise.then((messageToTheFuture) => {
  console.log(messageToTheFuture)
  const overlay = document.querySelector('.overlay')
  const height = document.body.clientHeight
  overlay.style.height = `${height}px`
})


