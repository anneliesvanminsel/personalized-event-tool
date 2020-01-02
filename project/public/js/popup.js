function openForm(form) {
    document.body.style.position = 'fixed';
    document.body.style.top = `-${window.scrollY}px`;
    document.getElementById(form).style.display = "block";

}

function closeForm(form) {
    const scrollY = document.body.style.top;
    document.body.style.position = '';
    document.body.style.top = '';
    window.scrollTo(0, parseInt(scrollY || '0') * -1);
    document.getElementById(form).style.display = "none";
}