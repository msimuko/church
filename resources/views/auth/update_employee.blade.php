<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager" />
    <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager" />
    <link rel="stylesheet" href="<?php echo asset('css/addmember.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css') ?>" type="text/css">
    <title>Registration</title>
    <style>
        /* Autofill input styling */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px white inset !important;
            /* Changes background color */
            box-shadow: 0 0 0 30px white inset !important;
            -webkit-text-fill-color: #04AA6D !important;
            /* Changes text color */
        }
    </style>
</head>

<body>
    <x-validation-errors class="mb-4" />
    <div id="register" class="form-container">
        <form method="GET" autocomplete="on" action="{{ url('/update_employee', $employees->id) }}">
            @csrf

            <div class="logo">
                <img src="/images/sda.png" class="sda_logo">
            </div>
            <h2 class="form-title">Update Employee</h2>

            <div class="input-row">
                <div class="input-group">
                    <input id="name" name="name" value="{{$employees->name}}" type="text" required autofocus autocomplete="name" class="input" />
                    <label for="name" class="placeholder" data-icon="u">Name</label>
                </div>


                <div class="input-group">
                    <select id="gender" name="gender" required="required" class="input" autocomplete="off">
                    <option value="Marital Status">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="input-group">
                    <input id="address" name="address" value="{{$employees->address}}" type="text" required autofocus autocomplete="address " class="input" />
                    <label for="address" class="placeholder" data-icon="u">Address </label>
                </div>
                
                <div class="input-group">
                    <select id="marital_status" name="marital_status" required="required" class="input" autocomplete="off">
                        <option value="Marital Status">Marital Status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                    </select>
                </div>
                
                <div class="input-group">
                    <input id="birthday" type="date" value="{{$employees->birthday}}" name="birthday" min="1900-01-02" required="required" class="input" autocomplete="bday">
                    <label for="birthday" class="placeholders" data-icon="u">Date Of Birth</label>
                </div>

                <div class="input-group">
                    <input id="department" name="department" value="{{$employees->department}}" type="text" required autofocus autocomplete="department  " class="input" />
                    <label for="department" class="placeholder" data-icon="u">Department  </label>
                </div>

                <div class="input-group">
                    <input id="position" name="position" value="{{$employees->position}}" type="text" required autofocus autocomplete="position   " class="input" />
                    <label for="position" class="placeholder" data-icon="u">Position</label>
                </div>

                <div class="input-group">
                    <input id="account_number" name="account_number" value="{{$employees->account_number}}" type="text" required autofocus autocomplete="account_number    " class="input" />
                    <label for="account_number" class="placeholder" data-icon="u">Account Number    </label>
                </div>

                <div class="input-group">
                    <input id="mobile" name="mobile" type="number" value="{{$employees->mobile}}" required="required" class="input" autocomplete="tel">
                    <label for="mobile" class="placeholder" data-icon="u">Mobile Number</label>
                </div>

                <div class="input-group">
                    <input id="email" name="email" value="{{$employees->email}}" type="email" required autocomplete="email" class="input" />
                    <label for="email" class="placeholder" data-icon="e">Email Address</label>
                </div>

            </div>

            <button type="submit" value="Sign up" name="submit" class="submitbtn"><i class="fa-solid fa-user-plus"></i>&nbsp;Update Employee</button>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ms-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
            @endif
    </div>
    </form>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">Copyright © University SDA Church 2024</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Computer Science Dept <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Computer Systems Engineering</a> from University Of Zambia</span>
        </div>
    </footer>
    </div>
    </div>

    <script src="/images/script.js"></script>
</body>

</html>
