<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile Account</title>
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_page.css') }}">
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

    <main id="dashboard-content">
        <section class="title">
            <div class="title-content">
                <h3>My Profile</h3>
            </div>
        </section>

        @auth
        <div class="account-profile">
            <div class="profile-header">
                <img src="{{ asset('images/cover-photo.png') }}" alt="header_image" class="header-image">
            </div>
            <div class="profile-container">
                <div class="profile-picture">
                    <img src="{{ asset('images/boy-1.png') }}" alt="Profile Picture">
                </div>
                <div class="profile-details">
                    <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                    <div class="profile-info">
                        <span class="employee-id">{{ Auth::user()->employee_id }}</span>
                        <span class="position">{{ Auth::user()->user_type }}</span>
                    </div>
                </div>
                <div class="edit-button">
                    <button id="openModalBtn">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="info-details">
            <h2>Personal Information</h2>
            <div class="info-row">
                <span class="label">Last Name</span>
                <span class="value" data-field="lastname">{{ Auth::user()->last_name }}</span>
            </div>
            <div class="info-row">
                <span class="label">First Name:</span>
                <span class="value" data-field="firstname">{{ Auth::user()->first_name }}</span>
            </div>
            <div class="info-row">
                <span class="label">Middle Name</span>
                <span class="value" data-field="middlename">{{ Auth::user()->middle_name }}</span>
            </div>
            <div class="info-row">
                <span class="label">Position:</span>
                <span class="value" data-field="office">{{ Auth::user()->position }}</span>
            </div>
            <div class="info-row">
                <div class="label">Age:</div>
                <div class="value" data-field="age">{{ Auth::user()->age }}</div>
            </div>
            <div class="info-row">
                <span class="label">Sex:</span>
                <span class="value" data-field="sex">{{ Auth::user()->gender }}</span>
            </div>
            <div class="info-row">
                <span class="label">Email:</span>
                <span class="value" data-field="email">{{ Auth::user()->email }}</span>
            </div>
            <div class="info-row">
                <span class="label">Phone Number:</span>
                <span class="value" data-field="phone">{{ Auth::user()->phone_number }}</span>
            </div>
            <div class="info-row">
                <div class="label">Address:</div>
                <div class="value" data-field="address">{{ Auth::user()->home_address }}</div>
            </div>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Update Profile</h2>
                <form id="updateProfileForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" name="lastname" value="{{ Auth::user()->last_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname" name="firstname" value="{{ Auth::user()->first_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <input type="text" id="middlename" name="middlename" value="{{ Auth::user()->middle_name }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" id="position" name="position" value="{{ Auth::user()->position }}" required>
                        </div>
                    </div>
                        
                    <div class="form-row">
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" id="age" name="age" data-field="age" min="18" max="120"  value="{{ Auth::user()->age }}" required>
                            <div class="invalid-feedback">Age cannot be set in the future.</div>
                            </div>
                        <div class="form-group">
                            <label for="gender">Sex</label>
                            <select id="gender" name="gender" required>
                                <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                        
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone_number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" value="{{ Auth::user()->home_address }}" required>
                        </div>
                    </div>
                        <!-- <button type="submit">Save Changes</button> -->
                    <div class="form-buttons">
                        <button type="button" id="closeModalBtn">Cancel</button>
                        <button type="button" id="saveChangesBtn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        @endauth

         <!-- Warning Modal -->
         <div id="warningModal" class="modal">
            <div class="modal-content">
                <span id="warningCloseBtn" class="close">&times;</span>
                <h2>Warnings</h2>
                <div id="warningContent"></div>
                <button id="warningCloseBtn">Close</button>
            </div>
        </div>
    </main>
  
    <footer>
        <div class="footer-content">
            <p>© 2023 Bicol University. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/admin_account.js') }}"></script>
    <script src="{{ asset('js/admin_page.js') }}"></script>
</body>
</html>