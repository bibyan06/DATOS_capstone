<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicol University Home</title>
    <link rel="stylesheet" href="css/dean_account.css">
    <link rel="stylesheet" href="css/dean_page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
        <div class="header-content">
            <div class="left-header">
                <img src="images/Bicol_University.png" alt="Bicol University Logo" class="logo">
                <h1>BICOL <span>UNIVERSITY</span></h1>
            </div>
            <div class="search-container">
                <input type="text" id="sidebar-search" placeholder="Search">
                <i class="bi bi-search"></i>
            </div>
            <div class="profile-icon">
                <img src="images/user-circle-solid-24.png" alt="Profile Icon" id="profile-icon">
            </div>
        </div>
    </header>

    
    <nav class="navbar">
        <div class="navbar-content">
            <div class="logo-container">
                <img src="images/sidebar-logo.png" alt="Bicol University Logo" class="nav-logo">
            </div>
            <ul class="nav-icons">
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-house-fill" id="home-icon"></i></div></li>
                
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-file-earmark-fill" id="digitized-icon"></i></div></li>
                
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-hourglass-split" id="pendings"></i></div></li>
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-bell-fill" id="notification"></i></div></li>
                
                <li><div class="icon-container" data-target="#sidebar"><i class="bi bi-search" id="search-icon"></i></div></li>
            </ul>
            <div class="profile-settings">
                <div class="profile-settings">
                    <div class="icon-container" data-target="#sidebar"><i class="bi bi-door-open-fill"></i></div>
                    <div class="icon-container" data-target="#sidebar"><img src="images/boy-1.png" alt="Profile Icon" class="profile-pic"></div>
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
                <li><a href="dean_page.html" id="home">Home</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" id="digitized">Digitized Documents <i class="bi bi-chevron-right"></i></a>
                    <ul class="more-dropdown-menu">
                        <li><a href="dean_memorandum.html" id="memorandum"> Memorandum</a></li>
                        <li><a href="dean_dean_orders.html" id="dean_order">Administrative Order</a></li>
                        <li><a href="dean_mrsp.html"idmrsp> Monthly Report Service Personnel</a></li>
                        <li><a href="dean_cms.html" id="cms"> Claim Monitoring Sheet</a></li>
                        <li><a href="dean_audit.html" id="audit"> Audited Documents</a></li>
                    </ul>
                </li>
            </ul>
            
            <ul>
                <li><a href="dean_request.html" id="request">Request a Document</a></li>
                <li><a href="dean_notification.html" id="announcements-icon"> Notifications</a></li>
                
                <li><a href="dean_all_documents.html" id="search">Search</a></li>
            </ul>
    
            <div class="profile-content">
                <ul>
                    <li><a href="sign-up.html"> Logout</a></li>
                    <li><a href="dean_account.html" id="account">Profile</a></li>
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

            <div class="account-profile">
                <div class="profile-header">
                    <img src="images/cover-photo.png" alt="header_image" class="header-image">
                </div>
                <div class="profile-container">
                    <div class="profile-picture">
                        <img src="images/boy-1.png" alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <h2>Kent Ar-Jay B. Dela Peña</h2>
                        <div class="profile-info">
                            <span class="employee-id">2021-4348-78983</span>
                            <span class="position">Administrative Officer</span>
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
                    <span class="value" data-field="lastname">Dela Pena</span>
                </div>
                <div class="info-row">
                    <span class="label">First Name:</span>
                    <span class="value" data-field="firstname">Kent</span>
                </div>
                <div class="info-row">
                    <span class="label">Middle Name</span>
                    <span class="value" data-field="middlename">Bandojo</span>
                </div>
                <div class="info-row">
                    <span class="label">Office:</span>
                    <span class="value" data-field="office">Administrative Services Division Office</span>
                </div>
                <div class="info-row">
                    <div class="label">Age:</div>
                    <div class="value" data-field="age">25</div>
                </div>
                <div class="info-row">
                    <span class="label">Sex:</span>
                    <span class="value" data-field="sex">Male</span>
                </div>
                <div class="info-row">
                    <span class="label">Email:</span>
                    <span class="value" data-field="email">kentarjaybandojo.delapena@bicol-u.edu.ph</span>
                </div>
                <div class="info-row">
                    <span class="label">Phone Number:</span>
                    <span class="value" data-field="phone">09816635890</span>
                </div>
                <div class="info-row">
                    <div class="label">Address:</div>
                    <div class="value" data-field="address">Purok-2, Santo Niño, Santo Domingo</div>
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
                                <input type="text" id="lastname" name="lastname" value="Dela Pena" data-field="lastname" required>


                            </div>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" id="firstname" name="firstname" value="Kent" data-field="firstname" required>
                            </div>
                            <div class="form-group">
                                <label for="middlename">Middle Name</label>
                                <input type="text" id="middlename" name="middlename" value="Bandojo" data-field="middlename" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="office">Office</label>
                                <input type="text" id="office" name="office" value="Administrative Services Division Office" data-field="office" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- Example Age Input Field -->
                            <div class="form-group">
                                <label for="age">Age:</label>
                                <input type="number" id="age" name="age" data-field="age" min="0" max="120" step="1" required>
                                <div class="invalid-feedback">Age cannot be set in the future.</div>
                            </div>

                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <input type="text" id="sex" name="sex" value="Male" data-field="sex" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="kentarjaybandojo.delapena@bicol-u.edu.ph" data-field="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" value="09816635890" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="street">Street:</label>
                                <input type="text" id="street" name="street" data-field="street" required>
                            </div>
                            <div class="form-group">
                                <label for="barangay">Barangay</label>
                                <input type="text" id="barangay" name="barangay" data-field="barangay" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" data-field="city" required>
                            </div>
                            <div class="form-group">
                                <label for="province">Province:</label>
                                <input type="text" id="province" name="province" data-field="province" required>
                            </div>
                        </div>
                        <div class="form-buttons">
                            <button type="button" id="closeModalBtn">Cancel</button>
                            <button type="button" id="saveChangesBtn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

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
    </div>

    <footer>
        <div class="footer-content">
            <p>© 2023 Bicol University. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/dean_account.js"></script>
    <script src="js/dean_page.js"></script>
</body>
</html>