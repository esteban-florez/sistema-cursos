import { getSerialized } from '../utils.js'

const titles = {
  phone: 'Teléfono: ',
  bank: 'Banco: ',
  ci: 'Cédula: ',
  name: 'Beneficiario: ',
  type: 'Tipo de cuenta: ',
  account: 'Nro. de cuenta: ',
}

function transformCredentials(credentials) {
  return Object.entries(credentials)
    .map(([title, data]) => ({ title: titles[title], data }))
}

function getCredentials(type) {
  let credentials = getSerialized('credentials')

  credentials = transformCredentials(credentials[type])

  return credentials
}

export default getCredentials