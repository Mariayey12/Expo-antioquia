document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('navbar-toggle');
    const navbarItems = document.getElementById('navbar-items');
    const menuItems = document.querySelectorAll('.menu-item');

    toggleButton.addEventListener('click', () => {
        navbarItems.classList.toggle('active');
    });

    menuItems.forEach(item => {
        item.addEventListener('click', () => {
            const submenu = item.querySelector('.submenu');
            if (submenu) {
                submenu.classList.toggle('active');
            }
        });
    });
});