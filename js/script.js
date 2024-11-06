const carousel = document.querySelector('.carousel');
const slides = document.querySelectorAll('.carousel-slide');
const totalSlides = slides.length;
let currentSlide = 0;
let autoSlideInterval;

// Função para mover o carrossel
function moveCarousel(index) {
    carousel.style.transform = `translateX(${-index * 100}vw)`; // Ajustado para usar 'vw'
}

// Próximo slide        
function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    moveCarousel(currentSlide);
}

// Slide anterior
function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    moveCarousel(currentSlide);
}

// Botão direito (próximo slide)
document.querySelector('.right-btn').addEventListener('click', () => {
    nextSlide();
    resetAutoSlide();
});

// Botão esquerdo (slide anterior)
document.querySelector('.left-btn').addEventListener('click', () => {
    prevSlide();
    resetAutoSlide();
});

// Slide automático a cada 5 segundos
function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, 4000);
}

// Reinicia o slide automático após interação manual
function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    startAutoSlide();
}

// Inicia o carrossel
startAutoSlide();
document.addEventListener("DOMContentLoaded", function () {
    const leftArrow = document.querySelector('.left-topic-arrow');
    const rightArrow = document.querySelector('.right-topic-arrow');
    const carousel = document.querySelector('.topic-carousel');

    leftArrow.addEventListener('click', () => {
        carousel.scrollBy({
            left: -1600, // Ajuste a quantidade de rolagem conforme necessário
            behavior: 'smooth'
        });
    });

    rightArrow.addEventListener('click', () => {
        carousel.scrollBy({
            left: 1600, // Ajuste a quantidade de rolagem conforme necessário
            behavior: 'smooth'
        });
    });
});
