const body = document.querySelector('.frame')
const fox = document.querySelector('.fox')
const bunny = document.querySelector('.bunny')
const btn = document.querySelector('button')
const sun = document.querySelector('.sun')
//===== LEAVES =====
const leaves = []

for (let index = 0; index < anime.random(15, 25); index++) {
  const img = document.createElement('img')
  img.src = './img/leaf.svg'
  img.classList.add('leaf')
  img.style.left = anime.random(60, 660) + 'px'
  leaves.push(img)
}



const animatedLeaves = leaves.map((img) => {
  const rotateXValue = anime.random(10,30)
  const animatedLeaf = anime({
  targets: img,
  duration: 12000,
  easing: 'linear',
  autoplay: false,
  loop:true,
  delay: anime.random(0, 12000),
  keyframes: [
    {translateY: '20px', translateX: '15px', rotateZ: -5, rotateX: rotateXValue, rotateY:30, scale: 1.3},
    {translateY: '40px', translateX: '-15px', rotateZ: 25, rotateY: -rotateXValue},
    {translateY: '60px', translateX: '15px', rotateZ: -5, rotateY: rotateXValue},
    {translateY: '80px', translateX: '-15px', rotateZ: 25, rotateY: -rotateXValue},
    {translateY: '100px', translateX: '15px', rotateZ: -5, rotateY: rotateXValue, scale: 1.2},
    {translateY: '120px', translateX: '-15px', rotateZ: 25, rotateY: -rotateXValue},
    {translateY: '140px', translateX: '15px', rotateZ: -5, rotateY: rotateXValue},
    {translateY: '160px', translateX: '-15px', rotateZ: 25, rotateY: -rotateXValue},
    {translateY: '180px', translateX: '15px', rotateZ: -5, rotateY: rotateXValue, scale: 1.1},
    {translateY: '200px', translateX: '-15px', rotateZ: 25, rotateY: -rotateXValue},
    {translateY: '220px', translateX: '15px', rotateZ: -5, rotateY: rotateXValue, scale: 1},
    {translateY: '240px', translateX: '-15px', rotateZ: 25, rotateY: -rotateXValue},
    {translateY: '260px', translateX: '15px', rotateZ: -5, rotateY: rotateXValue},
  ]
})
body.append(img)
  return animatedLeaf
})

//===== BUSHES =====

const bushes = []


for (let index = 1; index <= 5; index++) {
  const img = document.createElement('img')
  img.src = `./img/bush${anime.random(1,3)}.svg`
  img.classList.add('bush')
  img.style.left = anime.random(30, 500) + 'px'
  img.style.zIndex = anime.random(900, 1000)
  bushes.push(img)
  if(index === 1) {
    bunny.style.left = img.style.left
  }
  
}

const animatedBushes = bushes.map((img)=> {

  const bush = anime({
    targets: img,
    loop: true, 
    duration: 200,
    autoplay: false,
    easing: 'linear',
    direction: 'alternate',
    delay: anime.random(1000, 20000),
    keyframes: [
      {rotateZ: anime.random(-1, 1)},
      {rotateZ: anime.random(-1, 1)},
      {rotateZ: anime.random(-1, 1)},
      {rotateZ: anime.random(-1, 1)},
      {rotateZ: anime.random(-1, 1)},
    ]
    
  })
  body.append(img)
  return bush
})

//===== FOX =====


const animatedFox = anime({
    targets: fox,
    loop: true,
    duration: 20000,
    autoplay: false,
    keyframes: [
      {translateX: 350},
      {rotateY: 180, duration: 0},
      {translateX: 0},
      {rotateY: 180, duration: 0},
    ]
  })

let isPlaying = false
btn.addEventListener('click', ()=> {
  if(!isPlaying) {
    animatedFox.play()
    animatedLeaves.forEach((leaf)=> {
      leaf.play()
    })
    animatedBushes.forEach((bush)=> {
      bush.play()
    })
    isPlaying = true
  }
  else {
    animatedFox.pause()
    animatedLeaves.forEach((leaf)=> {
      leaf.pause()
    })
    animatedBushes.forEach((bush)=> {
      bush.pause()
    })
    isPlaying = false
  }
})

//===== SUN =====

  let left = 10
  let edge = false
  setInterval(()=> {
     sun.style.transform = `rotateZ(${left/4}deg)`
    if(left < 600 && !edge) {
      left++
      sun.style.left = left + 'px'
    }
    else if(left > 15 && edge) {
      left--
      sun.style.left = left + 'px'
    }
    else if(left === 600) {
      edge = true
    }
    else if(left === 15) {
      edge = false
    }
  },20)