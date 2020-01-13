( ()=> {
    const buttons = document.querySelectorAll('.faq__question');
    buttons.forEach((button) => {
        button.addEventListener('click', () => {
            const { target } = button.dataset;
            document.getElementById(target).classList.toggle('is-open');
        });
    });
})();
