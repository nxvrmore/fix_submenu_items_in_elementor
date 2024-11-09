document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los enlaces con submenú en el menú
    document.querySelectorAll('.menu-item-has-children > a').forEach(function (menuLink) {
      menuLink.addEventListener('click', function (event) {
        const menuItem = menuLink.parentElement;
        const subMenu = menuItem.querySelector('.sub-menu');
        
        // Verifica si el submenú está abierto
        const isSubMenuOpen = subMenu && subMenu.style.display === 'block';
  
        // Si el submenú no está abierto, evitar la navegación y mostrar el submenú
        if (!isSubMenuOpen) {
          event.preventDefault();
          subMenu.style.display = 'block';
        } else {
          // Si ya está abierto, permitir la navegación
          window.location.href = menuLink.href;
        }
      });
    });
  });
  