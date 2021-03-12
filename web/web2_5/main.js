
const prevArrow = document.querySelector('.left-arrow')
const nextArrow = document.querySelector('.right-arrow')


nextArrow.addEventListener('click', () => {
    const currentCard = document.querySelector('.materials-carousel').querySelector('.main')

    if(currentCard.id < 7) {
        const currentId = +currentCard.id

        currentCard.classList.remove('main')
        document.getElementById(currentId + 1).classList.add('main')
        document.getElementById(currentId + 1).classList.remove('hidden', 'swipe-right')
        document.getElementById(currentId + 2).classList.remove('hidden', 'swipe-right')
        document.getElementById(currentId - 1).classList.add('hidden', 'swipe-left')
    }
})


prevArrow.addEventListener('click', () => {
    const currentCard = document.querySelector('.materials-carousel').querySelector('.main')

    if(currentCard.id > 2) {
        const currentId = +currentCard.id

        currentCard.classList.remove('main')
        document.getElementById(currentId - 1).classList.add('main')
        document.getElementById(currentId - 1).classList.remove('hidden', 'swipe-left')
        document.getElementById(currentId - 2).classList.remove('hidden', 'swipe-left')
        document.getElementById(currentId + 1).classList.add('hidden', 'swipe-right')
    }
})

const projectsPrevArrow = document.querySelector('.projects-arrows-left')
const projectsNextArrow = document.querySelector('.projects-arrows-right')

projectsNextArrow.addEventListener('click', () => {
    const currentCard = document.querySelector('.projects-slider').querySelector('.main')

    if(currentCard.id < 13) {
        const currentId = +currentCard.id

        currentCard.classList.remove('main')
        document.getElementById(currentId + 1).classList.add('main')
        document.getElementById(currentId + 1).classList.remove('hidden', 'swipe-right')
        document.getElementById(currentId).classList.add('hidden', 'swipe-left')
    }
})


projectsPrevArrow.addEventListener('click', () => {
    const currentCard = document.querySelector('.projects-slider').querySelector('.main')

    if(currentCard.id > 10) {
        const currentId = +currentCard.id

        currentCard.classList.remove('main')
        document.getElementById(currentId - 1).classList.add('main')
        document.getElementById(currentId - 1).classList.remove('hidden', 'swipe-left')
        document.getElementById(currentId).classList.add('hidden', 'swipe-right')
    }
})