<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Staff Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/os/staff_page.css')}}">
    <link rel="stylesheet" href="{{ asset('css/os/staff_dashboard.css')}}">
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

    <main id="dashboard-content">
        <div class="reports-container">
            <div class="report">
                <h1>{{ $claimMonitoringSheetCount }}</h1>
                <h4>Claim Monitoring Sheet</h4>
            </div>
            <div class="report">
                <h1>{{ $memorandumCount }}</h1>
                <h4>Memorandum</h4>
            </div>
            <div class="report">
                <h1>{{ $mrspCount }}</h1>
                <h4>MRSP</h4>
            </div>
            <div class="report">
                <h1>{{ $auditedDVCount }}</h1>
                <h4>Audited Disbursement Voucher</h4>
            </div>
        </div>
    
        <div id="dashboard-section">
            <div class="dashboard-container">
                <div class="dashboard-title">
                    <h2>Document Report</h2>
                    <div class="search">
                        <select id="category-filter">
                            <option value="" disabled selected>Select Document</option>
                            <option value="" selected>All</option>
                            <option value="Memorandum">Memorandum</option>
                            <option value="Audited Disbursement Voucher">Audited Disbursement Voucher</option>
                            <option value="Monthly Report Service of Personnel">Monthly Report Service of Personnel</option>
                            <option value="Claim Monitoring Sheet">Claim Monitoring Sheet</option>
                        </select>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Document Number</th>
                            <th>Document Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Remark</th>
                            <th>Date Uploaded</th>
                            <th>Uploaded by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="documents-table">
                        @foreach($documents as $document)
                            <tr data-category="{{ $document->category_name }}">
                                <td>{{ $document->document_number }}</td>
                                <td>{{ $document->document_name }}</td>
                                <td>{{ $document->description }}</td>
                                <td>{{ $document->category_name }}</td>
                                <td>
                                    <x-status-label :status="$document->document_status" />
                                </td>
                                <td>{{ $document->remark}}</td>
                                <td>{{ $document->upload_date }}</td>
                                <td>{{ $document->uploaded_by }}</td>
                                <td>
                                <a href="{{ route('office_staff.documents.os_view_docs', $document->document_id) }}" title="View Document">
                                    <i class="bi bi-eye"></i>
                                </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($documents->isEmpty())
                    <p>No documents available.</p>
                @endif
            </div>
        </div>
    </main>


<footer>
    <div class="footer-content">
        <p>&copy; DATOS 2024 Bicol University. All Rights Reserved.</p>
        <!-- <p>Contact us: <a href="mailto:datos.bu@gmail.com">datos.bu@gmail.com</a></p> -->
    </div>
</footer>

    <script src="{{ asset ('js/os/staff_page.js') }}"></script>
    <script src="{{ asset ('js/os/staff_dashboard.js') }}"></script>

</body>
</html>

