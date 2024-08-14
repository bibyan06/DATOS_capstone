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

    <nav class="navbar">
        <div class="navbar-content">
            <div class="logo-container">
                <img src="images/sidebar-logo.png" alt="Bicol University Logo" class="nav-logo">
            </div>
            <ul class="nav-icons">
                <li><div class="icon-container" data-target="#home"><i class="bi bi-house-fill" id="home-icon"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-file-earmark-fill"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-bell-fill"></i></div></li>
                <li><div class="icon-container" data-target="#home"><i class="bi bi-cloud-arrow-up-fill"></i></div></li>
            </ul>
            <div class="profile-settings">
                <div class="profile-settings">
                    <div class="icon-container" data-target="#home"><i class="bi bi-door-open-fill"></i></div>
                    <div class="icon-container" data-target="#home"><img src="images/boy-1.png" alt="Profile Icon" class="profile-pic"></div>
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
                    <a href="#" class="more-dropdown-toggle">Digitized Documents <i class="bi bi-chevron-right"></i></a>
                    <ul class="more-dropdown-menu">
                        <li><a href="staff_memorandum.html"><i class="bi bi-card-heading" id="memo-icon"></i> Memorandum</a></li>
                        <li><a href="staff_admin_orders.html">Administrative Order</a></li>
                        <li><a href="staff_mrsp.html"><i class="bi bi-calendar-event-fill"></i> Monthly Report Service Personnel</a></li>
                        <li><a href="staff_cms.html"><i class="bi bi-receipt-cutoff"></i> Claim Monitoring Sheet</a></li>
                        <li><a href="staff_audit.html"><i class="bi bi-credit-card-2-front-fill"></i> Audited Documents</a></li>
                    </ul>
                </li>
            </ul>
            
            <ul>
                <li><a href="staff_notification.html">Notifications</a></li>
                <li><a href="staff_upload.html">Upload</a></li>
            </ul>
            <div class="profile-content">
            <ul>
                <li><a href="sign-up.html"><i class="bi bi-door-open-fill"></i> Logout</a></li>
                <li><a href="staff_account.html">Profile</a></li>
            </ul>
        </div>

        </div>
    </div>

    <main id="dashboard-content">
        <div class="reports-container">
            <div class="report">
                <h1>10</h1>
                <h4>Claim Monitoring Sheet</h4>
            </div>
            <div class="report">
                <h1>23</h1>
                <h4>Memorandom</h4>
            </div>
            <div class="report">
                <h1>18</h1>
                <h4>MRSP</h4>
            </div>
            <div class="report">
                <h1>27</h1>
                <h4>Administrative Order</h4>
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

    <script src="{{ asset('js/os/staff_page.js') }}"></script>
    <script src="{{ asset ('js/os/staff_dashboard.js') }}"></script>

</body>
</html>

