// Hamburger menu dynamics 

const hamMenu = document.querySelector('header .hamNavigation .ham-menu');

const offScreenMenu = document.querySelector('header .off-screen-menu');

hamMenu.addEventListener('click', () => {
    hamMenu.classList.toggle('active');
    offScreenMenu.classList.toggle('active');
})


// Get the dropdown menu item and the submenu
const dropDownArrow = document.getElementById('dropDownArrow');
const submenu = document.querySelector('.subMenu');

// Add an event listener to the dropdown menu item
dropDownArrow.addEventListener('click', () => {
    console.log('Dropdown arrow clicked!');
  // Toggle the active class on the submenu
  submenu.classList.toggle('active');
});


// Get the dropdown menu item and the submenu
const dropDownArrowOffScreen = document.getElementById('dropDownArrowOffScreen');
const submenuOffScreen = document.querySelector('.subMenuOffScreen');

// Add an event listener to the dropdown menu item
dropDownArrowOffScreen.addEventListener('click', () => {
    console.log('Dropdown arrow clicked!');
  // Toggle the active class on the submenu
  submenuOffScreen.classList.toggle('active');
});

