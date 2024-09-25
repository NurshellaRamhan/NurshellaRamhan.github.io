let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');

menu.addEventListener('click', ()=>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('nav-toggle');
})

window.onscroll=()=>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('nav-toggle');
}

const header = document.querySelector('header');

window.onscroll = function(){
    if(document.documentElement.scrollTop > 5){
        header.classList.add('active');
    }else{
        header.classList.remove('active');
    }
}

// script.js

const modeToggle = document.getElementById('modeToggle');
const body = document.body;

// Check if the user has a preferred mode (localStorage)
const savedMode = localStorage.getItem('mode');
if (savedMode) {
  body.classList.add(savedMode);
  updateButtonText(savedMode);
}

// Toggle between dark and light mode
modeToggle.addEventListener('click', () => {
  body.classList.toggle('dark-mode');
  const currentMode = body.classList.contains('dark-mode') ? 'dark-mode' : 'light-mode';
  
  // Save the user's preference
  localStorage.setItem('mode', currentMode);
  
  // Update the button text based on the current mode
  updateButtonText(currentMode);
});

// Function to update the button text
function updateButtonText(mode) {
  if (mode === 'dark-mode') {
    modeToggle.textContent = 'Switch to Light Mode';
  } else {
    modeToggle.textContent = 'Switch to Dark Mode';
  }
}
