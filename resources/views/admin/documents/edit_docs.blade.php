<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Document</title>
    <link rel="stylesheet" href="{{asset ('css/edit_document.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/admin_page.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
                <img src="images/user-circle-solid-24.png" alt="Profile Icon" id="profile-icon">
                <div class="dropdown-menu" id="profile-dropdown">
                    <a href="head_account.html"><i class="bi bi-person-circle" id="account-icon"> </i>Account</a>
                    <a href="#"><i class="bi bi-box-arrow-left" id="logout-icon"></i> Logout</a>
                </div>
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
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-people-fill" id="employees"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-hourglass-split" id="pendings"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-bell-fill" id="notification"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-cloud-arrow-up-fill" id="upload-icon"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-search" id="search-icon"></i></div></li>
            </ul>
            <div class="profile-settings">
                <div class="profile-settings">
                    <div class="icon-container" data-target="#sidebar"><i class="bi bi-door-open-fill"></i></div>
                    <div class="icon-container" data-target="#sidebar"><img src="{{'(images/boy-1.png') }}" alt="Profile Icon" class="profile-pic"></div>
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
                <!--
                <div class="search-container">
                    <input type="text" id="sidebar-search" placeholder="Search">
                    <i class="bi bi-search"></i>
                </div>
                -->
            <ul>
                <li><a href="{{ route('home.admin') }}" id="home">Home</a></li>

                <li><a href="{{ route('admin.admin_dashboard') }}" id="report">Digitized Report</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" id="digitized">Digitized Documents <i class="bi bi-chevron-right"></i></a>
                    <ul class="more-dropdown-menu">
                        <li><a href="{{ route('admin.documents.memorandum') }}" id="memorandum"> Memorandum</a></li>
                        <li><a href="admin_admin_orders.html" id="admin_order">Administrative Order</a></li>
                        <li><a href="admin_mrsp.html" id="mrsp"> Monthly Report Service Personnel</a></li>
                        <li><a href="admin_cms.html" id="cms"> Claim Monitoring Sheet</a></li>
                        <li><a href="admin_audit.html" id="audit"> Audited Documents</a></li>
                    </ul>
                </li>
            </ul>
                
            <ul>
                <li>
                    <a href="#" class="emp-dropdown-toggle" id="digitized">Employee <i class="bi bi-chevron-right"></i></a>
                        <ul class="emp-dropdown-menu">
                            <li><a href="{{ route ('admin.office_staff') }}" id="memorandum"> Office Staff</a></li>
                            <li><a href="{{ route ('admin.college_dean') }}" id="admin_order">College Dean</a></li>
                        </ul>
                </li>
                <li>
                    <a href="#" class="pending-dropdown-toggle" id="digitized">Pendings <i class="bi bi-chevron-right"></i></a>
                    <ul class="pending-dropdown">
                        <li><a href="{{ route ('admin.documents.approved_docs') }}" id="approval">Approved</a></li>
                        <li><a href="{{ route ('admin.documents.review_docs') }}" id="request">Review</a></li>
                        <li><a href="{{ route ('admin.documents.request_docs') }}" id="request">Request</a></li>
                    </ul>
                </li>
                <li><a href="admin_notification.html" id="announcements-icon"> Notifications</a></li>
                <li><a href="{{ route('admin.admin_upload_document') }}" id="upload">Upload</a></li>
                <li><a href="search.html" id="search">Search</a></li>
            </ul>
                <div class="profile-content">
                    <ul>
                        <li><a href="{{ route('logout') }}"> Logout</a></li>
                        <li><a href="{{route('admin.admin_account')}}" id="account">Profile</a></li>
                    </ul>
                </div>
            </div>
    </div>

    <main id="view-section">
                <div class="documents-content">
                    <div class="doc-container">
                        <div class="view-documents">
                            <div class="doc-description">
                                <a href="#" class="back-icon" onclick="showBackPopup()">
                                    <i class="bi bi-arrow-return-left"></i>
                                </a>                        
                                <h5 class="file-title">Title:</h5>
                                <input type="text" class="document_name" value="Administrative Order No. 331 Series of 2023">
                                <h5 class="issued_date">Issued Date:</h5>
                                <input type="text" class="issued_date" value="June 2, 2023">
                                <div class="description">
                                    <h5>Description:</h5>
                                    <textarea class="description">
        In view of the University's continued quest for quality management system and to ensure the highest level of efficiency and effectiveness in the performance of office transactions at the office of the University President, you are hereby designated as Senior Staff at the Presidential Management Staff Office and University Documents and Records Controller on concurrent capacity effective 02 May 2023 until revoked by a subsequent issuance from this Office in accordance with the existing Civil Service rules and regulations.
                                    </textarea>
                                </div>
                            </div>
                            <div class="viewing-btn">
                                <button class="cancel-btn" onclick="cancelEditing()">Cancel</button>
                                <button class="save-btn" onclick="saveChanges()">Save Changes</button>
                            </div>
                            <div class="doc-file">
                                <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0&zoom=125" width="100%" height="600px"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Popup message for back icon -->
            <div id="back-popup" class="popup-message">
                <p>Are you sure you want to go back?</p>
                <button onclick="confirmBack()">Yes</button>
                <button onclick="hideBackPopup()">No</button>
            </div>

    
    <footer>
        <div class="footer-content">
            <p>© 2023 Bicol University. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset ('js/edit_document.js') }}"></script>
    <script src="{{ asset ('js/admin_page.js') }}"></script>
</body>
</html>