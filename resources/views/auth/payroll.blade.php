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
        body {
            font-family: Arial, sans-serif;
        }

        /* Footer styling */
        .footer, .footer2 {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
            color: #6c757d;
            font-size: 0.9em;
        }
        .footlink {
            color: #007bff;
            text-decoration: none;
        }

        /* Main content layout */
        .block {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* Form container */
        .form-container {
            padding: 20px;
        }

        /* Search container styling */
        .search-container {
            display: flex;
            justify-content: center;
            margin: 15px 0;
        }
        .form-control {
            width: 300px;
            padding: 5px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        /* Tabs styling */
        .nav-tabs {
            display: flex;
            list-style: none;
            padding: 0;
            border-bottom: 1px solid #ddd;
        }
        .nav-item {
            margin: 0 5px;
        }
        .nav-link {
            display: inline-block;
            padding: 10px 15px;
            background-color: #f1f1f1;
            color: #495057;
            text-decoration: none;
            border-radius: 4px 4px 0 0;
            cursor: pointer;
        }
        .nav-link.active {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-bottom: none;
            color: #000;
        }

        /* Tab content */
        .tab-content {
            border: 1px solid #ddd;
            border-top: none;
            padding: 20px;
        }
        .tab-pane {
            display: none;
        }
        .tab-pane.active {
            display: block;
        }

        /* Table styling */
        .table-wrapper {
            overflow-x: auto;
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <!-- Footer section -->
    <footer class="footer2">
        <div>
            <span>Employees</span>
        </div>
        <div class="search-container">
            <input type="text" id="search-input" class="form-control" placeholder="Search for Employee" onkeyup="searchTable()">
        </div>
    </footer>

    <!-- Main Content -->
    <div id="block_bg" class="block">
        <div id="register" class="form-container">
            <form method="POST" autocomplete="on" action="">
                @csrf
                <!-- Main Tabs -->
                <ul class="nav-tabs" id="myTab">
                    <li class="nav-item">
                        <a class="nav-link" onclick="showTab(event, 'project-tab-pane')">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" onclick="showTab(event, 'home-tab-pane')">Paid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="showTab(event, 'profile-tab-pane')">Volunteers</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="myTabContent">
                    <!-- Paid Employee Tab Content -->
                    <div class="tab-pane active" id="home-tab-pane">
                        <div class="table-wrapper">
                            <table id="paid-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Account</th>
                                        <th>Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paids as $paid)
                                        <tr>
                                            <td>{{ $paid->name }}</td>
                                            <td>{{ $paid->department }}</td>
                                            <td>{{ $paid->position }}</td>
                                            <td>{{ $paid->account_number }}</td>
                                            <td>{{ $paid->mobile }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Volunteers Tab Content -->
                    <div class="tab-pane" id="profile-tab-pane">
                        <div class="table-wrapper">
                            <table id="volunteer-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Account</th>
                                        <th>Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($unpaids as $unpaid)
                                        <tr>
                                            <td>{{ $unpaid->name }}</td>
                                            <td>{{ $unpaid->department }}</td>
                                            <td>{{ $unpaid->position }}</td>
                                            <td>{{ $unpaid->account_number }}</td>
                                            <td>{{ $unpaid->mobile }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Project Tab Content -->
                    <div class="tab-pane" id="project-tab-pane">
                        <div class="table-wrapper">
                            <table id="all-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Account</th>
                                        <th>Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->department }}</td>
                                            <td>{{ $employee->position }}</td>
                                            <td>{{ $employee->account_number }}</td>
                                            <td>{{ $employee->mobile }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div>
            <span>&copy; University SDA Church 2024 | Computer Science Dept</span>
        </div>
    </footer>

    <script>
        // Search functionality
        function searchTable() {
            var input = document.getElementById("search-input").value.toLowerCase();
            var activeTab = document.querySelector(".tab-pane.active table");
            var trs = activeTab.getElementsByTagName("tr");

            for (var i = 1; i < trs.length; i++) {
                var tds = trs[i].getElementsByTagName("td");
                var match = false;
                for (var j = 0; j < tds.length; j++) {
                    if (tds[j].innerHTML.toLowerCase().indexOf(input) > -1) {
                        match = true;
                        break;
                    }
                }
                trs[i].style.display = match ? "" : "none";
            }
        }

        // Tab switching functionality
        function showTab(event, tabId) {
            var tabContent = document.getElementsByClassName("tab-pane");
            for (var i = 0; i < tabContent.length; i++) {
                tabContent[i].classList.remove("active");
            }
            document.getElementById(tabId).classList.add("active");
            var tabs = document.getElementsByClassName("nav-link");
            for (var j = 0; j < tabs.length; j++) {
                tabs[j].classList.remove("active");
            }
            event.currentTarget.classList.add("active");
        }
    </script>
</body>
</html>
