<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Staff Upload Document</title>
    <link rel="stylesheet" href="{{ asset('css/upload_document.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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
                <a href="{{ route('office_staff.os_account') }}"><i class="bi bi-person-circle" id="account-icon"> </i>Account</a>
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
            <img src="{{ asset('images/datos.png') }}" alt="Nav Logo" class="nav-logo">
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search Document">
        </div>
    </div>
</nav>

<div id="main-content">
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="{{ route('home.office_staff') }}"><i class="bi bi-house-fill" id="home-icon"></i> Home</a></li>
            <a href="{{ route('office_staff.os_dashboard') }}"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
            <li>
                <a href="#" class="dropdown-toggle"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i> Document Reports <i class="bi bi-caret-right-fill" id="dropdown-icon"></i></a>
                <div class="dropdown">
                    <a href="memorandum.html"><i class="bi bi-card-heading" id="memo-icon"></i> Memorandum</a>
                    <a href="audited_disbursement_voucher.html"><i class="bi bi-credit-card-2-front-fill"></i> Audited Disbursement Voucher</a>
                    <a href="claim_monitoring_sheet.html"><i class="bi bi-receipt-cutoff"></i> Claim Monitoring Sheet</a>
                    <a href="monthly_report_service_of_personnel.html"><i class="bi bi-calendar-event-fill"></i> Monthly Report Service of Personnel</a>
                </div>
                <a href="{{ route('office_staff.os_upload_document')}}"><i class="bi bi-upload"></i> Upload Document</a>
            </li>
        </ul>
        <div class="settings">
            <ul>
                <li><a href="{{ route('office_staff.os_account') }}"><i class="bi bi-person-circle" id="account-icon"></i> Account</a></li>
                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left" id="logout-icon"></i> Logout
                </a></li>
            </ul>
        </div>
    </div>

    <main id="uploading-content">
        <div class="form-container">
            <form action="">
                <div class="document-form">
                    <div class="upload-section">
                        <label for="file-upload" class="file-upload-label">
                            <i class="bi bi-filetype-pdf" id="file-icon"></i>
                            <button type="button" class="upload-button">Upload File</button>
                            <input type="file" id="file-upload" accept=".pdf" hidden>
                            <p>Maximum file size: # MB</p>
                        </label>
                    </div>
                    <div class="document-form-category">
                        <div class="form-group-category">
                            <select id="category" name="category">
                                <option value="">Category</option>
                                <option value="memorandum">Memorandum</option>
                                <option value="audited-disbursement-voucher">Audited Disbursement Voucher</option>
                                <option value="claim-monitoring-sheet">Claim Monitoring Sheet</option>
                                <option value="monthly-report-service-of-personnel">Monthly Report Service of Personnel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="document-name">Document Name</label>
                        <input type="text" id="document-name" name="document-name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="document-tags">Document Tags</label>
                        <input type="text" id="document-tags" name="document-tags">
                    </div>
                    <button type="submit" class="save-button">Save Changes</button>
                </div>
            </form>
        </div>
    </main>
</div>

<script src="{{ asset('js/upload_document.js') }}"></script>
</body>
</html>
