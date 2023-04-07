const wrapper = document.querySelector('.wrapper')
const loginLink = document.querySelector('.login-link')
const registerLink = document.querySelector('.register-link')
const logPopUp = document.querySelector('.pop-up')
const iconClose = document.querySelector('.close')
const container = document.querySelector('.login-container')
const loginBody = document.querySelector('.login-body')


registerLink.addEventListener('click', function() {
  wrapper.classList.add('active-form');
});
loginLink.addEventListener('click', function() {
  wrapper.classList.remove('active-form');
});
logPopUp.addEventListener('click', function() {
    wrapper.classList.add('active-pop');
    container.classList.add('active-pop');;
});
iconClose.addEventListener('click', function() {
    wrapper.classList.remove('active-pop');
    container.classList.remove('active-pop');
}); 
container.addEventListener('click', function(e) {
    wrapper.classList.remove('active-pop');
    container.classList.remove('active-pop');
}); 

container.addEventListener('click', function(event){
    event.stopPropagation();
})

wrapper.onclick = (e) => {
    e.stopPropagation()
}
