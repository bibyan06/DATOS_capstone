document.addEventListener("DOMContentLoaded", function () {
    const iconContainers = document.querySelectorAll(".icon-container");
    const extraSidebar = document.querySelector(".extra-sidebar");
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const dropdownMenu = document.querySelector(".more-dropdown-menu");
    const closeIcon = document.querySelector(".bi-text-right");

    // Dropdown toggle behavior
    dropdownToggle.addEventListener("click", function () {
        dropdownMenu.classList.toggle("more-dropdown-active");
        this.querySelector("i.bi-chevron-right").classList.toggle("more-dropdown-active");
    });

    // Close dropdown menu when the cursor leaves
    dropdownMenu.addEventListener("mouseleave", function () {
        dropdownMenu.classList.remove("more-dropdown-active");
        dropdownToggle.querySelector("i.bi-chevron-right").classList.remove("more-dropdown-active");
    });


    // Close the extra sidebar when the close icon is clicked
    closeIcon.addEventListener("click", function () {
        extraSidebar.classList.remove("active");
        iconContainers.forEach((icon) => icon.classList.remove("active"));
    });

    // Add click event to icons to toggle extra-sidebar and close dropdowns
    iconContainers.forEach((container) => {
        container.addEventListener("click", function () {
            extraSidebar.classList.toggle("active");

            // Hide dropdowns if they are open
            dropdownMenu.classList.remove("more-dropdown-active");
            dropdownToggle.querySelector("i.bi-chevron-right").classList.remove("more-dropdown-active");

            iconContainers.forEach((icon) => icon.classList.remove("active"));
            this.classList.add("active");
        });
    });
});

document.addEventListener('click', function(e) {
    let suggestionsContainer = document.getElementById('suggestions-container');
    if (!suggestionsContainer.contains(e.target) && e.target !== document.getElementById('header-search')) {
        suggestionsContainer.style.display = 'none'; // Hide suggestions when clicking outside
    }
});

document.getElementById('sidebar-search').addEventListener('input', function() {
    console.log('Input event triggered');
    let query = this.value;

    if (query.length >= 1) { // Start searching after 1 character
        fetch(`{{ route('office_staff.documents.os_search') }}?query=${query}`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            let suggestionsContainer = document.getElementById('suggestions-container');
            suggestionsContainer.innerHTML = ''; // Clear previous suggestions
            
            if (data.length > 0) {
                data.forEach(document => {
                    let suggestionHtml = `
                        <div class="suggestion-item">
                            <span>${document.document_name}</span>
                        </div>
                    `;
                    suggestionsContainer.insertAdjacentHTML('beforeend', suggestionHtml);
                });
                suggestionsContainer.style.display = 'block'; // Show suggestions
            } else {
                suggestionsContainer.innerHTML = '<p>No matches found.</p>';
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        document.getElementById('suggestions-container').style.display = 'none'; // Hide suggestions if query is empty
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const query = 'd'; // Example query, replace with dynamic value if needed

    fetch(`${searchUrl}?query=${query}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Render search results in the DOM
        })
        .catch(error => {
            console.error('Error:', error);
        });
});


