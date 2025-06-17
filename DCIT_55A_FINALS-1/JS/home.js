document.addEventListener('DOMContentLoaded', () => {
    const featureItems = document.querySelectorAll('.feature-item');
    const observerFeature = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const img = entry.target.querySelector('.feature-img');
            const text = entry.target.querySelector('.feature-text');

            if (entry.isIntersecting) {
                img.classList.add('visible');
                text.classList.add('visible');
            } else {
                img.classList.remove('visible');
                text.classList.remove('visible');
            }
        });
    }, { threshold: 0.2 });

    featureItems.forEach(item => observerFeature.observe(item));

    const aboutSection = document.querySelector('.services');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                aboutSection.classList.add('fade');
            } else {
                aboutSection.classList.remove('fade');
            }
        });
    }, {
        threshold: 0.2
    });

    observer.observe(aboutSection);
});
