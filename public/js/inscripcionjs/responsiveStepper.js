const main = document.querySelector('main');
const stepperHeader = document.querySelector('.bs-stepper-header');

const observer = new ResizeObserver(([mainEntry]) => {
  const mainWidth = mainEntry.contentRect.width;
  updateStepperShape(mainWidth);
});

function updateStepperShape(mainWidth) {
  if(mainWidth < 830) {
    stepperHeader.classList.add('single-step');
  } else {
    stepperHeader.classList.remove('single-step'); 
  }
}
observer.observe(main);