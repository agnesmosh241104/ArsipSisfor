document.addEventListener("DOMContentLoaded", function () {
    // Add any custom JavaScript here if needed in the future
});

document.getElementById('createNewBtn').addEventListener('click', function () {
    var dropdown = document.getElementById('dropdownContent');
    dropdown.classList.toggle('show');
});

document.addEventListener('DOMContentLoaded', function() {
    const createNewButton = document.getElementById('createNewButton');
    const submenu = document.getElementById('submenu');

    if (createNewButton && submenu) {
        createNewButton.addEventListener('click', function() {
            submenu.classList.toggle('show');
        });
    }
});

