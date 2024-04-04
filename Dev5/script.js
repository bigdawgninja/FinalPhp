window.onload = function() {
    const dots = document.querySelectorAll('.dot');
    const triangle = document.querySelector('.triangle-down');

    dots.forEach(dot => {
        animateElement(dot);
    });

    animateElement(triangle);

    function animateElement(element) {
        const randomX = Math.random() * (window.innerWidth - element.offsetWidth);
        const randomY = Math.random() * (window.innerHeight - element.offsetHeight);

        element.style.position = 'absolute';
        element.style.left = randomX + 'px';
        element.style.top = randomY + 'px';

        setInterval(function() {
            const newX = Math.random() * (window.innerWidth - element.offsetWidth);
            const newY = Math.random() * (window.innerHeight - element.offsetHeight);

            element.style.transition = 'all 0.5s ease';
            element.style.left = newX + 'px';
            element.style.top = newY + 'px';
        }, 2000);
    }
};
