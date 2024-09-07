<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicol University Home</title>
    <link rel="stylesheet" href="css/dean_page.css">
    <link rel="stylesheet" href="css/dean_home.css">
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
                <img src="images/boy-1.png" alt="Profile Icon" id="profile-icon">
            </div>
        </div>
    </header>

    <nav class="navbar">
        <div class="navbar-content">
            <div class="logo-container">
                <img src="images/sidebar-logo.png" alt="Bicol University Logo" class="nav-logo">
            </div>
            <ul class="nav-icons">
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-house-fill" id="home-icon"></i></div></li>
                
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-file-earmark-fill" id="digitized-icon"></i></div></li>
               
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-hourglass-split" id="pendings"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-bell-fill" id="notification-icon"></i></div></li>
                
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-search" id="search-icon"></i></div></li>
            </ul>
            <div class="profile-settings">
                <div class="icon-container" data-target="#sidebar"><i class="bi bi-door-open-fill"></i></div>
                <div class="icon-container" data-target="#sidebar"><img src="images/boy-1.png" alt="Profile Icon" class="profile-pic"></div>
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
                <li><a href="dean_page.html" id="home">Home</a></li>
                
                <li>
                    <a href="#" class="dropdown-toggle" id="digitized">Digitized Documents <i class="bi bi-chevron-right"></i></a>
                    
                    <ul class="more-dropdown-menu">
                        <li><a href="dean_memorandum.html" id="memorandum">Memorandum</a></li>
                        <li><a href="dean_dean_orders.html" id="dean_order">Administrative Order</a></li>
                        <li><a href="dean_mrsp.html" id="mrsp">Monthly Report Service Personnel</a></li>
                        <li><a href="dean_cms.html" id="cms">Claim Monitoring Sheet</a></li>
                        <li><a href="dean_audit.html" id="audit">Audited Documents</a></li>
                    </ul>

                </li>
                
            </ul>
            <ul>
                <li><a href="dean_request.html" id="request">Request a Document</a></li>
                <li><a href="dean_notification.html" id="announcements-icon">Notifications</a></li>
                
                <li><a href="dean_all_documents.html" id="search">Search</a></li>
            </ul>
            <div class="profile-content">
                <ul>
                    <li><a href="sign-up.html">Logout</a></li>
                    <li><a href="dean_account.html" id="account">Profile</a></li>
                </ul>
            </div>
        </div>
    </div>

    <main id="home-section">
        <section class="welcome-section">
            <div class="welcome-message">
                <h2>Welcome Back Kent Dela Pena</h2>
                <p>Streamlining document management and access for all Bicol University personnel.</p>
            </div>
        </section>

        <section class="shortcuts">
            <div class="container square" id="documents-shortcut">
                <img src="images/document-logo.png" alt="Documents Logo">
                <p>See Documents Here</p>
            </div>
            <div class="container square" id="upload-shortcut">
                <img src="images/upload-logo.png" alt="Upload Logo">
                <p>Upload Documents Here</p>
            </div>
            <div class="container rectangle" id="notifications">
                <h4>Notifications</h4>
                <div class="notification-content">
                    <div class="notification-list">
                        <div class="notification-item">
                            <img src="images/boy-2.png" alt="Profile Icon" class="profile-icon-notif">
                            <div class="notification-content-item">
                                <span class="sender-name">DATOS</span>
                                <span class="document-title">New Memorandum Available</span>
                            </div>
                            <i class="bi bi-envelope-fill mail-icon"></i>
                        </div>
                        <div class="notification-item">
                            <img src="images/girl-1.png" alt="Profile Icon" class="profile-icon-notif">
                            <div class="notification-content-item">
                                <span class="sender-name">DATOS</span>
                                <span class="document-title">Audited Disbursement Voucher</span>
                            </div>
                            <i class="bi bi-envelope-fill mail-icon"></i>
                        </div>
                        <div class="notification-item">
                            <img src="images/boy-2.png" alt="Profile Icon" class="profile-icon-notif">
                            <div class="notification-content-item">
                                <span class="sender-name">DATOS</span>
                                <span class="document-title">Claim Monitoring Sheet</span>
                            </div>
                            <i class="bi bi-envelope-fill mail-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="title">
            <div class="title-content">
                <h3>Announcements</h3>
                <div class="date-time">
                    <i class="bi bi-calendar2-week-fill"></i>
                    <p id="current-date-time"></p>
                </div>
            </div>
        </section>

        <section class="dashboard-overview">
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                    </div>                        
                    <div class="content">
                        <div class="row">
                            <div class="column left">
                                <h3>Office Memorandum No. 84</h3>
                                <p>In observance of the Holy Week...</p>
                            </div>
                            <div class="column right">
                                <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical" style="cursor: pointer;"></i></a>
                                <div class="dropdown-more">
                                    <a href="dean_view.html">View</a>
                                    <a href="#">Download</a>
                                    <a href="dean_edit.html">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="upload-date">
                            <p>Date Uploaded: April 2, 2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                    </div>                        
                    <div class="content">
                        <div class="row">
                            <div class="column left">
                                <h3>Office Memorandum No. 84</h3>
                                <p>In observance of the Holy Week...</p>
                            </div>
                            <div class="column right">
                                <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical" style="cursor: pointer;"></i></a>
                                <div class="dropdown-more">
                                    <a href="dean_view.html">View</a>
                                    <a href="#">Download</a>
                                    <a href="dean_edit.html">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="upload-date">
                            <p>Date Uploaded: April 2, 2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                    </div>                        
                    <div class="content">
                        <div class="row">
                            <div class="column left">
                                <h3>Office Memorandum No. 84</h3>
                                <p>In observance of the Holy Week...</p>
                            </div>
                            <div class="column right">
                                <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical" style="cursor: pointer;"></i></a>
                                <div class="dropdown-more">
                                    <a href="dean_view.html">View</a>
                                    <a href="#">Download</a>
                                    <a href="dean_edit.html">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="upload-date">
                            <p>Date Uploaded: April 2, 2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                    </div>                        
                    <div class="content">
                        <div class="row">
                            <div class="column left">
                                <h3>Office Memorandum No. 84</h3>
                                <p>In observance of the Holy Week...</p>
                            </div>
                            <div class="column right">
                                <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical" style="cursor: pointer;"></i></a>
                                <div class="dropdown-more">
                                    <a href="view-document.html">View</a>
                                    <a href="#">Download</a>
                                    <a href="edit-document.html">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="upload-date">
                            <p>Date Uploaded: April 2, 2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repeat the document block for more entries -->
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; DATOS 2024 Bicol University. All Rights Reserved.</p>
            <p>Contact us: <a href="mailto:datos.bu@gmail.com">datos.bu@gmail.com</a></p>
        </div>
    </footer>

    <script src="js/dean_page.js"></script>
    <script src="js/dean_home.js"></script>
</body>
</html>