<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicol University Home</title>
    <link rel="stylesheet" href="{{ asset('css/view-document.css')}}">
    <link rel="stylesheet" href="{{ asset ('css/main.css')}}">
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
                <img src="{{ asset('images/datos.png') }}" alt="Nav Logo" class="nav-logo">
                <ul>
                    <li><a href="{{ route('home.admin') }}" id="home-link">Home</a></li>
                    <li><a href="{{ route('admin.admin_dashboard') }}">Dashboard</a></li>
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
                <li>
                    <a href="{{asset('home.admin')}}"><i class="bi bi-house-fill" id="home-icon"></i> Home</a>
                </li>
                <li>    
                        <a href="{{asset('admin.admin_dashboard')}}"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i>   Dashboard</a>
                </li>
            </ul>
            <div class="settings">
            <ul>
                <li><a href="{{ route('admin.admin_account') }}"><i class="bi bi-person-circle" id="account-icon"></i> Account</a></li>
                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left" id="logout-icon"></i> Logout
                </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>


        <main id="view-section">
            <div class="documents-content">
            <div class="doc-container">
                <div class="view-documents">
                    <div class="doc-description">
                        <a href="office_staff_page.html" class="back-icon">
                            <i class="bi bi-arrow-return-left"></i>
                            <span class="tooltip">Go back</span>
                        </a>                        
                        <h5 class="file-title">Title:</h5>
                        <h1 class="document_name">Administrative Order No. 331 Series of 2023</h1>
                        <h3 class="issued_date">June 2, 2023</h3>
                        <div class="description">
                            <h5>Description:</h5>
                            <p>In view of the University's continued quest for quality management system and to ensure the highest level of efficiency and effectiveness in the performance of office transactions at the office of the University President, you are hereby designated as Senior Staff at the Presidential Management Staff Office and University Documents and Records Controller on concurrent capacity effective 02 May 2023 until revoked by a subsequent issuance from this Office in accordance with the existing Civil Service rules and regulations.</p>
                        </div>
                    </div>
                    <div class="viewing-btn">
                        <button class="edit-btn" onclick="location.href='edit-document.html'">Edit</button>
                        <button class="download-btn" onclick="downloadDocument()">Download</button>
                    </div>
                    <div class="doc-file">
                    <iframe src="{{ Storage::url('CERTIFICATION.pdf') }}" width="100%" height="200px"></iframe>
                    </div>
                </div>
            </div>
            </div>
        </main>             
        
    </div>

    <script src="{{asset('js/view-document.js')}}"></script>
</body>
</html>