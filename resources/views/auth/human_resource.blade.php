<!DOCTYPE html>
<html lang="en">

<head>
   <style>
        .main-panel {
            flex-grow: 1;
        }

        /* Main Content Styling */
        .content-wrapper {
            padding: 20px;
            background-color: #f9f9f9;
            min-height: calc(100vh); /* Full height without header */
        }

        /* Adjust image size */
        .img-small {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        /* Ensuring the layout is responsive */
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 10px;
            }
        }
    </style>

</head>

<body>
    <h1 class="mb-4">HR Dashboard</h1>
    <div class="row">
        
        <!-- Payroll Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a  href="{{ url('payroll') }}" class="card text-decoration-none h-100">
                <img src="{{ asset('images/hr/pay3.png') }}" class="card-img-top img-small" alt="Payroll">
                <div class="card-body text-center">
                    <h5 class="card-title">Payroll</h5>
                </div>
            </a>
        </div>
        
        <!-- E-Wallet Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a  href="{{ url('ewallet') }}" class="card text-decoration-none h-100">
                <img src="{{ asset('images/hr/walet.png') }}" class="card-img-top img-small" alt="E-Wallet">
                <div class="card-body text-center">
                    <h5 class="card-title">E-Wallet</h5>
                </div>
            </a>
        </div>

        <!-- E-Wallet Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a  href="{{ url('employee') }}" class="card text-decoration-none h-100">
                <img src="{{ asset('images/hr/walet.png') }}" class="card-img-top img-small" alt="Employee">
                <div class="card-body text-center">
                    <h5 class="card-title">Employee</h5>
                </div>
            </a>
        </div>

        <!-- Payments -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a  href="{{ url('payments') }}" class="card text-decoration-none h-100">
                <img src="{{ asset('images/hr/walet.png') }}" class="card-img-top img-small" alt="payments">
                <div class="card-body text-center">
                    <h5 class="card-title">Payments</h5>
                </div>
            </a>
        </div>
    </div>
                
</body>

</html>
