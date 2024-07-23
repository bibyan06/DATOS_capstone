<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile Account</title>
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
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
                    <a href="{{ route('profile') }}"><i class="bi bi-person-circle" id="account-icon"> </i>Account</a>
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
                <li><a href="{{ route('home.admin') }}"><i class="bi bi-house-fill" id="home-icon"></i> Home</a></li>
                <li><a href="{{ route('admin.admin_dashboard') }}"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a></li>
                <li>
                    <a href="#" class="dropdown-toggle"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i> Document Reports <i class="bi bi-caret-right-fill" id="dropdown-icon"></i></a>
                    <div class="dropdown">
                        <a href="memorandum.html"><i class="bi bi-card-heading" id="memo-icon"></i> Memorandum</a>
                        <a href="audited_disbursement_voucher.html"><i class="bi bi-credit-card-2-front-fill"></i> Audited Disbursement Voucher</a>
                        <a href="claim_monitoring_sheet.html"><i class="bi bi-receipt-cutoff"></i> Claim Monitoring Sheet</a>
                        <a href="monthly_report_service_of_personnel.html"><i class="bi bi-calendar-event-fill"></i> Monthly Report Service of Personnel</a>
                    </div>
                    <a href="{{ route('admin.admin_upload_document') }}"><i class="bi bi-upload"></i> Upload Document</a>
                </li>
            </ul>
            <div class="settings">
                <ul>
                    <li><a href="{{ route('profile') }}"><i class="bi bi-person-circle"></i> Account</a></li>
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left" id="logout-icon"></i> Logout
                    </a></li>
                </ul>
            </div>
        </div>

        <main id="account-content">
            <div class="card">
                <div class="card-content">
                    <div class="account-container">
                        <img src="https://via.placeholder.com/100" alt="Profile Picture">
                        <div class="account-cont">
                            <div class="name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                            <div class="role">{{ Auth::user()->user_type }}</div>
                        </div>
                    </div>
                    <div class="info">
                        <div class="label">
                            <h6>Employee ID:</h6>
                            <h6>Name:</h6>
                            <h6>Email:</h6>
                            <h6>Phone Number:</h6>
                            <h6>Age:</h6>
                            <h6>Gender:</h6>
                            <h6>Home Address:</h6>
                        </div>
                        <div class="info-text">
                            <h6 id="employee-id">{{ Auth::user()->employee_id }}</h6>
                            <h6 id="name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
                            <h6 id="email">{{ Auth::user()->email }}</h6>
                            <h6 id="phone">{{ Auth::user()->phone_number }}</h6>
                            <h6 id="age">{{ Auth::user()->age }}</h6>
                            <h6 id="gender">{{ Auth::user()->gender }}</h6>
                            <h6 id="address">{{ Auth::user()->home_address }}</h6>
                        </div>
                        <div class="info-input" style="display: none;">
                            <input type="text" id="employee-id-input" value="{{ Auth::user()->employee_id }}">
                            <input type="text" id="name-input" value="{{ Auth::user()->name }}">
                            <input type="email" id="email-input" value="{{ Auth::user()->email }}">
                            <input type="text" id="phone-input" value="{{ Auth::user()->phone_number }}">
                            <input type="number" id="age-input" value="{{ Auth::user()->age }}">
                            <input type="text" id="gender-input" value="{{ Auth::user()->gender }}">
                            <input type="text" id="address-input" value="{{ Auth::user()->home_address }}">
                        </div>
                    </div>                                      
                    <button class="edit-btn">EDIT</button>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/os_landing_page.js') }}"></script>
</body>
</html>
