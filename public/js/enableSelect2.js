const width = '100%'
const minimumResultsForSearch = Infinity
const placeholder = 'Seleccionar...'

$(document).ready(() => {
  $('select').each((_, el) => {
    if(el.multiple) {
      enable(el, {width, placeholder});
    } else if(el.dataset.search === 'search') {
      enable(el, {width})
    } else {
      enable(el, {width, minimumResultsForSearch})
    }
  })
})

function enable(el, options) {
  $(el).select2(options);
}