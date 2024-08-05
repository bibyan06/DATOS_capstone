document.addEventListener('DOMContentLoaded', () => {
    function setupDropdown(toggleSelector, menuSelector, iconSelector, iconClosedClass, iconOpenClass) {
        const dropdownToggle = document.querySelector(toggleSelector);
        const dropdownMenu = document.querySelector(menuSelector);
        const dropdownIcon = document.querySelector(iconSelector);

        // Initialize the dropdown to be hidden
        if (dropdownMenu) {
            dropdownMenu.style.display = 'none';
        }

        if (dropdownToggle && dropdownMenu && dropdownIcon) {
            dropdownToggle.addEventListener('click', (e) => {
                e.preventDefault();
                const isDropdownVisible = dropdownMenu.style.display === 'block';
                dropdownMenu.style.display = isDropdownVisible ? 'none' : 'block';
                dropdownIcon.className = isDropdownVisible ? iconClosedClass : iconOpenClass;
            });

            document.addEventListener('click', (e) => {
                if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.style.display = 'none';
                    dropdownIcon.className = iconClosedClass;
                }
            });
        }
    }

    setupDropdown('.dropdown-toggle', '.dropdown', '#dropdown-icon', 'bi bi-caret-right-fill', 'bi bi-caret-down-fill');
    setupDropdown('.employee-dropdown-toggle', '.employee-dropdown', '#employee-dropdown-icon', 'bi bi-caret-right-fill', 'bi bi-caret-down-fill');
    setupDropdown('.pending-dropdown-toggle', '.pending-dropdown', '#pending-dropdown-icon', 'bi bi-caret-right-fill', 'bi bi-caret-down-fill');

    // Profile dropdown
    const profileIcon = document.getElementById('profile-icon');
    const profileDropdown = document.getElementById('profile-dropdown');

    if (profileDropdown) {
        profileDropdown.style.display = 'none';
    }

    if (profileIcon && profileDropdown) {
        profileIcon.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.style.display = profileDropdown.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', () => {
            profileDropdown.style.display = 'none';
        });
    }

    // More options dropdown
    const dropdownButton = document.getElementById('dropdownMenuButton');
    const dropdownContent = document.getElementById('more-option');

    if (dropdownContent) {
        dropdownContent.style.display = 'none';
    }

    if (dropdownButton && dropdownContent) {
        dropdownButton.addEventListener('click', (event) => {
            event.preventDefault();
            dropdownContent.classList.toggle('show');
        });

        window.addEventListener('click', (event) => {
            if (!event.target.closest('.right')) {
                dropdownContent.classList.remove('show');
            }
        });
    }
});