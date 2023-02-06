export default function select2() {
  const width = '100%'
  const placeholder = 'Seleccionar...'
  
  $('select').each((_, el) => {
    let options = {}
 
    if (el.name !== 'ci_type') {
      options = { width }
    }

    if(el.multiple) {
      options = {...options, placeholder }
    }
  
    $(el).select2(options)
  })
}

select2()
