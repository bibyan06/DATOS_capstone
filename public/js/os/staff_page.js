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

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('sidebar-search');
    const searchResultsContainer = document.createElement('div');
    searchResultsContainer.classList.add('search-results');
    document.querySelector('.search-container').appendChild(searchResultsContainer);

    searchInput.addEventListener('input', function() {
        let query = searchInput.value.trim();

        if (query.length > 0) {
            fetch(`/search-documents?query=${query}`)
                .then(response => {
                    console.log('Raw response:', response);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
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
                        searchResultsContainer.innerHTML = '<p>No matching documents found.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching documents:', error);
                    searchResultsContainer.innerHTML = '<p>There was an error fetching the documents.</p>';
                });
        } else {
            searchResultsContainer.innerHTML = '';  // Clear results if query is empty
        }
    });
});



// document.addEventListener('DOMContentLoaded', function() {
//     const query = 'd'; // Example query, replace with dynamic value if needed

//     fetch(`${searchUrl}?query=${query}`)
//         .then(response => response.json())
//         .then(data => {
//             console.log(data);
//             // Render search results in the DOM
//         })
//         .catch(error => {
//             console.error('Error:', error);
//         });
// });


