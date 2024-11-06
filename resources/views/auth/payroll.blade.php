<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager">
    <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager">
    <link rel="stylesheet" href="{{ asset('css/viewmember.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}" type="text/css">
    <title>View Church Members</title>
</head>

<body>
    <footer class="footer2">
        <div class="d-sm-flex justify-content-start justify-content-sm-between align-items-center">
            <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block">&nbsp;Employees</span>
        </div>
        <div class="search-container">
            <input type="text" id="search-input" class="form-control" placeholder="Search for Employee" onkeyup="searchTable()">
        </div>
    </footer>

    <div id="block_bg" class="block">
        <div id="register" class="form-container">
            <form method="POST" autocomplete="on" action="{{ url('/add_members') }}">
                @csrf
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">All</button>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Volunteers</button>
                    </li> -->
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table-wrapper">
                            <table class="table" id="example">
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

                    <!-- <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="table-wrapper">
                            <table class="table" id="example2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>p1</td>
                                        <td>p2</td>
                                        <td>p3</td>
                                        <td>p4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> -->
                </div>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">Copyright © University SDA Church 2024</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                Computer Science Dept <a class="footlink" href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Computer Systems Engineering</a> from University Of Zambia
            </span>
        </div>
    </footer>

    <script>
        function searchTable() {
            const input = document.getElementById("search-input").value.toLowerCase();
            const table = document.getElementById("example");
            const trs = table.querySelectorAll("tbody tr");

            trs.forEach(tr => {
                const cells = Array.from(tr.getElementsByTagName("td"));
                const match = cells.some(td => td.textContent.toLowerCase().includes(input));
                tr.style.display = match ? "" : "none";
            });
        }
    </script>
</body>

</html>
