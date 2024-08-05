<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Staff Upload Document</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/upload_document.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- JavaScript Files -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Internal Styles -->
    <style>
        .document_number {
            width: 30px;
        }
        .standby-files {
            margin-top: 20px;
        }
        .standby-file {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .standby-file i {
            margin-right: 10px;
        }
        .delete-button {
            margin-left: auto;
            cursor: pointer;
        }
    </style>
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
                    <a href="{{ route('office_staff.os_account') }}"><i class="bi bi-person-circle" id="account-icon"></i> Account</a>
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
                <li><a href="{{ route('office_staff.os_dashboard') }}"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a></li>
                <li>
                    <a href="#" class="dropdown-toggle"><i class="bi bi-grid-1x2-fill" id="dashboard-icon"></i> Document Reports <i class="bi bi-caret-right-fill" id="dropdown-icon"></i></a>
                    <div class="dropdown">
                        <a href="memorandum.html"><i class="bi bi-card-heading" id="memo-icon"></i> Memorandum</a>
                        <a href="audited_disbursement_voucher.html"><i class="bi bi-credit-card-2-front-fill"></i> Audited Disbursement Voucher</a>
                        <a href="claim_monitoring_sheet.html"><i class="bi bi-receipt-cutoff"></i> Claim Monitoring Sheet</a>
                        <a href="monthly_report_service_of_personnel.html"><i class="bi bi-calendar-event-fill"></i> Monthly Report Service of Personnel</a>
                    </div>
                </li>
                <li><a href="{{ route('office_staff.os_upload_document') }}"><i class="bi bi-upload"></i> Upload Document</a></li>
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
                <form action="{{ route('office_staff.upload_document') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="document-form">
                        <div class="upload-section">
                            <label for="file-upload" class="file-upload-label">
                                <i class="bi bi-filetype-pdf" id="file-icon"></i>
                                <button type="button" class="upload-button" onclick="document.getElementById('file-upload').click()">Upload File</button>
                                <input type="file" id="file-upload" name="file_upload" accept=".pdf" hidden onchange="handleFileSelect(event)">
                                <p>Maximum file size: 10MB</p>
                            </label>
                        </div>
                        <div class="standby-files" id="standby-files"></div>
                        <div class="document-form-category">
                            <div class="form-group-category">
                                <select id="category" name="category" required>
                                    <option value="">Category</option>
                                    <option value="1">Memorandum</option>
                                    <option value="2">Audited Disbursement Voucher</option>
                                    <option value="3">Claim Monitoring Sheet</option>
                                    <option value="4">Monthly Report Service of Personnel</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="document-number">Document Number</label>
                            <input type="number" id="document-number" name="document_number" class="document_number" required> 
                        </div>
                        <div class="form-group">
                            <label for="document-name">Document Name</label>
                            <input type="text" id="document-name" name="document_name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="document-tags">Document Tags</label>
                            <input type="text" id="document-tags" name="document_tags">
                        </div>
                        <button type="submit" class="save-button">Upload</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="successMessage">
                    <!-- Success message will be injected here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="errorMessage">
                    <!-- Error message will be injected here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- External JavaScript -->
    <script src="{{ asset('js/upload_document.js') }}"></script>

    <!-- Inline JavaScript -->
    <script>
        function handleFileSelect(event) {
            const files = event.target.files;
            const standbyFiles = document.getElementById('standby-files');
            standbyFiles.innerHTML = '';

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const fileElement = document.createElement('div');
                fileElement.className = 'standby-file';
                fileElement.dataset.fileName = file.name;
                fileElement.innerHTML = `
                    <i class="bi bi-file-earmark-pdf-fill"></i> ${file.name}
                    <span class="delete-button" onclick="deleteFile(event)">X</span>
                `;
                standbyFiles.appendChild(fileElement);
            }
        }

        function deleteFile(event) {
            const fileElement = event.target.closest('.standby-file');
            fileElement.remove();
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                document.getElementById('successMessage').innerText = '{{ session('success') }}';
                $('#successModal').modal('show');
            @endif

            @if(session('error'))
                document.getElementById('errorMessage').innerText = '{{ session('error') }}';
                $('#errorModal').modal('show');
            @endif
        });
    </script>
</body>
</html>
