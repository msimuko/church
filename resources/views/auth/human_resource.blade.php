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
            min-height: calc(100vh);
        }

        /* Image container styling */
        .img-container {
            width: 100%;
            height: auto; /* Allow image to determine height */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
            margin-bottom: 10px; /* Adjust spacing under image */
        }

        /* Image styling */
        .img-small {
            max-width: 70%; /* Adjust image size */
            height: auto; /* Maintain aspect ratio */
            object-fit: contain; /* Ensure full image is visible */
        }

        /* Card title styling */
        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 5px;
        }

        /* Label styling under each card */
        .card-label {
            font-size: 16px;
            color: #666;
            margin-top: 3px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 10px;
            }
            .img-small {
                max-width: 80%; /* Adjust image size for smaller screens */
            }
        }
    </style>
</head>

<body>
    <h1 class="mb-4 text-center">HR Dashboard</h1>
    <div class="row justify-content-center">

        <!-- Payroll Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="{{ url('payroll') }}" class="card text-decoration-none h-100">
                <div class="img-container">
                    <img src="{{ asset('images/pay3.png') }}" class="img-small" alt="Payroll">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Payroll</h5>
                    <p class="card-label">Manage Payroll and Employee Salaries</p>
                </div>
            </a>
        </div>

        <!-- E-Wallet Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="{{ url('ewallet') }}" class="card text-decoration-none h-100">
                <div class="img-container">
                    <img src="{{ asset('images/walet.png') }}" class="img-small" alt="E-Wallet">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">E-Wallet</h5>
                    <p class="card-label">Access and Manage E-Wallet Transactions</p>
                </div>
            </a>
        </div>

        <!-- Employee Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="{{ url('employee') }}" class="card text-decoration-none h-100">
                <div class="img-container">
                    <img src="{{ asset('images/emp.png') }}" class="img-small" alt="Employee">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Employee</h5>
                    <p class="card-label">Employee Management and Details</p>
                </div>
            </a>
        </div>

        <!-- Payments Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="{{ url('payments') }}" class="card text-decoration-none h-100">
                <div class="img-container">
                    <img src="{{ asset('images/cash1.png') }}" class="img-small" alt="Payments">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Payments</h5>
                    <p class="card-label">Manage and Track Payments</p>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
