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
        <div class="d-sm-flex justify-content-center justify-content-sm-between mb-2">
            <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block">
                <i class="fa-solid fa-user"></i>&nbsp;Projects
            </span>
            <a class="btn btn-success" href="{{ url('/addproject') }}">
                <i class="fa-solid fa-add icon-medium"></i> Add Project
            </a>
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
                        <a class="nav-link active" onclick="showTab(event, 'home-tab-pane')">New Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="showTab(event, 'profile-tab-pane')">Pending Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="showTab(event, 'project-tab-pane')">Completed Project</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="myTabContent">
                    <!-- Paid Employee Tab Content -->
                    <div class="tab-pane active" id="home-tab-pane">
                        <div class="table-wrapper">
                            <table id="example">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Duration</th>
                                        <th>cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($newprojects as $newproject)
                                    <tr>
                                        <td> {{$newproject->id }}</td>
                                        <td> {{$newproject->name }}</td>
                                        <td>{{$newproject->description}} </td>
                                        <td> {{$newproject->duration}}</td>
                                        <td> {{$newproject->cost }}</td>
                                        <td>
                                        <a onclick="return confirm('Are You Sure You Want To Delete This Member')"
                                            class="btn btn-danger" href="{{ url('/deleteprojects', $newproject->id) }}">
                                            <i class="fa-solid fa-trash icon-medium"></i>
                                        </a>
                                    </td>
                                    <td>
                                    <a class="btn btn-success" href="{{ url('/editproject', $newproject->id) }}">&nbsp;&nbsp;
                                        <i class="fa-solid fa-pen-to-square icon-medium"></i> Edit &nbsp;&nbsp;
                                    </a>
                                </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Volunteers Tab Content -->
                    <div class="tab-pane" id="profile-tab-pane">
                        <div class="table-wrapper">
                            <table id="example">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Duration</th>
                                        <th>cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pendingprojects as $pendingproject)
                                    <tr>
                                        <td> {{$pendingproject->id }}</td>
                                        <td> {{$pendingproject->name }}</td>
                                        <td>{{$pendingproject->description}} </td>
                                        <td> {{$pendingproject->duration}}</td>
                                        <td> {{$pendingproject->cost }}</td>
                                        <td>
                                        <a onclick="return confirm('Are You Sure You Want To Delete This Member')"
                                            class="btn btn-danger" href="{{ url('/deleteprojects', $pendingproject->id) }}">
                                            <i class="fa-solid fa-trash icon-medium"></i>
                                        </a>
                                    </td>
                                    <td>
                                    <a class="btn btn-success" href="{{ url('/editproject/{id}'. $pendingproject->id) }}">&nbsp;&nbsp;
                                        <i class="fa-solid fa-pen-to-square icon-medium"></i> Edit &nbsp;&nbsp;
                                    </a>
                                </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Project Tab Content -->
                    <div class="tab-pane" id="project-tab-pane">
                    <div class="table-wrapper">
                            <table id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Duration</th>
                                        <th>cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($completedprojects as $completedproject)
                                    <tr>
                                        <td> {{$completedproject->id }}</td>
                                        <td> {{$completedproject->name }}</td>
                                        <td>{{$completedproject->description}} </td>
                                        <td> {{$completedproject->duration}}</td>
                                        <td> {{$completedproject->cost }}</td>
                                        <td>
                                        <a onclick="return confirm('Are You Sure You Want To Delete This project')"
                                            class="btn btn-danger" href="{{ url('/deleteprojects', $completedproject->id) }}">
                                            <i class="fa-solid fa-trash icon-medium"></i>
                                        </a>
                                    </td>
                                        
                                    <td>
                                    <a class="btn btn-success" href="{{ url('/editproject/'.$completedproject->id) }}">&nbsp;&nbsp;
                                        <i class="fa-solid fa-pen-to-square icon-medium"></i> Edit &nbsp;&nbsp;
                                    </a>
                                </td>
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
            var table = document.getElementById("example");
            var trs = table.getElementsByTagName("tr");

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
