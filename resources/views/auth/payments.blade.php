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
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: black;
        }

        .header {
            background-color: #343a40;
            color: white;
            padding: 15px 0;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            width: 30%;
            text-align: center;
            transition: transform 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 50px;
            height: 50px;
            margin: 10px 0;
        }

        .card-title {
            font-size: 18px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .footer1 {
            background-color: #f8f9fa;
            padding: 10px;
            border-top: 1px solid #ddd;
            width: 100%;
            text-align: center;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body> 
    <div class="container"> 
        <div class="row"> 
            <div class="card" onclick="showModal('Zanaco')"> 
                <h5 class="card-title">Zanaco</h5> 
                <img src="{{ asset('images/zanaco.png') }}" alt="Zanaco"> 
                <div class="footer1"> <p>Pay using Zanaco</p> 
            </div> 
        </div> 
        <div class="card" onclick="showModal('FNB')"> 
            <h5 class="card-title">FNB</h5> 
            <img src="{{ asset('images/FNB-Logo.png') }}" alt="FNB"> 
            <div class="footer1"> 
                <p>Pay using FNB</p> 
            </div> 
        </div> 
        <div class="card" onclick="showModal('Mobile Money')"> 
            <h5 class="card-title">Mobile Money</h5> 
            <img src="{{ asset('images/airtel2.png') }}" alt="Mobile Money"> 
            <div class="footer1"> <p>Pay using Mobile Money</p> 
        </div> 
    </div> 
</div> 
<div class="table-wrapper"> 
    <table cellpadding="0" cellspacing="0" border="0" class="table"> 
        <thead> 
            <tr> 
                <th>Name</th> 
                <th>Amount</th> 
                <th>Account</th> 
                <th>Date</th> 
            </tr> 
        </thead> 
        <tbody>
        @foreach($transactions as $transaction) 
            <tr> 
                <td>{{$transaction->name}}</td> 
                <td>{{$transaction->amount}}</td> 
                <td>{{$transaction->account}}</td> 
                <td>{{$transaction->date}}</td> 
            </tr> 
        @endforeach 
    </tbody> 
</table> 
</div> 
</div> 
<div id="exampleModal" class="modal"> 
    <div class="modal-content"> 
        <div class="modal-header">Pay</div> 
        <div class="modal-body"> 
            <form method="POST" autocomplete="on" action="{{ url('/pay_employee') }}"> @csrf 
                <input type="hidden" name="type" id="payment-type" value="FNB"> 
                <label for="employee-select">Select Employee:</label> 
                <select id="employee-select" name="employee" required> 
                    <option selected disabled>Select Employee</option> 
                </select> <label for="amount-input">Amount:</label> 
                <input type="number" name="amount" id="amount-input" required min="1"> 
                <button class="btn btn-success" type="submit">Pay</button>
            </form> 
        </div> 
        <div class="modal-footer">
             <button class="btn btn-success" type="button" onclick="closeModal()">Close</button> 
            </div> 
        </div> 
    </div>
    <div class="footer">Copyright © University SDA Church 2024</div> 
    <script> 
    document.addEventListener("DOMContentLoaded", function () { fetch('/employeetoshow') .then(response => response.json()) .then(data => { const selectElement = document.getElementById('employee-select'); data.forEach(employee => { const option = document.createElement('option'); option.value = employee.id; option.textContent = employee.name; selectElement.appendChild(option); }); }); }); function showModal(recipient) { document.getElementById("exampleModal").style.display = "block"; document.querySelector(".modal-header").textContent = `Pay with ${recipient}`; document.getElementById("payment-type").value = recipient; } function closeModal() { document.getElementById("exampleModal").style.display = "none"; } 
    </script> 
    </body> 
    </html>
</html>
