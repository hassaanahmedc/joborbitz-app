const slider = document.querySelector('.members')
const slides = document.querySelectorAll('.member')
let currentSlide = 0
let maxSlides = slides.length - 1

const dotsContainer = document.querySelector('.dots')

const createDots = () => {
    slides.forEach((_, index) => {
        dotsContainer.insertAdjacentHTML('beforeend', `<button class='dots__dot' data-slide='${index}'></button>`)
    })
}
createDots()

const dots = document.querySelectorAll('.dots__dot');

let activeDot = function (slideNumber) {
    dots.forEach(d => d.classList.remove('dots__dot--active'))

    document.querySelector(`.dots__dot[data-slide='${slideNumber}']`).classList.add('dots__dot--active')
}
activeDot(0)

const sliderInit = function (slideNum) {
    slides.forEach((item, index) => item.style.transform = `translateX(${100 * (index - slideNum)}%)`)
}
sliderInit(0)

dotsContainer.addEventListener('click', function (e) {
    if (e.target.classList.contains('dots__dot')) {
        dots.forEach(e => e.classList.remove('dots__dot--active'))
        let slide = e.target.dataset.slide;
        sliderInit(slide)
        activeDot(slide)
    }
})


// const slideRight = function () {
//     if (currentSlide === maxSlides) currentSlide = 0;
//     else currentSlide++;

//     sliderInit(currentSlide)
//     activeDot(currentSlide)
// }

// const sliderInterval = setInterval(() => {
//     slideRight()

// }, 3000);