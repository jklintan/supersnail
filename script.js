const init = () => {
    if (window.innerWidth < 600) {
        toggleHeader()
    }
    updateClock()
}

const toggleTheme = () => {
    const elements = document.querySelectorAll('body, header')
    elements.forEach(element => {
    const style = window.getComputedStyle(element).backgroundColor
    console.log(style)
    if (style === 'rgb(34, 56, 67)') {
        element.style.backgroundColor = '#eae0cc'
    } else {
        element.style.backgroundColor = 'rgb(34, 56, 67)'
    }
})
}

const toggleHeader = () => {
    const element = document.querySelector('#toggle')
    const header = document.querySelector('header')
    if (header.clientHeight > element.clientHeight) {
        header.style.height = element.clientHeight + 'px'
    } else {
        const height = header.childElementCount * element.clientHeight
        header.style.height = height + 'px'
        console.log(height)
    }
}

const updateClock = () => {
    const element = document.querySelector('#time')
    const date = new Date()
    element.innerHTML = ''
    append(pad(date.getHours()))
    append(':')
    append(pad(date.getMinutes()))
    append(':')
    append(pad(date.getSeconds()))
    setTimeout(function () { updateClock() }, 1000)
}

const pad = (num) => {
    const ret = num.toString().padStart(2, '0')
    return ret
}

const append = (num) => {
    const element = document.querySelector('#time')
    const digitElement = document.createElement('p')
    digitElement.textContent = num
    element.appendChild(digitElement)
}

const newPost = (state) => {
    const element = document.querySelector('.overlay')
    if (state) {
        element.style.transform = 'translateY(0)'
    } else {
        // element.style.transform = 'translateY(-100vh)'
    }
}

const closeOverlay = () => {
    document.querySelector('.overlay').style.transform = 'translateY(-100vh)'
}