document.addEventListener('DOMContentLoaded', () => {
    const aboutSections = document.querySelectorAll('.about-content');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            } else {
                entry.target.classList.remove('visible'); 
            }
        });
    }, {
        threshold: 0.2
    });

    aboutSections.forEach(section => observer.observe(section));
});
