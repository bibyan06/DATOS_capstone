<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Staff Upload Document</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/os/staff_upload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/os/staff_page.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    
    <!-- JavaScript Files -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Internal Styles -->
    <style>
        .document_number {
            width: 30px;
        }

        .standby-files {
            margin-top: 20px;
        }

        .standby-file {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            position: relative;
        }

        .standby-file i {
            margin-right: 10px;
        }

        .delete-button {
            position: absolute;
            right: 10px;
            cursor: pointer;
            color: red;
            font-size: 20px; /* Adjust size as needed */
            display: inline-block; /* Ensure it’s displayed */
            background: transparent;
            border: none;
            font-family: 'Arial', sans-serif; /* Ensure proper font family */
        }

        .file-preview {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .file-preview img {
            max-height: 50px;
            margin-right: 10px;
        }

        .upload-area.drag-over {
            border: 2px dashed #007bff;
            background-color: #f0f8ff;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-content">
            <div class="left-header">
                <img src="{{ asset('images/Bicol_University.png') }}" alt="Bicol University Logo" class="logo">
                <h1>BICOL <span>UNIVERSITY</span></h1>
            </div>
            <div class="profile-icon">
                <img src="{{ asset('images/user-circle-solid-24.png') }}" alt="Profile Icon" id="profile-icon">
                <div class="dropdown-menu" id="profile-dropdown">
                    <a href="{{ route('office_staff.os_account') }}"><i class="bi bi-person-circle" id="account-icon"></i> Account</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left" id="logout-icon"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar">
        <div class="navbar-content">
            <div class="logo-container">
                <img src="{{ asset('images/sidebar-logo.png') }}" alt="Bicol University Logo" class="nav-logo">
            </div>
            <ul class="nav-icons">
                <li>
                    <div class="icon-container" data-target="#home"><i class="bi bi-house-fill" id="home-icon"></i></div>
                </li>
                <li>
                    <div class="icon-container" data-target="#home"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i></div>
                </li>
                <li>
                    <div class="icon-container" data-target="#home"><i class="bi bi-file-earmark-fill"></i></div>
                </li>
                <li>
                    <div class="icon-container" data-target="#home"><i class="bi bi-bell-fill"></i></div>
                </li>
                <li>
                    <div class="icon-container" data-target="#home"><i class="bi bi-cloud-arrow-up-fill"></i></div>
                </li>
            </ul>
            <div class="profile-settings">
                <div class="icon-container" data-target="#home"><i class="bi bi-door-open-fill"></i></div>
                <div class="icon-container" data-target="#home"><img src="{{ asset('images/boy-1.png') }}" alt="Profile Icon" class="profile-pic"></div>
            </div>
        </div>
    </nav>

    <div class="extra-sidebar" id="home">
        <div class="sidebar-content">
            <div class="sidebar-title">
                <h3>DASHBOARD</h3>
                <i class="bi bi-text-right"></i>
            </div>
            <ul>
                <li><a href="staff_page.html" id="home">Home</a></li>
                <li><a href="staff_dashboard.html">Digitized Report</a></li>
                <li>
                    <a href="#" class="dropdown-toggle">Digitized Documents <i class="bi bi-chevron-right"></i></a>
                    <ul class="more-dropdown-menu">
                        <li><a href="staff_memorandum.html"><i class="bi bi-card-heading" id="memo-icon"></i> Memorandum</a></li>
                        <li><a href="staff_admin_orders.html">Administrative Order</a></li>
                        <li><a href="staff_mrsp.html"><i class="bi bi-calendar-event-fill"></i> Monthly Report Service Personnel</a></li>
                        <li><a href="staff_cms.html"><i class="bi bi-receipt-cutoff"></i> Claim Monitoring Sheet</a></li>
                        <li><a href="staff_audit.html"><i class="bi bi-credit-card-2-front-fill"></i> Audited Documents</a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li><a href="staff_notification.html">Notifications</a></li>
                <li><a href="staff_upload.html">Upload</a></li>
            </ul>
            <div class="profile-content">
                <ul>
                    <li><a href="sign-up.html"><i class="bi bi-door-open-fill"></i> Logout</a></li>
                    <li><a href="staff_account.html">Profile</a></li>
                </ul>
            </div>
        </div>
    </div>

    <main id="dashboard-content">
        <section class="title">
            <div class="title-content">
                <h3>Upload Document</h3>
            </div>
        </section>

        <div class="dashboard-container">
            <div class="upload-section">
                <div class="upload-box">
                <div class="upload-area" id="upload-area" 
                    ondrop="handleDrop(event)" 
                    ondragover="handleDragOver(event)" 
                    ondragleave="handleDragLeave(event)">
                    <i class="bi bi-cloud-arrow-up-fill upload-icon"></i>
                    <p>Drag and drop files to upload</p>
                    <p>or</p>
                    <input type="file" id="file-input" name="file_upload[]" multiple hidden accept=".pdf">
                    <button class="select-files" onclick="document.getElementById('file-input').click()">Select File</button>
                    <p>*Supported format: PDF</p>
                    <h6>Maximum file size: 5MB</h6>
                </div>
                    <div class="uploaded-files">
                        <h4>Uploaded File</h4>
                        <ul id="file-list"></ul>
                    </div>
                </div>
                <div class="form-section">
                <form id="upload-form" action="{{ route('office_staff.upload_document') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="document-number">Document Number</label>
                        <input type="number" id="document-number" name="document_number" value="{{ old('document_number') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="document-name">Document Name</label>
                        <input type="text" id="document-name" name="document_name" value="{{ old('document_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category_id" required>
                            <option value="">Select Category</option>
                            <option value="1">Memorandum</option>
                            <option value="2">Audited Disbursement Voucher</option>
                            <option value="3">Claim Monitoring Sheet</option>
                            <option value="4">Monthly Report Service of Personnel</option>
                        </select>
                        <input type="text" id="other-category" name="other-category" placeholder="Please specify other category">
                    </div>
                    <div class="form-group">
                        <label for="document-tags">Document Tags</label>
                        <input type="text" id="document-tags" name="document_tags" required>
                    </div>
                    <button type="submit" class="submit-btn">Upload Document</button>
                </form>

            </div>
        </div>
    </main>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Your document has been uploaded successfully.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        

        $(document).ready(function () {
            const urlParams = new URLSearchParams(window.location.search);
            const successParam = urlParams.get('success');

            if (successParam === 'true') {
                // Show the success modal
                $('#successModal').modal('show');

                // Remove the 'success' parameter to prevent the modal from showing on page reload
                history.replaceState({}, document.title, window.location.pathname);
            }

            $('#file-input').on('change', function () {
                const files = $(this)[0].files;
                const fileList = $('#file-list');

                fileList.empty(); // Clear previous list

                for (let i = 0; i < files.length; i++) {
                    const fileName = files[i].name;
                    const fileItem = `<li>${fileName}</li>`;
                    fileList.append(fileItem);
                }
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const fileInput = document.getElementById('file-input');
            const fileList = document.getElementById('file-list');
            const allowedTypes = ['application/pdf'];
            const maxSize = 5 * 1024 * 1024; // 5MB in bytes

            function handleFileSelect(files) {
                fileList.innerHTML = ''; // Clear the file list

                files.forEach((file, index) => {
                    console.log('Processing file:', file); // Debug: check each file
                    if (!allowedTypes.includes(file.type)) {
                        Swal.fire('Error', 'Only PDF files are allowed.', 'error');
                        return;
                    }

                    if (file.size > maxSize) {
                        Swal.fire('Error', 'File size must be less than 5MB.', 'error');
                        return;
                    }

                    const listItem = document.createElement('li');
                    listItem.classList.add('standby-file');
                    listItem.innerHTML = `
                        <i class="bi bi-file-earmark-pdf-fill"></i>
                        <span>${file.name}</span>
                        <button class="delete-button" data-index="${index}">X</button>
                    `;
                    fileList.appendChild(listItem);
                });
            }

            function handleFileDrop(event) {
                event.preventDefault(); // Prevent the default behavior (open in new tab)
                document.getElementById('upload-area').classList.remove('drag-over');
                const files = Array.from(event.dataTransfer.files);
                handleFileSelect(files);
            }

            function handleFileInputChange(event) {
                const files = Array.from(event.target.files);
                handleFileSelect(files);
            }

            function handleDragOver(event) {
                event.preventDefault(); // Prevent the default behavior
                event.stopPropagation(); // Stop the event from propagating further
                document.getElementById('upload-area').classList.add('drag-over');
            }

            function handleDragLeave(event) {
                event.preventDefault(); // Prevent the default behavior
                document.getElementById('upload-area').classList.remove('drag-over');
            }

            function deleteFile(event) {
                const index = event.target.getAttribute('data-index');
                const dataTransfer = new DataTransfer();
                const files = Array.from(fileInput.files);

                files.forEach((file, i) => {
                    if (i != index) {
                        dataTransfer.items.add(file);
                    }
                });

                fileInput.files = dataTransfer.files;
                handleFileSelect(dataTransfer.files);
            }

            document.getElementById('upload-area').addEventListener('drop', handleFileDrop);
            document.getElementById('upload-area').addEventListener('dragover', handleDragOver);
            document.getElementById('upload-area').addEventListener('dragleave', handleDragLeave);
            fileInput.addEventListener('change', handleFileInputChange);

            // Use event delegation to handle delete button clicks
            fileList.addEventListener('click', function (event) {
                if (event.target.classList.contains('delete-button')) {
                    deleteFile(event);
                }
            });
        });



    </script>
</body>
</html>
