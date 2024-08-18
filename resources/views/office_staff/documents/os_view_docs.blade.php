<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicol University Home</title>
    <link rel="stylesheet" href="{{ asset ('css/os/staff_view.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/os/staff_page.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="left-header">
                <img src="{{ asset ('images/Bicol_University.png') }}" alt="Bicol University Logo" class="logo">
                <h1>BICOL <span>UNIVERSITY</span></h1>
            </div>
            <div class="search-container">
                <input type="text" id="sidebar-search" placeholder="Search">
                <i class="bi bi-search"></i>
            </div>
            <div class="profile-icon">
                <img src="{{ asset ('images/user-circle-solid-24.png') }}" alt="Profile Icon" id="profile-icon">
            </div>
        </div>
    </header>

    
    <nav class="navbar">
        <div class="navbar-content">
            <div class="logo-container">
                <img src="{{ asset ('images/sidebar-logo.png') }}" alt="Bicol University Logo" class="nav-logo">
            </div>
            <ul class="nav-icons">
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-house-fill" id="home-icon"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-file-earmark-fill" id="digitized-icon"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-bell-fill" id="notification"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-cloud-arrow-up-fill" id="upload-icon"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-search" id="search-icon"></i></div></li>
            </ul>
            <div class="profile-settings">
                <div class="profile-settings">
                    <div class="icon-container" data-target="#sidebar"><i class="bi bi-door-open-fill"></i></div>
                    <div class="icon-container" data-target="#sidebar"><img src="{{ asset ('images/boy-1.png') }}" alt="Profile Icon" class="profile-pic"></div>
                </div>
                
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
                    <a href="#" class="more-dropdown-toggle">Digitized Documents <i class="bi bi-chevron-right"></i></a>
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


    <main id="view-section">
        <div class="documents-content">
        <div class="doc-container">
            <div class="view-documents">
                <div class="doc-description">
                    <a href="officer.html" class="back-icon">
                        <i class="bi bi-arrow-return-left"></i>
                        <span class="tooltip">Go back</span>
                    </a>                        
                    <h5 class="file-title">Title:</h5>
                    <h1 class="document_name">Administrative Order No. 331 Series of 2023</h1>
                    <h3 class="issued_date">June 2, 2023</h3>
                    <div class="description">
                        <h5>Description:</h5>
                        <p>In view of the University's continued quest for quality management system and to ensure the highest level of efficiency and effectiveness in the performance of office transactions at the office of the University President, you are hereby designated as Senior Staff at the Presidential Management Staff Office and University Documents and Records Controller on concurrent capacity effective 02 May 2023 until revoked by a subsequent issuance from this Office in accordance with the existing Civil Service rules and regulations.</p>
                    </div>
                </div>
                <div class="viewing-btn">
                    <button class="edit-btn" onclick="location.href='staff_edit.html'">Edit</button>
                    <button class="download-btn" onclick="downloadDocument()">Download</button>
                </div>
                <div class="doc-file">
                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0&zoom=126" width="100%" height="600px" ></iframe>
                </div>
            </div>
        </div>
        </div>
    </main>


    <footer>
        <div class="footer-content">
            <p>&copy; DATOS 2024 Bicol University. All Rights Reserved.</p>
            <!-- <p>Contact us: <a href="mailto:datos.bu@gmail.com">datos.bu@gmail.com</a></p> -->
        </div>
    </footer>

    <script src="{{ asset ('js/os/staff_view.js') }}"></script>
    <script src="{{ asset ('js/os/staff_page.js') }}"></script>

</body>
</html>