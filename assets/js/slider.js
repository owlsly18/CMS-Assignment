let currentIndex = 0;
const slides = [
    {
        image: '../assets/images/HeroImage1.png',
        title: 'Get instant cash flow with invoice factoring',
        subtitle: 'Why wait? Get same-day funding and a faster way to access cash flow.',
        button: 'Get started'
    },
    {
        image: '../assets/images/HeroImageYellow.png',
        title: 'Get instant cash flow with invoice factoring',
        subtitle: 'Why wait? Get same-day funding and a faster way to access cash flow.',
        button: 'Get started'
    },
    {
        image: '../assets/images/HeroImage3.png',
        title: 'Get instant cash flow with invoice factoring',
        subtitle: 'Why wait? Get same-day funding and a faster way to access cash flow.',
        button: 'Get started'
    }
];

const title = document.getElementById('hero-title');
const subtitle = document.getElementById('hero-subtitle');
const button = document.getElementById('hero-btn');
const image = document.getElementById('hero-image');
const indicators = document.querySelectorAll('.circle');

function changeSlide(index) {
    const slide = slides[index];
    
    title.textContent = slide.title;
    subtitle.textContent = slide.subtitle;
    button.textContent = slide.button;
    image.src = slide.image;

    indicators.forEach((indicator, i) => {
        indicator.classList.remove('active');
        if (i === index) {
            indicator.classList.add('active');
        }
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    changeSlide(currentIndex);
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    changeSlide(currentIndex);
}

changeSlide(currentIndex);

// setInterval(nextSlide, 6000);