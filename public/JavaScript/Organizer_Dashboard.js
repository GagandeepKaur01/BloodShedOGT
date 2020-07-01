const selectElement = (element) => document.querySelector(element);
const header = selectElement('header');
const mainContent = selectElement('main');
selectElement('.hamburger').addEventListener('click', () => {
    header.classList.toggle('active');
    mainContent.classList.toggle('active');
    if(mainContent.classList.contains('active')){
        nav_icon.classList.remove('fa-bars');
        nav_icon.classList.add('fa-times');
    }
    else{
        nav_icon.classList.remove('fa-times');
        nav_icon.classList.add('fa-bars');
    }
});

window.onclick = (event) => {
    if(event.target.matches('.active')){
        if(header.classList.contains('active')){
            header.classList.remove('active');
            mainContent.classList.remove('active');
        }
    }
};

