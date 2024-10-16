const hamburger = document.querySelector('.hamburger');
const dropMenu = document.querySelector('.drop-menu');
// const modeToggle = document.querySelector('.mode-toggle');
// const walkInServiceLink = document.querySelector('a[href="#walk-in"]');
// const shopServiceLink = document.querySelector('a[href="#shop"]');


const body = document.body;

hamburger.addEventListener('click', () => {
    dropMenu.classList.toggle('active');
});

// modeToggle.addEventListener('click', () => {
//     body.classList.toggle('light-mode');
//     const modeIcon = modeToggle.querySelector('i');
//     const modeText = modeToggle.querySelector('span');

//     if (body.classList.contains('light-mode')) {
//         modeIcon.classList.replace('fa-moon', 'fa-sun');
//         modeText.textContent = "Light Mode";
//     } else {
//         modeIcon.classList.replace('fa-sun', 'fa-moon');
//         modeText.textContent = "Dark Mode";
//     }
// });

// walkInServiceLink.addEventListener('click', (event) => {
//     event.preventDefault(); 
//     alert('The Walk-in Service feature is currently under development.');
// });

// shopServiceLink.addEventListener('click', (event) => {
//     event.preventDefault(); 
//     alert('The Shop feature is currently under development.');
// });
