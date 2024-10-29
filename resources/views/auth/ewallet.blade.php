<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager" />
    <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager" />
    <link rel="stylesheet" href="<?php echo asset('css/viewmember.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css') ?>" type="text/css">
    <title>View Church Members</title>
    <style>

    </style>
</head>

<body>
    <footer class="footer2">
    <div class="d-sm-flex justify-content-start justify-content-sm-between align-items-center">
    <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block">
               &nbsp;Ewallet
            </span>
            <a class="btn btn-success" href="{{ url('deposit') }}">
                <i class="fa-solid fa-add icon-medium"></i> Enter Deposited Amount
            </a>
        </div>
    </footer>

    <div id="block_bg" class="block">
        <div id="register" class="form-container">
            <form method="POST" autocomplete="on" action="{{ url('/add_members') }}">
                @csrf

                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase text-primary">Zanaco</h5>
                                    <img src="{{ asset('images/zanaco.png') }}" alt="Zanaco">
                                </div>
                                <div class="footer1">
                                    <p class="text-muted2 font-weight-normal">
                                     {{ $Zanaco}}</p>
                                </div>
                            </div>
                        </div>

                    
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase text-primary">FNB</h5>
                                    <img src="{{ asset('images/FNB-Logo.png') }}" alt="FNB">
                                </div>
                                <div class="footer1">
                                    <p  class="text-muted2 font-weight-normal">K
                                        {{ $FNB}}</p>
                                </div>
                            </div>
                        </div>

                       
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase text-primary">Airtel Money</h5>
                                    <img src="{{ asset('images/airtel2.png') }}" alt="Airtel Money">
                                </div>
                                <div class="footer1">
                                    <p
                                        class="text-muted2 font-weight-normal">K  {{ $mobile}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">Copyright © University SDA
                Church 2024</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Computer Science Dept <a class="footlink"
                    href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Computer Systems
                    Engineering</a> from University Of Zambia</span>
        </div>
    </footer>
    </div>
</body>

</html>