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