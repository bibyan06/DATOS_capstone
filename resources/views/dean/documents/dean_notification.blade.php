<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicol University Home</title>
    <link rel="stylesheet" href="css/dean_notification.css">
    <link rel="stylesheet" href="css/dean_page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
                    <h3>Sent Documents</h3>
                    <div class="date-time">
                        <i class="bi bi-calendar2-week-fill"></i>
                        <p id="current-date-time"></p>
                    </div>
                </div>
            </section>

            <div id="dashboard-section">
                <div class="dashboard-container">
                    <table class="email-list">
                        <tr class="email-item">
                            <td class="checkbox"><input type="checkbox"></td>
                            <td class="star">★</td>
                            <td class="sender">DATOS</td>
                            <td class="subject">
                                <span class="subject-text">Forwarded Document</span>
                                <span class="snippet"> - Employee Vivian Vivo forwarded a document regarding the Office Memorandum No. 108 Series of 2024.</span>
                            </td>
                            <td class="date">Jul 31</td>
                            <td class="email-actions">
                                <i class="bi bi-archive"></i>
                                <i class="bi bi-trash"></i>
                                <i class="bi bi-envelope"></i>
                                <i class="bi bi-clock"></i>
                            </td>
                        </tr>
                        <tr class="email-item">
                            <td class="checkbox"><input type="checkbox"></td>
                            <td class="star">★</td>
                            <td class="sender">DATOS</td>
                            <td class="subject">
                                <span class="subject-text">Forwarded Document</span>
                                <span class="snippet"> - Employee Allana Nual forwarded a document regarding the Annual Financial Report 2024.</span>
                            </td>
                            <td class="date">Jul 18</td>
                            <td class="email-actions">
                                <i class="bi bi-archive"></i>
                                <i class="bi bi-trash"></i>
                                <i class="bi bi-envelope"></i>
                                <i class="bi bi-clock"></i>
                            </td>
                        </tr>
                        <tr class="email-item">
                            <td class="checkbox"><input type="checkbox"></td>
                            <td class="star">★</td>
                            <td class="sender">DATOS</td>
                            <td class="subject">
                                <span class="subject-text">Forwarded Document</span>
                                <span class="snippet"> - Employee Kent Dela Pena forwarded a document regarding the Quarterly Budget Report Q2 2024.</span>
                            </td>
                            <td class="date">Jul 10</td>
                            <td class="email-actions">
                                <i class="bi bi-archive"></i>
                                <i class="bi bi-trash"></i>
                                <i class="bi bi-envelope"></i>
                                <i class="bi bi-clock"></i>
                            </td>
                        </tr>
                        <tr class="email-item">
                            <td class="checkbox"><input type="checkbox"></td>
                            <td class="star">★</td>
                            <td class="sender">DATOS</td>
                            <td class="subject">
                                <span class="subject-text">Forwarded Document</span>
                                <span class="snippet"> - Employee Kim Bolata forwarded a document regarding the New Research Project Proposal.</span>
                            </td>
                            <td class="date">Jul 03</td>
                            <td class="email-actions">
                                <i class="bi bi-archive"></i>
                                <i class="bi bi-trash"></i>
                                <i class="bi bi-envelope"></i>
                                <i class="bi bi-clock"></i>
                            </td>
                        </tr>
                    </table>
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

    <script src="js/dean_page.js"></script>
    <script src="js/dean_notification.js"></script>
    
</body>
</html>