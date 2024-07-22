document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('account-content');
    const editBtn = document.querySelector('.edit-btn');
    const infoText = document.querySelector('.info-text');
    const infoInput = document.querySelector('.info-input');
    const label = document.querySelector('.label');

    menuToggle.addEventListener('click', function () {
        sidebar.classList.toggle('visible');
        mainContent.classList.toggle('shifted');
    });

    editBtn.addEventListener('click', function () {
        if (editBtn.textContent === 'EDIT') {
            switchToEditMode();
        } else {
            saveChanges();
        }
    });

    function switchToEditMode() {
        infoText.style.display = 'none';
        infoInput.style.display = 'grid';
        label.classList.add('editing');
        editBtn.textContent = 'SAVE CHANGES';
    }

    function saveChanges() {
        // Update the text with the input values
        document.getElementById('employee-id').textContent = document.getElementById('employee-id-input').value;
        document.getElementById('name').textContent = document.getElementById('name-input').value;
        document.getElementById('email').textContent = document.getElementById('email-input').value;
        document.getElementById('phone').textContent = document.getElementById('phone-input').value;
        document.getElementById('age').textContent = document.getElementById('age-input').value;
        document.getElementById('gender').textContent = document.getElementById('gender-input').value;
        document.getElementById('address').textContent = document.getElementById('address-input').value;

        infoText.style.display = 'grid';
        infoInput.style.display = 'none';
        label.classList.remove('editing');
        editBtn.textContent = 'EDIT';
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const dropdownToggle = document.querySelector('.dropdown-toggle');
    const dropdownMenu = document.querySelector('.dropdown');
    const dropdownIcon = document.getElementById('dropdown-icon');

    dropdownToggle.addEventListener('click', (e) => {
        e.preventDefault();
        const isDropdownVisible = dropdownMenu.style.display === 'block';

        // Toggle the dropdown menu
        dropdownMenu.style.display = isDropdownVisible ? 'none' : 'block';

        // Change the icon
        dropdownIcon.className = isDropdownVisible ? 'bi bi-caret-right-fill' : 'bi bi-caret-down-fill';
    });

    document.addEventListener('click', (e) => {
        if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.style.display = 'none';
            dropdownIcon.className = 'bi bi-caret-right-fill';
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const profileIcon = document.getElementById('profile-icon');
    const profileDropdown = document.getElementById('profile-dropdown');

    profileIcon.addEventListener('click', function (e) {
        e.stopPropagation(); // Prevent click from bubbling up
        profileDropdown.style.display = profileDropdown.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', function () {
        profileDropdown.style.display = 'none'; // Hide dropdown when clicking outside
    });
});
