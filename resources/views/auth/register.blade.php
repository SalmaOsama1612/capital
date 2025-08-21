<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capital - Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 20px 0;
        }

        /* Industrial background pattern */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 20%, rgba(218, 165, 32, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(218, 165, 32, 0.08) 0%, transparent 50%),
                linear-gradient(45deg, rgba(255, 255, 255, 0.02) 25%, transparent 25%),
                linear-gradient(-45deg, rgba(255, 255, 255, 0.02) 25%, transparent 25%);
            background-size: 100px 100px, 150px 150px, 50px 50px, 50px 50px;
            animation: backgroundMove 20s linear infinite;
        }

        @keyframes backgroundMove {
            0% { background-position: 0 0, 0 0, 0 0, 0 0; }
            100% { background-position: 100px 100px, -150px -150px, 50px 50px, -50px -50px; }
        }

        .register-container {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(218, 165, 32, 0.3);
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.5),
                0 0 100px rgba(218, 165, 32, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
            margin: 20px;
        }

        .register-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(218, 165, 32, 0.05) 0%, transparent 50%);
            border-radius: 15px;
            pointer-events: none;
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo h1 {
            color: #DAA520;
            font-size: 2.2em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            letter-spacing: 2px;
        }

        .logo p {
            color: #888;
            font-size: 0.9em;
            margin-top: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .subtitle {
            text-align: center;
            color: #ccc;
            font-size: 0.95em;
            margin-bottom: 25px;
            font-weight: 300;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            color: #DAA520;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.85em;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input {
            width: 100%;
            padding: 12px 18px;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(218, 165, 32, 0.3);
            border-radius: 8px;
            color: #fff;
            font-size: 15px;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .form-input:focus {
            outline: none;
            border-color: #DAA520;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 0 20px rgba(218, 165, 32, 0.2),
                inset 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .form-input::placeholder {
            color: #888;
            font-size: 14px;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            gap: 15px;
        }

        .login-link {
            color: #DAA520;
            text-decoration: none;
            font-size: 0.9em;
            transition: all 0.3s ease;
            flex: 1;
        }

        .login-link:hover {
            color: #FFD700;
            text-shadow: 0 0 5px rgba(218, 165, 32, 0.5);
        }

        .register-btn {
            background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
            color: #000;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 0.95em;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 
                0 5px 15px rgba(218, 165, 32, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            flex-shrink: 0;
        }

        .register-btn:hover {
            background: linear-gradient(135deg, #FFD700 0%, #DAA520 100%);
            transform: translateY(-2px);
            box-shadow: 
                0 8px 25px rgba(218, 165, 32, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.75em;
            margin-top: 4px;
            background: rgba(255, 107, 107, 0.1);
            padding: 6px 10px;
            border-radius: 5px;
            border-left: 3px solid #ff6b6b;
        }

        /* Industrial accent elements */
        .accent-line {
            height: 2px;
            background: linear-gradient(90deg, transparent, #DAA520, transparent);
            margin: 20px 0;
            position: relative;
        }

        .accent-line::before {
            content: '';
            position: absolute;
            left: 50%;
            top: -4px;
            transform: translateX(-50%);
            width: 8px;
            height: 8px;
            background: #DAA520;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(218, 165, 32, 0.5);
        }

        /* Two column layout for passwords */
        .password-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* Industrial border effect */
        .register-container::after {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            background: linear-gradient(45deg, #DAA520, transparent, #DAA520, transparent, #DAA520);
            border-radius: 15px;
            z-index: -1;
            opacity: 0.3;
            animation: borderGlow 3s ease-in-out infinite alternate;
        }

        @keyframes borderGlow {
            0% { opacity: 0.2; }
            100% { opacity: 0.4; }
        }

        /* Form validation states */
        .form-input.valid {
            border-color: #22c55e;
            box-shadow: 0 0 10px rgba(34, 197, 94, 0.2);
        }

        .form-input.invalid {
            border-color: #ef4444;
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.2);
        }

        /* Progress indicator */
        .form-progress {
            height: 3px;
            background: rgba(218, 165, 32, 0.2);
            border-radius: 2px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .form-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #DAA520, #FFD700);
            border-radius: 2px;
            transition: width 0.3s ease;
            width: 0%;
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .register-container {
                margin: 10px;
                padding: 25px 20px;
            }
            
            .logo h1 {
                font-size: 1.8em;
            }
            
            .password-row {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .form-actions {
                flex-direction: column;
                gap: 15px;
            }
            
            .register-btn {
                width: 100%;
            }
        }

        /* Smooth entry animation */
        .register-container {
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="logo">
            <h1>Capital</h1>
            <p>Construction Company</p>
        </div>
        
        <div class="subtitle">Create Your Account</div>
        <div class="accent-line"></div>

        <div class="form-progress">
            <div class="form-progress-bar" id="progressBar"></div>
        </div>

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name" class="form-label">{{ __('Full Name') }}</label>
                <input 
                    id="name" 
                    class="form-input" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="Enter your full name"
                />
                @if ($errors->get('name'))
                    <div class="error-message">
                        @foreach ($errors->get('name') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input 
                    id="email" 
                    class="form-input" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="email"
                    placeholder="Enter your email address"
                />
                @if ($errors->get('email'))
                    <div class="error-message">
                        @foreach ($errors->get('email') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Password Row -->
            <div class="password-row">
                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input 
                        id="password" 
                        class="form-input"
                        type="password"
                        name="password"
                        required 
                        autocomplete="new-password"
                        placeholder="Password"
                    />
                    @if ($errors->get('password'))
                        <div class="error-message">
                            @foreach ($errors->get('password') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm') }}</label>
                    <input 
                        id="password_confirmation" 
                        class="form-input"
                        type="password"
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        placeholder="Confirm password"
                    />
                    @if ($errors->get('password_confirmation'))
                        <div class="error-message">
                            @foreach ($errors->get('password_confirmation') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-actions">
                <a class="login-link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="register-btn">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>

    <script>
        // Form progress indicator
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registerForm');
            const progressBar = document.getElementById('progressBar');
            const inputs = form.querySelectorAll('.form-input');
            
            function updateProgress() {
                const filledInputs = Array.from(inputs).filter(input => input.value.trim() !== '').length;
                const progress = (filledInputs / inputs.length) * 100;
                progressBar.style.width = progress + '%';
            }
            
            inputs.forEach(input => {
                input.addEventListener('input', updateProgress);
                input.addEventListener('blur', function() {
                    // Add visual feedback
                    if (this.value.trim() !== '') {
                        this.classList.add('valid');
                        this.classList.remove('invalid');
                    } else if (this.hasAttribute('required')) {
                        this.classList.add('invalid');
                        this.classList.remove('valid');
                    }
                });
            });
            
            // Password confirmation matching
            const password = document.getElementById('password');
            const passwordConfirm = document.getElementById('password_confirmation');
            
            function checkPasswordMatch() {
                if (password.value && passwordConfirm.value) {
                    if (password.value === passwordConfirm.value) {
                        passwordConfirm.classList.add('valid');
                        passwordConfirm.classList.remove('invalid');
                    } else {
                        passwordConfirm.classList.add('invalid');
                        passwordConfirm.classList.remove('valid');
                    }
                }
            }
            
            password.addEventListener('input', checkPasswordMatch);
            passwordConfirm.addEventListener('input', checkPasswordMatch);
            
            // Initial progress update
            updateProgress();
        });
    </script>
</body>
</html>