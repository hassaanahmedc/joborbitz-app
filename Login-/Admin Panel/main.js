const showPasswordCheck = document.querySelector('#show-pass')
const passwordInput = document.querySelector('#password')
const eyeSlash = document.querySelector('.fa-eye-slash')

showPasswordCheck.addEventListener('click', () => {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text'
        eyeSlash.style.display = 'block'
    }
    else {
        passwordInput.type = 'password'
        eyeSlash.style.display = 'none'
    }
})