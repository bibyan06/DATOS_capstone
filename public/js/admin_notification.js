document.addEventListener("DOMContentLoaded", () => {
    const dateTimeElement = document.getElementById("current-date-time");

    function updateTime() {
        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes();
        const seconds = now.getSeconds();
        const ampm = hours >= 12 ? 'PM' : 'AM';
        const formattedHours = hours % 12 || 12;
        const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
        const formattedSeconds = seconds < 10 ? '0' + seconds : seconds;

        const timeString = `${formattedHours}:${formattedMinutes}:${formattedSeconds} ${ampm}`;
        const dateString = now.toLocaleDateString('en-US', { weekday: 'long', day: 'numeric', month: 'numeric', year: 'numeric' });

        if (dateTimeElement) {
            dateTimeElement.textContent = `${dateString} ${timeString}`;
        }
    }

    updateTime();
    setInterval(updateTime, 1000);
});


document.addEventListener('DOMContentLoaded', function () {
    const emailItems = document.querySelectorAll('.email-item');

    emailItems.forEach(item => {
        item.addEventListener('click', function (e) {
            // Check if the click was inside the email-actions or the checkbox
            if (e.target.closest('.email-actions') || e.target.type === 'checkbox') {
                // If click is on .email-actions or the checkbox, do nothing and return early
                return;
            }

            // Get relevant information from the clicked row
            const documentName = this.querySelector('.document-name').textContent.trim();
            const receiverName = this.querySelector('.receiver').textContent.trim();
            const status = this.getAttribute('data-status'); // Assuming you have a status attribute

            // Use SweetAlert2 to display the document details
            Swal.fire({
                title: 'Document Details',
                html: `
                    <p><strong>Document Name:</strong> ${documentName}</p>
                    <p><strong>Receiver:</strong> ${receiverName}</p>
                    <p><strong>Status:</strong> ${status === 'seen' ? 'Seen' : 'Delivered'}</p>
                `,
                icon: status === 'seen' ? 'success' : 'info', // Icon based on status
                showCloseButton: true,
                focusConfirm: false,
                confirmButtonText: 'Close',
                confirmButtonColor: '#3085d6'
            });
        });
    });
});

