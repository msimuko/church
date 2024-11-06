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
    <form method="get" autocomplete="on"  action="{{ url('/editproject', $projects->id) }}">
            @csrf

            <div class="logo">
                <img src="/images/sda.png" class="sda_logo">
            </div>
            <h2 class="form-title">Add project</h2>

            <div class="input-row">
                <div class="input-group">
                    <input id="name" name="name" value="{{$projects->name}}" type="text" required autofocus autocomplete="name" class="input" />
                    <label for="name" class="placeholder" data-icon="u">Name</label>
                </div>


                <div class="input-group">
                    <input id="description" value="{{$projects->description}}" name="description" type="text" required autofocus autocomplete="description " class="input" />
                    <label for="description" class="placeholder" data-icon="u">Description </label>
                </div>
                

                <div class="input-group">
                    <input id="duration" value="{{$projects->duration}}" name="duration" type="text" required autofocus autocomplete="duration" class="input" />
                    <label for="duration" class="placeholder" data-icon="u">Duration </label>
                </div>

                <div class="input-group">
                    <input id="cost" name="cost" value="{{$projects->cost}}" type="text" required autofocus autocomplete="cost" class="input" />
                    <label for="cost" class="placeholder" data-icon="u">Project Cost</label>
                </div>

                <div class="input-group">
                    <select id="status" name="status" required="required" class="input" autocomplete="off">
                    <option>Select Project Status</option>
                        <option value="new">New</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

            </div>

            <button type="submit" value="Sign up" name="submit" class="submitbtn"><i class="fa-solid fa-user-plus"></i>&nbsp;Add Project</button>

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
    <!-- <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">Copyright © University SDA Church 2024</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Computer Science Dept <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Computer Systems Engineering</a> from University Of Zambia</span>
        </div>
    </footer> -->
    </div>
    </div>

    <script src="/images/script.js"></script>
</body>

</html>
