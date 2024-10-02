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

// Run the code when the page is fully loaded
window.addEventListener('load', function() {
  // Display SweetAlert popup
  Swal.fire({
      title: '<strong>Hola Selamat Datang!</strong>',
      html: 'Terima kasih telah mengunjungi website kami.',
      icon: 'info',
      showCloseButton: true,
      focusConfirm: false,
      confirmButtonText: 'OK',
      confirmButtonColor: '#e72463',
      customClass: {
          title: 'swal2-title-custom',
          content: 'swal2-content-custom',
      }
  });
});


document.getElementById("feedback-form").onsubmit = function(event) {

  const Name = document.getElementById("name").value;
  const Email = document.getElementById("email").value;
  const Password = document.getElementById("password").value;
  const rate = document.getElementById("rate").value; // Ambil nilai tanggal
  const review = document.getElementById("review").value;

  const resultDiv = document.getElementById("result");
  
  // Membuat elemen baru untuk hasil ulasan
  const reviewItem = document.createElement("div");
  reviewItem.classList.add("review-item");

  // Menghasilkan simbol bintang berdasarkan rating
  const stars = '★'.repeat(rating) + '☆'.repeat(5 - rating); // Simbol bintang
  reviewItem.innerHTML = `<strong>${name}</strong> - ${stars}<br>Ulasan: ${review}<br><em>Tanggal Kunjungan: ${visitDate}</em>`;
  
  resultDiv.appendChild(reviewItem);
  
};