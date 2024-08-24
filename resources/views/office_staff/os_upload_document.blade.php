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
   
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
   
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
            <div class="search-container">
                <input type="text" id="sidebar-search" placeholder="Search">
                <i class="bi bi-search"></i>
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
                <li><div class="icon-container" data-target="#home"><i class="bi bi-house-fill" id="home-icon"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-file-earmark-fill"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-bell-fill"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-cloud-arrow-up-fill"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-search" id="search-icon"></i></div></li>
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
                <li><a href="{{ route('home.office_staff') }}" id="home">Home</a></li>
                <li><a href="{{ route('office_staff.os_dashboard') }}">Digitized Report</a></li>
                <li>
                    <a href="#" class="dropdown-toggle">Digitized Documents <i class="bi bi-chevron-right"></i></a>
                    <ul class="more-dropdown-menu">
                        <li><a href="{{ route('office_staff.documents.memorandum') }}"><i class="bi bi-card-heading" id="memo-icon"></i> Memorandum</a></li>
                        <li><a href="staff_admin_orders.html">Administrative Order</a></li>
                        <li><a href="staff_mrsp.html"><i class="bi bi-calendar-event-fill"></i> Monthly Report Service Personnel</a></li>
                        <li><a href="staff_cms.html"><i class="bi bi-receipt-cutoff"></i> Claim Monitoring Sheet</a></li>
                        <li><a href="staff_audit.html"><i class="bi bi-credit-card-2-front-fill"></i> Audited Documents</a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li><a href="{{ route('office_staff.os_notification') }}">Notifications</a></li>
                <li><a href="{{ route('office_staff.os_upload_document') }}">Upload</a></li>
                <li><a href="{{ route('office_staff.documents.os_all_docs') }}" id="search">Search</a></li>
            </ul>
            <div class="profile-content">
                <ul>
                    <li><a href="{{ route('logout') }}"><i class="bi bi-door-open-fill"></i> Logout</a></li>
                    <li><a href="{{ route('profile') }}">Profile</a></li>
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
                    <p>Select File or Drag and drop files to upload</p>
                    <input type="file" id="file-input" name="file" hidden accept=".pdf" required>
                    <button class="select-files" onclick="document.getElementById('file-input').click()">Select File</button>
                    <p>*Supported format: PDF</p>
                    <h6>Maximum file size: 5MB</h6>
                </div>
                    <div class="uploaded-files">
                        <h4>File Selected</h4>
                        <ul id="file-list"></ul>
                    </div>
                </div>
                
                <div class="form-section">
                     <!-- Display error messages here -->
                     @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                <form id="uploadDocumentForm" action="{{route('office_staff.os_upload_document')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="document-number">Document Number</label>
                        <input type="text" id="document-number" name="document_number" class="form-control" placeholder="Enter Document Number">
                    </div>
                    <div class="form-group">
                        <label for="document-name">Document Name</label>
                        <input type="text" id="document-name" name="document_name" class="form-control" placeholder="Enter Document Name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter Document Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_name">Category</label>
                        <select name="category_name" id="category_name" class="form-control">
                            @foreach($categories as $category)
                                <!-- <option value="">Select Category</option> -->
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <!-- @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror -->
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" id="tags" name="tags" class="form-control" placeholder="Enter Tags (comma-separated)">
                    </div>

                    <button type="submit" class="submit-btn">Upload Document</button>                
                </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script src="{{ asset('js/os/staff_upload.js') }}"></script>
    <script src="{{ asset ('js/os/staff_page.js') }}"></script>

    <script>
    document.getElementById('uploadDocumentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        const fileInput = document.getElementById('file-input');
        const file = fileInput.files[0];

        if (file && file.type === 'application/pdf' && file.size <= 5242880) { // 5MB = 5242880 bytes
            var formData = new FormData(this);

            // Explicitly append the file to the FormData object
            formData.append('file', file);

            fetch("{{ route('office_staff.os_upload_document') }}", {
                method: "POST",
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload(); // Reload the page to reset the form
                    });
                } else if (data.error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.error,
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong. Please try again.',
                    confirmButtonText: 'OK'
                });
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Invalid file',
                text: 'Please upload a valid PDF file of up to 5MB.',
                confirmButtonText: 'OK'
            });
        }
    });


    function handleDrop(event) {
        event.preventDefault();
        const files = event.dataTransfer.files;
        handleFiles(files);
    }

    function handleDragOver(event) {
        event.preventDefault();
        document.getElementById('upload-area').classList.add('drag-over');
    }

    function handleDragLeave(event) {
        document.getElementById('upload-area').classList.remove('drag-over');
    }

    function handleFiles(files) {
    const fileList = document.getElementById('file-list');
    const maxFileSize = 5 * 1024 * 1024; // 5MB in bytes

    for (let i = 0; i < files.length; i++) {
        const file = files[i];

        // Validate the file type (must be PDF)
        if (file.type !== "application/pdf") {
            Swal.fire({
                icon: 'error',
                title: 'Invalid File Type',
                text: 'Only PDF files are allowed!',
                confirmButtonText: 'OK'
            });
            continue;
        }

        // Validate the file size (must be less than 5MB)
        if (file.size > maxFileSize) {
            Swal.fire({
                icon: 'error',
                title: 'File Too Large',
                text: 'The file size must not exceed 5MB!',
                confirmButtonText: 'OK'
            });
            continue;
        }

        // Display the file in the uploaded files section
        const listItem = document.createElement('li');
        listItem.className = 'standby-file';
        listItem.innerHTML = `
            <i class="bi bi-file-earmark-pdf-fill"></i>
            <span>${file.name}</span>
            <button class="delete-button" onclick="removeFile(this)">&times;</button>
        `;
        fileList.appendChild(listItem);
    }
}

    document.getElementById('file-input').addEventListener('change', (event) => {
        handleFiles(event.target.files);
    });
</script>

</body>
</html>
