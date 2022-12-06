const titles = {
  phone: 'Teléfono: ',
  bank: 'Banco: ',
  ci: 'Cédula: ',
  name: 'Beneficiario: ',
  type: 'Tipo de cuenta: ',
  account: 'Nro. de cuenta: ',
}

const transformCredentials = (credentials) => {
  const credentialsArr = Object.entries(credentials)
  const res = []
  credentialsArr.forEach(pair => {
    if(pair[0] in titles)
    res.push({
      title: titles[pair[0]],
      data: pair[1],
    })
  })
  return res
}

function getCredentials() {
  const jsonString = document.querySelector('form[data-credentials]').dataset.credentials
  const credentials =  JSON.parse(jsonString)

  credentials.movil = transformCredentials(credentials.movil)
  credentials.transfer = transformCredentials(credentials.transfer)
  return credentials
}

export default getCredentials