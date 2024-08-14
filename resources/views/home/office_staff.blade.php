<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Staff Home</title>
    <link rel="stylesheet" href="{{ asset('css/os/staff_page.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/os/staff_home.css') }}">
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

    <div class="extra-sidebar" id="home">
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
                <li><a href="staff_page.html" id="home">Home</a></li>

                <li><a href="staff_dashboard.html">Digitized Report</a></li>
                <li>
                    <a href="#" class="dropdown-toggle">Digitized Documents <i class="bi bi-chevron-right"></i></a>
                    <ul class="more-dropdown-menu">
                        <li><a href="{{ route ('office_staff.documents.memorandum') }}"><i class="bi bi-card-heading" id="memo-icon"></i> Memorandum</a></li>
                        <li><a href="staff_admin_orders.html">Administrative Order</a></li>
                        <li><a href="staff_mrsp.html"><i class="bi bi-calendar-event-fill"></i> Monthly Report Service Personnel</a></li>
                        <li><a href="staff_cms.html"><i class="bi bi-receipt-cutoff"></i> Claim Monitoring Sheet</a></li>
                        <li><a href="staff_audit.html"><i class="bi bi-credit-card-2-front-fill"></i> Audited Documents</a></li>
                    </ul>
                </li>
            </ul>
            
            <ul>
                <li><a href="{{ route ('office_staff.os_notification') }}">Notifications</a></li>
                <li><a href="{{ route ('office_staff.os_upload_document') }}">Upload</a></li>
                <div class="search-container">
                    <input type="text" id="sidebar-search" placeholder="Search">
                    <i class="bi bi-search"></i>
                </div>
            </ul>
            
            <div class="profile-content">
                <ul>
                    <li><a href=" {{ route('register') }}"><i class="bi bi-door-open-fill"></i> Logout</a></li>
                    <li><a href="{{ route ('office_staff.os_account') }}">Profile</a></li>
                </ul>
        </div>

        </div>
    </div>


    <main id="home-section">
        <section class="welcome-section">
            <div class="welcome-message">
                <h2>Welcome back, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h2>
                <p>Streamlining document management and access for all Bicol University personnel.</p>
            </div>
        </section>

        <section class="shortcuts">
            <div class="container square" id="documents">
                <img src="{{ asset ('images/document-logo.png') }}" alt="Documents Logo">
                <p>See Documents Here</p>
            </div>
            <div class="container square" id="upload">
                <img src="{{ asset ('images/upload-logo.png') }}" alt="Upload Logo">
                <p>Upload Documents Here</p>
            </div>
            <div class="container rectangle" id="notifications">
                <h4>Notifications</h4>
                <div class="notification-content">
                    <div class="notification-list">
                        <div class="notification-item">
                            <img src="{{ asset ('images/CS_LOGO.png') }}" alt="Profile Icon" class="profile-icon">
                            <div class="notification-content-item">
                                <span class="sender-name">DATOS</span>
                                <span class="document-title">New Memorandum Available</span>
                            </div>
                            <i class="bi bi-envelope-fill mail-icon"></i>
                        </div>
                        <div class="notification-item">
                            <img src="{{ asset ('images/Bicol_University.png') }}" alt="Profile Icon" class="profile-icon">
                            <div class="notification-content-item">
                                <span class="sender-name">DATOS</span>
                                <span class="document-title">Audited Disbursement Voucher</span>
                            </div>
                            <i class="bi bi-envelope-fill mail-icon"></i>
                        </div>
                        <div class="notification-item">
                            <img src=" {{ asset ('images/upload-logo.png') }}" alt="Profile Icon" class="profile-icon">
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
                <h3>Recent Digitized Documents</h3>
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
                        <iframe src="{{ Storage::url('CERTIFICATION.pdf') }}" width="100%" height="200px"></iframe>
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
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="{{ Storage::url('CERTIFICATION.pdf') }}" width="100%" height="200px"></iframe>
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
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="{{ Storage::url('CERTIFICATION.pdf') }}" width="100%" height="200px"></iframe>
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
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="{{ Storage::url('CERTIFICATION.pdf') }}" width="100%" height="200px"></iframe>
                    </div>                        
                    <div class="content">
                        <div class="row">
                            <div class="column left">
                                <h3>Office Memorandum No. 84</h3>
                                <p>In observance of the Holy Week...</p>
                            </div>
                            <div class="column right">
                                <div class="column right">
                                    <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical" style="cursor: pointer;"></i></a>
                                    <div class="dropdown-more">
                                        <a href="view-document.html">View</a>
                                        <a href="#">Download</a>
                                        <a href="edit-document.html">Edit</a>
                                    </div>
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
                        <iframe src="{{ Storage::url('CERTIFICATION.pdf') }}" width="100%" height="200px"></iframe>
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
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="{{ Storage::url('CERTIFICATION.pdf') }}" width="100%" height="200px"></iframe>
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
            <!--
            <div class="dashboard-card">
                <h3>Recent Documents</h3>
                <ul>
                    <li><a href="staff_memorandum.html">Memorandum</a></li>
                    <li><a href="audited_disbursement_voucher.html">Audited Disbursement Voucher</a></li>
                    <li><a href="claim_monitoring_sheet.html">Claim Monitoring Sheet</a></li>
                    <li><a href="monthly_report_service_of_personnel.html">Monthly Report Service of Personnel</a></li>
                </ul>
            </div>
            <div class="dashboard-card">
                <h3>Upcoming Deadlines</h3>
                <ul>
                    <li>Memorandum Submission - Aug 10</li>
                    <li>Disbursement Voucher Approval - Aug 15</li>
                    <li>Monthly Report Submission - Aug 20</li>
                </ul>
            </div>-->
        </section>

        
    </main>
</div>

<footer>
    <div class="footer-content">
        <p>&copy; DATOS 2024 Bicol University. All Rights Reserved.</p>
        <p>Contact us: <a href="mailto:datos.bu@gmail.com">datos.bu@gmail.com</a></p>
    </div>
</footer>

    <script src="{{ asset ('js/os/staff_page.js') }}"></script>
    <script src="{{ asset ('js/os/staff_home.js') }}"></script>

</body>
</html>