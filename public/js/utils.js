function getSerialized(attribute) {
  return JSON.parse(document.querySelector('#serialized').dataset[attribute])
}

export { getSerialized }
