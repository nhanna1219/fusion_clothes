import jQuery from 'jquery';
window.$ = jQuery;

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

$(function () {
    // Get the button
    const mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    const scrollFunction = () => {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.classList.remove("hidden");
        } else {
            mybutton.classList.add("hidden");
        }
    };
    const backToTop = () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    };

    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    window.addEventListener("scroll", scrollFunction);


    // Swiper.js
    const swiper = new Swiper('.swiper', {
        direction: 'horizontal',
        loop: true,
        slidesPerView: 4,
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // autoplay: {
        //     delay: 4500,
        //     disableOnInteraction: false,
        // },
    });

    // Disable control in video
    $('video').each(function () {
        this.controls = false;
    });

    // Scrolling into Video Testimonial
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                entry.target.classList.remove('opacity-0');
                entry.target.classList.add('opacity-100');
            }
        });
    }, {
        threshold: 0.2
    });

    const items = document.querySelectorAll('.video-testimonial .item');
    items.forEach(item => observer.observe(item));
});
