<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Document</title>
    <link rel="stylesheet" href="{{ asset ('css/request.css') }}">
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
                <img src="{{ asset ('images/user-circle-solid-24.png') }}" alt="Profile Icon" id="profile-icon">
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
                    <div class="icon-container" data-target="#sidebar"><img src="{{ asset ('images/boy-1.png') }}" alt="Profile Icon" class="profile-pic"></div>
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
                <li><a href="admin_page.html" id="home">Home</a></li>

                <li><a href="admin_dashboard.html" id="report">Digitized Report</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" id="digitized">Digitized Documents <i class="bi bi-chevron-right"></i></a>
                    <ul class="more-dropdown-menu">
                        <li><a href="admin_memorandum.html" id="memorandum"> Memorandum</a></li>
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
                        <li><a href="admin_staffs.html" id="memorandum"> Office Staff</a></li>
                        <li><a href="admin_deans.html" id="admin_order">College Dean</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="pending-dropdown-toggle" id="digitized">Pendings <i class="bi bi-chevron-right"></i></a>
                    <ul class="pending-dropdown">
                        <li><a href="admin_approved.html" id="approval">Approval</a></li>
                        <li><a href="admin_request.html" id="request">Request</a></li>
                    </ul>
                </li>
                <li><a href="admin_notification.html" id="announcements-icon"> Notifications</a></li>
                <li><a href="admin_upload.html" id="upload">Upload</a></li>
                <li><a href="admin_all_documents.html" id="search">Search</a></li>
            </ul>
            
            <div class="profile-content">
                <ul>
                    <li><a href="sign-up.html"> Logout</a></li>
                    <li><a href="admin_account.html" id="account">Profile</a></li>
                </ul>
            </div>
        </div>
    </div>

    <main id="dashboard-content">
        <section class="title">
            <div class="title-content">
                <h3>Requested Documents</h3>
                <div class="date-time">
                    <i class="bi bi-calendar2-week-fill"></i>
                    <p id="current-date-time"></p>
                </div>
            </div>
        </section>

        <div id="dashboard-section">
            <div class="dashboard-container">
                <table>
                    <thead>
                        <tr>
                            <th>Document Subject</th>
                            <th>Purpose</th>
                            <th>Requested Date</th>
                            <th>Requested By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Official Memorandum No. 84</td>
                            <td>In commemoration of the founding anniversary of the company on Wednesday, April 1, 2024.</td>
                            <td>May 19, 2024</td>
                            <td>Marie Lee</td>
                            <td class="approved">Approved</td>
                            <td class="action-buttons">
                                <i class="bi bi-pencil-square" title="Send Document" onclick="showPopupForm()"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Official Memorandum No. 90</td>
                            <td>Lorem Ipsum</td>
                            <td>May 22, 2024</td>
                            <td>Jose Manalo</td>
                            <td class="pending">Pending</td>
                            <td class="action-buttons">
                                <i class="bi bi-pencil-square" title="Send Document" onclick="showPopupForm()"></i>
                            </td>
                        </tr>
                        <!-- Additional rows can be added here -->
                    </tbody>
                </table>
            </div>
            <div id="overlay" class="overlay" onclick="hidePopupForm()"></div>
            <div id="popup-form" class="popup-form">
                <h2>Send Document</h2>
                <form id="dean-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="sender-name">Sender Name</label>
                            <input type="text" id="sender-name" name="sender-name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="document-subject">Document Subject</label>
                            <input type="text" id="document-subject" name="document-subject">
                        </div>
                        <div class="form-group">
                            <label for="document-purpose">Document Purpose</label>
                            <input type="text" id="document-purpose" name="document-purpose">
                        </div>
                        <div class="form-group">
                            <label for="document-id">Document ID</label>
                            <input type="text" id="document-id" name="document-id">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="file-name">File</label>
                            <input type="text" id="file-name" name="file-name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="date">Sent Date</label>
                            <input type="text" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-buttons">
                        <button type="button" id="cancel-btn" onclick="hidePopupForm()">Cancel</button>
                        <button type="button" id="send-document-btn" onclick="sendDocument()">Send Document</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; DATOS 2024 Bicol University. All Rights Reserved.</p>
            <p>Contact us: <a href="mailto:datos.bu@gmail.com">datos.bu@gmail.com</a></p>
        </div>
    </footer>

    <script src="{{ asset ('js/request.js') }}"></script>
    <script src="{{ asset ('js/admin_page.js') }}"></script>

</body>
</html>