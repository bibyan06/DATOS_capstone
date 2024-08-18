<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directives</title>
    <link rel="stylesheet" href="{{asset ('css/memorandum.css')}}">
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
                <img src="{{ asset('images/user-circle-solid-24.png') }}" alt="Profile Icon" id="profile-icon">
                <div class="dropdown-menu" id="profile-dropdown">
                    <a href="{{ route('admin.admin_account') }}"><i class="bi bi-person-circle" id="account-icon"> </i>Account</a>
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
                                                <a href="admin_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="admin_edit.html">Edit</a>
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
                                                <a href="admin_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="admin_edit.html">Edit</a>
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
                                                <a href="admin_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="admin_edit.html">Edit</a>
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
                                                <a href="admin_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="admin_edit.html">Edit</a>
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
                                                <a href="admin_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="admin_edit.html">Edit</a>
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
                                                <a href="admin_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="admin_edit.html">Edit</a>
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
    <script src="{{ asset ('js/memorandum.js') }}"></script>
    <script src="{{ asset ('js/admin_page.js') }}"></script>
</body>

</html>