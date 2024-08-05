<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/mainhead.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <nav>
        <div class="nav-content">
            <div class="nav-left">
                <a href="#" class="menu-icon" id="menu-toggle"><i class="bi bi-list"></i></a>
                <img src="{{asset('images/datos.png')}}" alt="Nav Logo" class="nav-logo">
                <ul>
                    <li><a href= "{{ route('home.admin') }}" id="home-link">Home</a></li>
                    <li><a href= "{{ route('admin.admin_dashboard') }}">Dashboard</a></li>
                </ul>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search Document">
            </div>
        </div>
    </nav>

    <div id="main-content">
        <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="{{ route('home.admin') }}"><i class="bi bi-house-fill" id="home-icon"></i> Home</a></li>
            <li><a href="{{ route('admin.admin_dashboard') }}"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a></li>
            <li>
                <a href="#" class="dropdown-toggle"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i> Document Reports <i class="bi bi-caret-right-fill" id="dropdown-icon"></i></a>
                <div class="dropdown">
                    <a href="{{ route('admin.documents.memorandum') }}"><i class="bi bi-card-heading" id="memo-icon"></i> Memorandum</a>
                    <a href="audited_disbursement_voucher.html"><i class="bi bi-credit-card-2-front-fill"></i> Audited Disbursement Voucher</a>
                    <a href="claim_monitoring_sheet.html"><i class="bi bi-receipt-cutoff"></i> Claim Monitoring Sheet</a>
                    <a href="monthly_report_service_of_personnel.html"><i class="bi bi-calendar-event-fill"></i> Monthly Report Service of Personnel</a>
                </div>
                <a href="#" class="employee-dropdown-toggle"><i class="bi bi-people-fill"></i> Employee <i class="bi bi-caret-right-fill" id="employee-dropdown-icon"></i></a>
                <div class="employee-dropdown">
                    <a href="{{ route ('admin.office_staff') }}"><i class="bi bi-card-heading" id="memo-icon"></i> Office Staff</a>
                    <a href="{{ route ('admin.college_dean') }}"><i class="bi bi-credit-card-2-front-fill"></i> College Dean</a>
                </div>
                <a href="#" class="pending-dropdown-toggle"><i class="bi bi-hourglass-split"></i> Pendings <i class="bi bi-caret-right-fill" id="pending-dropdown-icon"></i></a>
                <div class="pending-dropdown">
                    <a href="{{ route ('admin.documents.approved_docs') }}"><i class="bi bi-card-heading" id="memo-icon"></i> Approved</a>
                    <a href="{{ route ('admin.documents.request_docs') }}"><i class="bi bi-credit-card-2-front-fill"></i> Request</a>
                </div>
            </li>
            <li>    
                <a href="{{ route ('admin.documents.sent_docs') }}"><i class="bi bi-send-plus-fill"></i> Notifications</a>
            </li>
            <li>
            <a href="{{ route('admin.admin_upload_document') }}"><i class="bi bi-upload"></i> Upload Document</a>
            </li>
        </ul>
            <div class="settings">
                <ul><li>
                    <a href="{{route('admin.admin_account')}}"><i class="bi bi-person-circle" id="account-icon"></i> Account</a>
                    <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-left" id="logout-icon"></i> Logout</a>
                </li></ul>
            </div>
        </div>

        <main id="home-section">
            <section class="welcome-section">
                <div class="welcome-message">
                    <h2>Welcome back, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h2>
                    <p>Streamlining document management and access for all Bicol University personnel.</p>
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
                                        <a href="{{ route ('admin.documents.view_docs') }}">View</a>
                                        <a href="#">Download</a>
                                        <a href="{{ route ('admin.documents.edit_docs') }}">Edit</a>
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
                                        <a href="{{ route ('admin.documents.view_docs') }}">View</a>
                                        <a href="#">Download</a>
                                        <a href="{{ route ('admin.documents.edit_docs') }}">Edit</a>
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
                                    <div class="column right">
                                        <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical" style="cursor: pointer;"></i></a>
                                        <div class="dropdown-more">
                                            <a href="{{ route ('admin.documents.view_docs') }}">View</a>
                                            <a href="#">Download</a>
                                            <a href="{{ route ('admin.documents.edit_docs') }}">Edit</a>
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
                                        <a href="{{ route ('admin.documents.view_docs') }}">View</a>
                                        <a href="#">Download</a>
                                        <a href="{{ route ('admin.documents.edit_docs') }}">Edit</a>
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
                                        <a href="{{ route ('admin.documents.view_docs') }}">View</a>
                                        <a href="#">Download</a>
                                        <a href="{{ route ('admin.documents.edit_docs') }}">Edit</a>
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
                        <li><a href="memorandum.html">Memorandum</a></li>
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
    
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/mainhead.js') }}"></script>

</body>
</html>