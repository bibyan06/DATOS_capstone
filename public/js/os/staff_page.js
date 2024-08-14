// Handle sidebar toggling
document.querySelectorAll('.icon-container').forEach(icon => {
    icon.addEventListener('click', function() {
        const targetSidebar = document.querySelector(this.getAttribute('data-target'));

        // If the sidebar is already active, remove the 'active' class (toggle functionality)
        if (targetSidebar.classList.contains('active')) {
            targetSidebar.classList.remove('active');
            this.classList.remove('active');
        } else {
            // Otherwise, close all sidebars and then open the clicked one
            document.querySelectorAll('.extra-sidebar').forEach(sidebar => {
                sidebar.classList.remove('active');
            });
            document.querySelectorAll('.icon-container').forEach(icon => {
                icon.classList.remove('active');
            });

            // Add the 'active' class to the clicked icon and corresponding sidebar
            targetSidebar.classList.add('active');
            this.classList.add('active');
        }
    });
});

// Search functionality
document.querySelectorAll('.search-input').forEach(searchInput => {
    searchInput.addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        const sidebarItems = this.closest('.extra-sidebar').querySelectorAll('.sidebar-item');
        
        sidebarItems.forEach(item => {
            const text = item.textContent || item.innerText;
            if (text.toLowerCase().includes(filter)) {
                item.style.display = "";
            } else {
                item.style.display = "none";
            }
        });
    });
});

// Toggle dropdown menu
document.querySelectorAll('.more-dropdown-toggle').forEach(toggle => {
    toggle.addEventListener('click', function() {
        // Close all other dropdowns
        document.querySelectorAll('.more-dropdown-active').forEach(activeItem => {
            if (activeItem !== this.parentElement) {
                activeItem.classList.remove('more-dropdown-active');
            }
        });

        // Toggle the clicked dropdown
        this.parentElement.classList.toggle('more-dropdown-active');
    });
});

// Handle closing sidebar with the close icon
document.querySelectorAll('.bi-text-right').forEach(closeIcon => {
    closeIcon.addEventListener('click', function() {
        const sidebar = this.closest('.extra-sidebar');

        // Remove the 'active' class from the sidebar and its corresponding icon
        sidebar.classList.remove('active');
        document.querySelector(`.icon-container[data-target="#${sidebar.id}"]`).classList.remove('active');
    });
});