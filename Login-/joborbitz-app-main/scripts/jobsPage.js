const accordions = document.querySelectorAll('.accordian')
const accordionHeader = document.querySelectorAll('.accordianHeader')

accordions.forEach(accordian => accordian.classList.remove('activeAccordian'))

accordionHeader.forEach(accHeader => {
    accHeader.addEventListener('click', (e) => {
        const currAcc = e.target.parentElement
        currAcc.classList.toggle('activeAccordian')
    })
})