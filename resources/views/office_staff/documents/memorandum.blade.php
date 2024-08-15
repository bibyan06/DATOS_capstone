<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicol University Home</title>
    <link rel="stylesheet" href="css/os/staff_memorandum.css">
    <link rel="stylesheet" href="css/os/staff_page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="left-header">
                <img src="images/Bicol_University.png" alt="Bicol University Logo" class="logo">
                <h1>BICOL <span>UNIVERSITY</span></h1>
            </div>
            <div class="search-container">
                <input type="text" id="sidebar-search" placeholder="Search">
                <i class="bi bi-search"></i>
            </div>
            <div class="profile-icon">
                <img src="images/user-circle-solid-24.png" alt="Profile Icon" id="profile-icon">
            </div>
        </div>
    </header>

    
    <nav class="navbar">
        <div class="navbar-content">
            <div class="logo-container">
                <img src="{{ asset ('images/sidebar-logo.png') }}" alt="Bicol University Logo" class="nav-logo">
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
                <div class="icon-container" data-target="#home"><img src="images/boy-1.png" alt="Profile Icon" class="profile-pic"></div>
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

        <main id="memorandum-content">
            <div class="memorandum-container">
                <div class="memorandum-title">
                    <h1>MEMORANDUM</h1>
                </div>
                <div class="left-content">
                    <div class="memorandum-search-bar">
                        <input type="text" class="search-text" placeholder="Search Document">
                        <div class="icon"><i class="bi bi-search"></i></div>
                    </div>
                    <div class="memorandum-option">
                        <div class="search">
                            <select class="option-text">
                                <option value="" disabled selected>Select Month</option>
                                <option value="doc1">January</option>
                                <option value="doc2">February</option>
                                <option value="doc3">April</option>
                                <option value="doc4">May</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div id="dashboard-section">
                <div class="dashboard-container">
                    <div class="documents">
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>                        
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="staff_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="staff_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="staff_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="staff_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="staff_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="staff_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="staff_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="staff_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="staff_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="staff_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="staff_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="staff_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Add more documents as needed -->
                    </div>
                </div>
            </div>

            
        </main>
 
    
    <footer>
        <div class="footer-content">
            <p>&copy; DATOS 2024 Bicol University. All Rights Reserved.</p>
            <p>Contact us: <a href="mailto:datos.bu@gmail.com">datos.bu@gmail.com</a></p>
        </div>
    </footer>
    <script src="{{ asset ('js/os/staff_memorandum.js') }}"></script>
    <script src="{{ asset ('js/os/staff_page.js') }}"></script>
</body>

</html>