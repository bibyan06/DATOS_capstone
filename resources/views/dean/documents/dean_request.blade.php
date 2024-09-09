@extends('layouts.dean_layout')

@section('title', 'Request Document' )

@section('custom-css')
    <link rel="stylesheet" href="{{ asset ('css/dean/dean_request.css') }}">
@endsection

@section('main-id','dashboard-content')

@section('content')  
        <section class="title">
            <div class="title-content">
                <h3>Request Form</h3>
                <div class="date-time">
                    <i class="bi bi-calendar2-week-fill"></i>
                    <p id="current-date-time"></p>
                </div>
            </div>
        </section>

        <div id="dashboard-section">
            <div class="dashboard-container d-flex">
                <div class="left-container">
                    <img src="{{asset ('images/sidebar-logo.png')}}" alt="DATOS" class="img-fluid">
                </div>
        
                <div class="right-container">
                    <form>
                        <div class="form-group">
                            <label for="document-subject">Document Subject:</label>
                            <input type="text" id="document-subject" name="document-subject" class="form-control" required>
                        </div>
        
                        <div class="form-group">
                            <label for="request-purpose">Request Purpose:</label>
                            <input type="text" id="request-purpose" name="request-purpose" class="form-control" required>
                        </div>
        
                        <div class="form-group">
                            <label for="college">College:</label>
                            <input type="text" id="college" name="college" class="form-control" required>
                        </div>
                        <div class="button-cont">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('custom-js')
    <script src="{{ asset ('js/dean/dean_request.js') }}"></scrip> 
@endsection

</body>
</html>