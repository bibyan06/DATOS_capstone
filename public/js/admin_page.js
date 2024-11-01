document.addEventListener("DOMContentLoaded", function () {
    const iconContainers = document.querySelectorAll(".icon-container");
    const extraSidebar = document.querySelector(".extra-sidebar");
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const dropdownToggle1 = document.querySelector(".emp-dropdown-toggle");
    const dropdownToggle2 = document.querySelector(".pending-dropdown-toggle");
    const dropdownMenu = document.querySelector(".more-dropdown-menu");
    const dropdownMenuEmp = document.querySelector(".emp-dropdown-menu");
    const dropdownMenuPending = document.querySelector(".pending-dropdown");
    const closeIcon = document.querySelector(".bi-text-right");

    // Dropdown toggle behavior
    dropdownToggle.addEventListener("click", function () {
        dropdownMenu.classList.toggle("more-dropdown-active");
        this.querySelector("i.bi-chevron-right").classList.toggle("more-dropdown-active");
    });

    dropdownToggle1.addEventListener("click", function () {
        dropdownMenuEmp.classList.toggle("emp-dropdown-active");
        this.querySelector("i.bi-chevron-right").classList.toggle("emp-dropdown-active");
    });

    dropdownToggle2.addEventListener("click", function () {
        dropdownMenuPending.classList.toggle("pending-dropdown-active");
        this.querySelector("i.bi-chevron-right").classList.toggle("pending-dropdown-active");
    });

    // Close dropdown menu when the cursor leaves
    dropdownMenu.addEventListener("mouseleave", function () {
        dropdownMenu.classList.remove("more-dropdown-active");
        dropdownToggle.querySelector("i.bi-chevron-right").classList.remove("more-dropdown-active");
    });

    dropdownMenuEmp.addEventListener("mouseleave", function () {
        dropdownMenuEmp.classList.remove("emp-dropdown-active");
        dropdownToggle1.querySelector("i.bi-chevron-right").classList.remove("emp-dropdown-active");
    });

    dropdownMenuPending.addEventListener("mouseleave", function () {
        dropdownMenuPending.classList.remove("pending-dropdown-active");
        dropdownToggle2.querySelector("i.bi-chevron-right").classList.remove("pending-dropdown-active");
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
            dropdownMenuEmp.classList.remove("emp-dropdown-active");
            dropdownToggle1.querySelector("i.bi-chevron-right").classList.remove("emp-dropdown-active");
            dropdownMenuPending.classList.remove("pending-dropdown-active");
            dropdownToggle2.querySelector("i.bi-chevron-right").classList.remove("pending-dropdown-active");

            iconContainers.forEach((icon) => icon.classList.remove("active"));
            this.classList.add("active");
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('sidebar-search');
    const searchResultsContainer = document.createElement('div');
    searchResultsContainer.classList.add('search-results');
    document.querySelector('.search-container').appendChild(searchResultsContainer);

    searchInput.addEventListener('input', function () {
        let query = searchInput.value.trim();

        if (query.length > 0) {
            fetch(`/search-documents?query=${query}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not okay');
                    }
                    return response.json();
                })
                .then(data => {
                    searchResultsContainer.innerHTML = '';  // Clear previous results
                    if (data.length > 0) {
                        data.forEach(doc => {
                            const resultItem = document.createElement('div');
                            resultItem.classList.add('search-result-item');
                            resultItem.innerHTML = `<a href="/documents/${doc.document_id}">${doc.document_name}</a>`;
                            searchResultsContainer.appendChild(resultItem);
                        });
                    } else {
                        // Display 'No results found' if no documents match the query
                        searchResultsContainer.innerHTML = '<p style="color: black;">No documents found.</p>';
                    }
                    searchResultsContainer.style.display = 'block'; // Show the results
                })
                .catch(error => {
                    console.error('Error fetching documents:', error);
                    searchResultsContainer.innerHTML = '<p>There was an error fetching the documents.</p>';
                });
        } else {
            searchResultsContainer.innerHTML = '';  // Clear the results if the query is empty
            searchResultsContainer.style.display = 'none'; // Hide the results
        }
    });

    // Hide search results when clicking outside of the search container or the results
    document.addEventListener('click', function (event) {
        if (!searchInput.contains(event.target) && !searchResultsContainer.contains(event.target)) {
            searchResultsContainer.style.display = 'none'; // Hide the search results
        }
    });

    // Prevent hiding search results when clicking inside the search input or results container
    searchInput.addEventListener('click', function (event) {
        if (searchResultsContainer.innerHTML !== '') {
            searchResultsContainer.style.display = 'block'; // Show the search results if not empty
        }
    });
});

const dropdownToggle3 = document.querySelector(".archives-dropdown-toggle");

const dropdownMenuArchives = document.querySelector(".archives-dropdown-menu");

dropdownToggle3.addEventListener("click", function () {
        dropdownMenuArchives.classList.toggle("archives-dropdown-active");
        this.querySelector("i.bi-chevron-right").classList.toggle("archives-dropdown-active");
    });

dropdownMenuArchives.addEventListener("mouseleave", function () {
        dropdownMenuArchives.classList.remove("archives-dropdown-active");
        dropdownToggle3.querySelector("i.bi-chevron-right").classList.remove("archives-dropdown-active");
    });
