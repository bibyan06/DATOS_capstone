<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dean Home</title>
    <link rel="stylesheet" href="{{ asset('css/os_landing_page.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/main.css') }}">
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
                    <a href="{{ route('dean.dean_account') }}"><i class="bi bi-person-circle" id="account-icon"> </i>Account</a>
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
                    <li><a href="{{ route('home.dean') }}" id="home-link">Home</a></li>
                    <li><a href="{{ route('dean.dean_dashboard') }}">Dashboard</a></li>
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
                    <a href="{{ route('home.dean') }}"><i class="bi bi-house-fill" id="home-icon"></i> Home</a>
                </li>
                <li>    
                        <a href="{{ route('dean.dean_dashboard') }}"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i>   Dashboard</a>
                </li>
            </ul>
            <div class="settings">
                <ul><li>
                    <a href="{{route('dean.dean_account')}}"><i class="bi bi-person-circle" id="account-icon"></i> Account</a>
                    <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-left" id="logout-icon"></i> Logout</a>
                </li></ul>
            </div>
        </div>

        <main id="home-section">
            <section class="welcome-section">
                <div class="welcome-message">
                    <h2>Welcome back, Dean!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="current-time">
                    <h3>10:30 AM</h3>
                    <p>Monday, 13 April</p>
                </div>
            </section>

            <section class="documents-section">
                <h2>Recent Documents</h2>
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
                                    <a href="#"><i class="bi bi-three-dots-vertical" id="dropdownMenuButton" style="cursor: pointer;"></i></a>
                                    <div class="dropdown-more" id="more-option">
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
            </section>
        </main>

        <main id="dashboard-section">
            <!-- Add your dashboard content here -->
        </main>
    </div>

    <script src="{{ asset('js/os_landing_page.js') }}"></script>
</body>
</html>