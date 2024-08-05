<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Document</title>
    <link rel="stylesheet" href="{{ asset ('css/upload_document.css')}}">
    <link rel="stylesheet" href="{{ asset ('css/mainhead.css') }}">
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
                    <a href="#"><i class="bi bi-box-arrow-left" id="logout-icon"></i> Logout</a>
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
                    <a href="{{ route('home.admin') }}"><i class="bi bi-house-fill" id="home-icon"></i> Home</a>
                </li>
                <li>    
                    <a href="{{ route('admin.admin_dashboard') }}"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle"><i class="bi bi-file-earmark-fill"></i> Document Reports <i class="bi bi-caret-right-fill" id="dropdown-icon"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('admin.documents.memorandum') }}"><i class="bi bi-card-heading" id="memo-icon"></i> Memorandum</a>
                        <a href="audited_disbursement_voucher.html"><i class="bi bi-credit-card-2-front-fill"></i> Audited Disbursement Voucher</a>
                        <a href="claim_monitoring_sheet.html"><i class="bi bi-receipt-cutoff"></i> Claim Monitoring Sheet</a>
                        <a href="monthly_report_service_of_personnel.html"><i class="bi bi-calendar-event-fill"></i> Monthly Report Service of Personnel</a>
                    </div>
                    <a href="#" class="employee-dropdown-toggle"><i class="bi bi-people-fill"></i> Employee <i class="bi bi-caret-right-fill" id="employee-dropdown-icon"></i></a>
                    <div class="employee-dropdown">
                        <a href="{{ route ('admin.office_staff') }}"><i class="bi bi-card-heading" id="memo-icon"></i> Office Staff</a>
                        <a href="{{ route ('admin.college_dean') }}"><i class="bi bi-credit-card-2-front-fill"></i> College Dean</a>
                    </div>
                    <a href="#" class="pending-dropdown-toggle"><i class="bi bi-hourglass-split"></i> Pendings <i class="bi bi-caret-right-fill" id="pending-dropdown-icon"></i></a>
                    <div class="pending-dropdown">
                        <a href="{{ route ('admin.documents.approved_docs') }}"><i class="bi bi-card-heading" id="memo-icon"></i> Approved</a>
                        <a href="{{ route ('admin.documents.request_docs') }}"><i class="bi bi-credit-card-2-front-fill"></i> Request</a>
                    </div>
                </li>
                <li>    
                    <a href="{{ route ('admin.documents.sent_docs') }}"><i class="bi bi-send-plus-fill"></i> Notifications</a>
                </li>
                <li>    
                    <a href="{{ route('admin.admin_upload_document') }}"><i class="bi bi-cloud-arrow-up-fill"></i> Upload</a>
                </li>
            </ul>
            <div class="settings">
                <ul>
                    <li>
                        <a href="{{route('admin.admin_account')}}"><i class="bi bi-person-circle" id="account-icon"></i> Account</a>
                        <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-left" id="logout-icon"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>

        <main id="dashboard-content">
            <section class="title">
                <div class="title-content">
                    <h3>Upload Digitized Document</h3>
                </div>
            </section>

            <div class="dashboard-container">
                <div class="upload-section">
                    <div class="upload-box">
                        <div class="upload-area" id="upload-area">
                            <i class="bi bi-cloud-arrow-up-fill upload-icon"></i>
                            <p>Drag and drop files to upload</p>
                            <p>or</p>
                            <input type="file" id="file-input" multiple hidden>
                            <button class="select-files" onclick="document.getElementById('file-input').click()">Select Files</button>
                            <p>*Supported format: PDF</p>
                        </div>
                        <div class="uploaded-files">
                            <h4>Uploaded Files</h4>
                            <ul id="file-list"></ul>
                        </div>
                    </div>
                    <div class="form-section">
                        <form>
                            <div class="form-group">
                                <label for="document-number">Document Number</label>
                                <input type="number" id="document-number" name="document-number" required>
                            </div>
                            <div class="form-group">
                                <label for="document-name">Document Name</label>
                                <input type="text" id="document-name" name="document-name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category" required>
                                    <option value="">Select Category</option>
                                    <option value="memorandum">Memorandum</option>
                                    <option value="claim-monitoring-sheet">Claim Monitoring Sheet</option>
                                    <option value="mrsp">MRSP</option>
                                    <option value="other">Other</option>
                                </select>
                                <input type="text" id="other-category" name="other-category" placeholder="Please specify other category">
                            </div>
                            <div class="form-group">
                                <label for="document-tags">Document Tags</label>
                                <input type="text" id="document-tags" name="document-tags" required>
                            </div>
                            <button type="submit" class="submit-btn">Upload Document</button>
                        </form>
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

    <script src="{{ asset('js/upload_document.js')}}"></script>
    <script src="{{ asset('js/mainhead.js') }}"></script>

</body>
</html>