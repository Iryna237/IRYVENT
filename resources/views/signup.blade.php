<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Event Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e54c8;
            --secondary-color: #8f94fb;
            --accent-color: #ff6b6b;
            --text-color: #333;
            --light-text: #fff;
            --card-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            color: var(--text-color);
        }
        
        .register-container {
            display: flex;
            width: 100%;
            max-width: 950px;
            min-height: 600px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
        }
        
        .event-image {
            flex: 1;
            background: #f8f9fa
                        url('/images/images_1.jpg') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 40px;
            color: var(--light-text);
            position: relative;
        }
        
        .event-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, transparent 100%);
            z-index: 0;
        }
        
        .event-content {
            position: relative;
            z-index: 1;
        }
        
        .event-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .event-date {
            font-size: 1.2rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .event-date i {
            margin-right: 10px;
        }
        
        .event-description {
            font-size: 1rem;
            line-height: 1.6;
            max-width: 90%;
        }
        
        .register-form {
            flex: 1;
            background: #fff;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .register-header h3 {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 8px;
        }
        
        .register-header p {
            color: #777;
            font-size: 0.95rem;
        }
        
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #555;
        }
        
        .form-control {
            padding: 12px 15px;
            border-radius: 10px;
            border: 1.5px solid #e1e1e1;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(78, 84, 200, 0.2);
        }
        
        .input-group {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }
        
        .btn-register {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            color: white;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 84, 200, 0.4);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }
        
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #e1e1e1;
        }
        
        .divider span {
            padding: 0 15px;
            color: #777;
            font-size: 0.9rem;
        }
        
        .social-login {
            display: flex;
            gap: 12px;
            margin-bottom: 25px;
        }
        
        .social-btn {
            flex: 1;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
            
        .button-form{
             display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
        
        .social-btn i {
            margin-right: 8px;
            font-size: 1.1rem;
        }
        
        .social-btn.google {
            background: #fff;
            color: #db4437;
            border: 1.5px solid #e1e1e1;
        }
        
        .social-btn.google:hover {
            background: #f5f5f5;
        }
        
        .social-btn.facebook {
            background: #3b5998;
            color: white;
        }
        
        .social-btn.facebook:hover {
            background: #344e86;
        }
        
        .social-btn.apple {
            background: #000;
            color: white;
        }
        
        .social-btn.apple:hover {
            background: #222;
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.95rem;
        }
        
        .login-link a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .login-link a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .register-container {
                flex-direction: column;
                max-width: 500px;
            }
            
            .event-image {
                min-height: 250px;
            }
        }
        
        @media (max-width: 576px) {
            .register-form {
                padding: 30px 25px;
            }
            
            .social-login {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="event-image">
            <div class="event-content">
                <h2 class="event-title">Join IRYVENT for an unforgettable experience</h2>
                <div class="event-date">
                    
                </div>
                <p class="event-description">
                   
                </p>
            </div>
        </div>
        
        <div class="register-form">
            <div class="register-header">
                <h3>Create Your Account</h3>
                <p>Sign up to get your tickets and personalized experience</p>
            </div>

            <div class="button-form">
                <button id="btn-customer"type="button" class="btn btn-register">Customer</button>
                <button id="btn-creator"type="button" class="btn btn-outline-primary ">Creator</button>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="form-customer" action="{{ route('register-customer') }}" enctype="multipart/form-data" method="POST" class="d-block">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required placeholder="Enter your full name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="Enter your email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control" required placeholder="Create a strong password">
                        <span class="password-toggle" id="passwordToggle">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required placeholder="Confirm your password">
                        <span class="password-toggle" id="confirmPasswordToggle">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-register w-100">Create Account</button>
            </form>

            <form id="form-creator" action="{{ route('register-creator') }}" method="POST" enctype="multipart/form-data" class="d-none">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required placeholder="Enter your full name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="Enter your email">
                </div>

                <div class="mb-3">
                    <label for="vice_ID_card" class="form-label">Vice picture of the ID_card</label>
                    <input type="file" id="vice_ID_card" name="vice_ID_card" class="form-control" value="{{ old('email') }}" required placeholder="Enter picture">
                </div>
                <div class="mb-3">
                    <label for="versa_card" class="form-label">Versa picture of the ID_card</label>
                    <input type="file" id="versa_ID_card" name="versa_ID_card" class="form-control" value="{{ old('email') }}" required placeholder="Enter picture">
                </div>
                <div class="mb-3">
                    <label for="face_selfie" class="form-label">Face selfie</label>
                    <input type="file" id="face_selfie" name="face_selfie" class="form-control" value="{{ old('email') }}" required placeholder="Enter a selfie">
                </div>
                <div class="mb-3">
                    <label for="face_card" class="form-label">Face selfie with ID_card</label>
                    <input type="file" id="face_card" name="face_card" class="form-control" value="{{ old('email') }}" required placeholder="Enter picture">
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control" required placeholder="Create a strong password">
                        <span class="password-toggle" id="passwordToggle">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required placeholder="Confirm your password">
                        <span class="password-toggle" id="confirmPasswordToggle">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-register w-100">Create Account</button>
            </form>

            <script>
                const btnCustomer = document.getElementById('btn-customer');
                const btnCreator = document.getElementById('btn-creator');
                const formCustomer = document.getElementById('form-customer');
                const formCreator = document.getElementById('form-creator');

                btnCustomer.addEventListener('click', function() {
                    formCustomer.classList.remove('d-none');
                    formCustomer.classList.add('d-block');
                    formCreator.classList.remove('d-block');
                    formCreator.classList.add('d-none');
                    btnCustomer.classList.remove('btn-outline-primary');
                    btnCustomer.classList.add('btn-register');
                    btnCreator.classList.remove('btn-register');
                    btnCreator.classList.add('btn-outline-primary');

                });
                btnCreator.addEventListener('click', function() {
                    formCreator.classList.remove('d-none');
                    formCreator.classList.add('d-block');
                    formCustomer.classList.remove('d-block');
                    formCustomer.classList.add('d-none');
                    btnCreator.classList.remove('btn-outline-primary');
                    btnCreator.classList.add('btn-register');
                    btnCustomer.classList.remove('btn-register');
                    btnCustomer.classList.add('btn-outline-primary');
                });
            </script>

            <div class="divider">
                <span>Or continue with</span>
            </div>

            <div class="social-login">
                <button class="social-btn google" onclick="window.location.href='{{ url('auth/google') }}'">
                    <i class="bi bi-google"></i> Google
                </button>
                <button class="social-btn facebook" onclick="window.location.href='{{ url('auth/facebook') }}'">
                    <i class="bi bi-facebook"></i> Facebook
                </button>
                <button class="social-btn apple" onclick="window.location.href='{{ url('auth/apple') }}'">
                    <i class="bi bi-apple"></i> Apple
                </button>
            </div>

            <div class="login-link">
                <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        const passwordToggle = document.getElementById('passwordToggle');
        const confirmPasswordToggle = document.getElementById('confirmPasswordToggle');
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('password_confirmation');
        
        passwordToggle.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
        
        confirmPasswordToggle.addEventListener('click', function() {
            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>