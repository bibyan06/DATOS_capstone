<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicol University Home</title>
    <link rel="stylesheet" href="css/dean_all_documents.css">
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



        <main id="memorandum-content">
            <div class="memorandum-container">
                <div class="memorandum-title">
                    <h1>ALL DIGITIZED DOCUMENTS</h1>
                </div>
                <div class="left-content">
                    <div class="memorandum-search-bar">
                        <input type="text" class="search-text" placeholder="Search Document">
                        <div class="icon"><i class="bi bi-search"></i></div>
                    </div>
                    <div class="memorandum-option">
                        <div class="search">
                            <select class="option-text">
                                <option value="" disabled selected>Select Category</option>
                                <option value="doc1">Memorandum</option>
                                <option value="doc2">Administrative Orders</option>
                                <option value="doc3">Monthly Report Service Personnel</option>
                                <option value="doc4">Claim Monitoring Sheet</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div id="dashboard-section">
                <div class="dashboard-container">
                    <div class="documents">
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>                        
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="dean_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="dean_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="dean_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="dean_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="dean_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="dean_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="dean_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="dean_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="dean_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="dean_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="document">
                            <div class="file-container">
                                <div class="document-card">
                                    <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                                </div>
                            </div>
                            <div class="document-description">
                                <div class="row">
                                        <div class="column-left">
                                            <h3>
                                            Office Memorandum No. 84
                                            </h3>
                                        </div>
                                        <div class="column-right">
                                            <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-more">
                                                <a href="dean_view.html">View</a>
                                                <a href="#">Download</a>
                                                <a href="dean_edit.html">Edit</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="other-details">
                                    <p>Date Updated: April 2, 2024</p>
                                    <p>Details of the memorandum go here.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Add more documents as needed -->
                    </div>
                </div>
            </div>

            
        </main>
 
    
    <footer>
        <div class="footer-content">
            <p>&copy; DATOS 2024 Bicol University. All Rights Reserved.</p>
            <p>Contact us: <a href="mailto:datos.bu@gmail.com">datos.bu@gmail.com</a></p>
        </div>
    </footer>
    <script src="js/dean_all_documents.js"></script>
    <script src="js/dean_page.js"></script>
</body>

</html>