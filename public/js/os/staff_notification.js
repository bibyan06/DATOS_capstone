// Date and time update
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

document.addEventListener('DOMContentLoaded', function() {
    const emailItems = document.querySelectorAll('.email-item');

    emailItems.forEach(item => {
        item.addEventListener('click', function(e) {
            // Check if the clicked target is not an email action
            if (!e.target.closest('.email-actions')) {
                const documentId = this.getAttribute('data-id');
                const sender = this.getAttribute('data-sender');
                const documentName = this.getAttribute('data-document');
                const snippet = this.getAttribute('data-snippet');
                const fileUrl = this.getAttribute('data-file-url');

                // Show SweetAlert modal
                Swal.fire({
                    title: documentName,
                    html: `
                    <p><strong>Sender:</strong> ${sender}</p>
                    <p><strong>Description:</strong> ${snippet}</p>
                    `,
                    icon: 'info',
                    showCloseButton: true,
                    confirmButtonText: 'View Document',
                    showCancelButton: true,
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Update status to "seen" via AJAX
                        fetch(`/forwarded-documents/${documentId}/update-status`, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({ status: 'seen' })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                console.log(data.message); // Log success message
                                // Open the document in a new tab or window
                                window.open(fileUrl, '_blank');
                            } else {
                                console.error(data.message); // Log failure message
                            }
                        })
                        .catch(error => {
                            console.error('Error updating status:', error);
                        });
                    }
                });
            }
        });
    });
});
