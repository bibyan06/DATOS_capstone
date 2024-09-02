<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicol University Home</title>
    <link rel="stylesheet" href="{{ asset ('css/os/staff_edit.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/os/staff_page.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                    <a href="{{ route('office_staff.os_account') }}"><i class="bi bi-person-circle" id="account-icon"></i>Account</a>
                    <a href="{{ route('logout') }}" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left" id="logout-icon"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </header>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <nav class="navbar">
        <div class="navbar-content">
            <div class="logo-container">
                <img src=" {{ asset ('images/sidebar-logo.png') }}" alt="Bicol University Logo" class="nav-logo">
            </div>
            <ul class="nav-icons">
                <li><div class="icon-container" data-target="#home"><i class="bi bi-house-fill" id="home-icon"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-file-earmark-fill"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-bell-fill"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-cloud-arrow-up-fill"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-search"></i></div></li>
            </ul>
            <div class="profile-settings">
                <div class="profile-settings">
                    <div class="icon-container" data-target="#home"><i class="bi bi-door-open-fill"></i></div>
                    <div class="icon-container" data-target="#home"><img src="{{ asset ('images/boy-1.png') }}" alt="Profile Icon" class="profile-pic"></div>
                </div>
                
            </div>
        </div>
    </nav>

    <div class="extra-sidebar" id="sidebar">
        <div class="sidebar-content">
            <div class="sidebar-title">
                <h3>DASHBOARD</h3>
                <i class="bi bi-text-right"></i>
            </div>
            <ul>
                <li><a href="{{ route('home.office_staff') }}" id="home">Home</a></li>
                <li><a href="{{ route('office_staff.os_dashboard') }}" id="report">Digitized Report</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" id="digitized">Digitized Documents <i class="bi bi-chevron-right"></i></a>
                    
                    <ul class="more-dropdown-menu">
                        <li><a href="{{ route ('office_staff.documents.memorandum') }}" id="memorandum">Memorandum</a></li>
                        <li><a href="staff_admin_orders.html" id="admin_order">Administrative Order</a></li>
                        <li><a href="staff_mrsp.html" id="mrsp">Monthly Report Service Personnel</a></li>
                        <li><a href="staff_cms.html" id="cms">Claim Monitoring Sheet</a></li>
                        <li><a href="staff_audit.html" id="audit">Audited Documents</a></li>
                    </ul>

                </li>           
            </ul>
            <ul>
                <li><a href="{{ route ('office_staff.os_notification') }}" id="announcements-icon">Notifications</a></li>
                <li><a href="{{ route ('office_staff.os_upload_document') }}" id="upload">Upload</a></li>
                <li><a href="{{ route('office_staff.documents.os_all_docs') }}" id="search">Search</a></li>
                
            </ul>
            <div class="profile-content">
                <ul>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                    <li><a href="{{ route ('office_staff.os_account') }}" id="account">Profile</a></li>
                </ul>
            </div>
        </div>
    </div>
     
    <main id="view-section">
        <div class="documents-content">
            <div class="doc-container">
                <div class="view-documents">

                 <!-- Display success message if present -->
                 @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('office_staff.documents.update', $document->document_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="doc-description">
                            <a href="#" class="back-icon" onclick="confirmBack(event)">
                                <i class="bi bi-arrow-return-left"></i>
                            </a>                        
                            <h5 class="file-title">Title:</h5>
                                <input type="text" name="document_name" class="document_name form-control" value="{{ old('document_name', $document->document_name) }}" required>
                            <h5>Date Uploaded:</h5>
                                <h3 class="issued_date">{{ \Carbon\Carbon::parse($document->upload_date)->format('F j, Y') }}</h3>
                            <div class="description">
                                <h5>Description:</h5>
                                <textarea name="description" class="description form-control" rows="5" required>{{ old('description', $document->description) }}</textarea>
                            </div>
                        </div>
                        <div class="viewing-btn">
                            <button type="button" class="save-btn">Save Changes</button>
                            <button href="{{ route('office_staff.documents.os_view_docs', $document->document_id) }}" class="cancel-btn" style="background-color: red;"  onclick="confirmBack(event)">Cancel</button>
                        </div>
                        <div class="doc-file">
                             <iframe src="{{ route('document.serve', basename($document->file_path)) }}#toolbar=0&zoom=126" frameborder="0"></iframe>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
           
    <footer>
        <div class="footer-content">
            <p>© 2023 Bicol University. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset ('js/edit_document.js') }}"></script>
    <script src="{{ asset ('js/os/staff_page.js') }}"></script>

    <script>
        function confirmBack(event) {
            event.preventDefault(); // Prevent default anchor behavior

            Swal.fire({
                title: 'Are you sure?',
                text: "You will lose any unsaved changes!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('office_staff.documents.os_view_docs', $document->document_id) }}";
                }
            });
        }

        document.querySelector('.save-btn').addEventListener('click', function(event) {
            event.preventDefault(); 

            Swal.fire({
                title: 'Save changes?',
                text: "Are you sure you want to save these changes?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Your changes have been saved.',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        event.target.closest('form').submit();
                    });
                }
            });
        });
    </script>
</body>
</html>