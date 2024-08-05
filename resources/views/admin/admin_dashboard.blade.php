<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{ asset('css/mainhead.css')}}">
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

    <main id="dashboard-content">
        <div class="reports-container">
            <div class="report">
                <h1>10</h1>
                <h4>Total Document</h4>
            </div>
            <div class="report">
                <h1>10</h1>
                <h4>Total Employee</h4>
            </div>
        </div>

        <div id="dashboard-section">
            <div class="dashboard-container">
                <div class="dashboard-title">
                    <h2>Digitized Documents</h2>
                    <div class="search">
                        <select>
                            <option value="" disabled selected>Select Document</option>
                            <option value="doc1">Memorandum</option>
                            <option value="doc2">Audited Disbursement Voucher</option>
                            <option value="doc3">Monthly Report Service of Personnel</option>
                            <option value="doc4">Claim Monitoring Sheet</option>
                        </select>
                    </div>
                </div>
                <div class="documents">
                    <div class="document">
                        <div class="file-container"></div>
                        <div class="document-description">
                            <h3>Office Memorandum No. 84</h3>
                            <p>Date Updated: April 2, 2024</p>
                            <p>Details of the memorandum go here.</p>
                        </div>
                    </div>
                    <div class="document">
                        <div class="file-container"></div>
                        <div class="document-description">
                            <h3>Office Memorandum No. 84</h3>
                            <p>Date Updated: April 2, 2024</p>
                            <p>Details of the memorandum go here.</p>
                        </div>
                    </div>
                    <div class="document">
                        <div class="file-container"></div>
                        <div class="document-description">
                            <h3>Office Memorandum No. 84</h3>
                            <p>Date Updated: April 2, 2024</p>
                            <p>Details of the memorandum go here.</p>
                        </div>
                    </div>
                    <!-- Add more documents as needed -->
                </div>
            </div>
        </div>
    </main>
</div>

<footer>
    <div class="footer-content">
        <p>&copy; DATOS 2024 Bicol University. All Rights Reserved.</p>
        <p>Contact us: <a href="mailto:datos.bu@gmail.com">datos.bu@gmail.com</a></p>
    </div>
</footer>

<script src="{{ asset('js/mainhead.js') }}"></script>

</body>
</html>
