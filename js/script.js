let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

document.getElementById("menu-btn").onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () =>{
  menu.classList.remove('fa-times');
  navbar.classList.remove('active');

 if(window.scrollY > 0){
    header.classList.add('active');
 }else{
    header.classList.remove('active');
 }

};

document.querySelectorAll('.about .video-container .controls .control-btn').forEach(btn =>{
    btn.onclick = () =>{
        let src = btn.getAttribute('data-src');
        document.querySelector('.about .video-container .video').src = src;
    }
})

// ------------ Swiper ------------

 var swiper = new Swiper(".reviews-slider", {
    spaceBetween: 20,
    grabCursor: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      540: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });

// ----------- dark mode -------------

let themeButton = document.querySelector('#theme-btn');
let darkTheme = document.querySelector('.dark-theme');

document.getElementById("theme-btn").onclick = () => {
    themeButton.classList.toggle('fa-sun');
    document.body.classList.toggle('dark-theme');
}


