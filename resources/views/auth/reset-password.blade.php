<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELDORK - Reset Password</title>
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

        .reset-container {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(218, 165, 32, 0.3);
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 480px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.5),
                0 0 100px rgba(218, 165, 32, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
            margin: 20px;
            animation: slideIn 0.5s ease-out;
        }

        .reset-container::before {
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
            margin-bottom: 20px;
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
            font-size: 1.1em;
            margin-bottom: 15px;
            font-weight: 300;
        }

        .security-notice {
            background: rgba(218, 165, 32, 0.1);
            border: 1px solid rgba(218, 165, 32, 0.2);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 25px;
            color: #e6e6e6;
            font-size: 0.85em;
            line-height: 1.5;
            text-align: center;
            position: relative;
        }

        .security-notice::before {
            content: '🔒';
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            padding: 6px 10px;
            border-radius: 50%;
            font-size: 1.1em;
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
            position: relative;
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

        .form-input.readonly {
            background: rgba(255, 255, 255, 0.02);
            border-color: rgba(218, 165, 32, 0.2);
            opacity: 0.8;
        }

        .password-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #DAA520;
            cursor: pointer;
            font-size: 1.1em;
            padding: 5px;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .password-toggle:hover {
            color: #FFD700;
            background: rgba(218, 165, 32, 0.1);
        }

        .password-strength {
            margin-top: 8px;
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            border-radius: 2px;
            transition: all 0.3s ease;
            width: 0%;
        }

        .strength-weak { background: #ef4444; }
        .strength-fair { background: #f59e0b; }
        .strength-good { background: #eab308; }
        .strength-strong { background: #22c55e; }

        .password-requirements {
            margin-top: 10px;
            padding: 12px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            border-left: 3px solid #DAA520;
        }

        .requirement {
            display: flex;
            align-items: center;
            font-size: 0.8em;
            margin-bottom: 5px;
            color: #888;
        }

        .requirement:last-child {
            margin-bottom: 0;
        }

        .requirement.met {
            color: #22c55e;
        }

        .requirement::before {
            content: '○';
            margin-right: 8px;
            font-weight: bold;
        }

        .requirement.met::before {
            content: '●';
            color: #22c55e;
        }

        .reset-btn {
            background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
            color: #000;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 
                0 5px 15px rgba(218, 165, 32, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            width: 100%;
            margin-top: 20px;
            position: relative;
            overflow: hidden;
        }

        .reset-btn:hover {
            background: linear-gradient(135deg, #FFD700 0%, #DAA520 100%);
            transform: translateY(-2px);
            box-shadow: 
                0 8px 25px rgba(218, 165, 32, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .reset-btn:active {
            transform: translateY(0);
        }

        .reset-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
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

        /* Password match indicator */
        .match-indicator {
            position: absolute;
            right: 45px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.9em;
            padding: 3px;
            border-radius: 3px;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .match-indicator.show {
            opacity: 1;
        }

        .match-indicator.match {
            color: #22c55e;
        }

        .match-indicator.no-match {
            color: #ef4444;
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

        /* Responsive design */
        @media (max-width: 480px) {
            .reset-container {
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
        }

        /* Entry animation */
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
    <div class="reset-container">
        <div class="logo">
           <h1>Capital</h1>
            <p>Construction Company</p>
        </div>
        
        <div class="subtitle">Create New Password</div>
        <div class="accent-line"></div>

        <div class="security-notice">
            Choose a strong password to secure your account. Your new password should be unique and not used elsewhere.
        </div>

        <form method="POST" action="{{ route('password.store') }}" id="resetForm">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input 
                    id="email" 
                    class="form-input readonly" 
                    type="email" 
                    name="email" 
                    value="{{ old('email', $request->email) }}" 
                    required 
                    autofocus 
                    autocomplete="username"
                    readonly
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
                <!-- New Password -->
                <div class="form-group">
                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                    <div class="password-field">
                        <input 
                            id="password" 
                            class="form-input"
                            type="password"
                            name="password"
                            required 
                            autocomplete="new-password"
                            placeholder="Enter new password"
                        />
                        <button type="button" class="password-toggle" id="togglePassword">👁️</button>
                    </div>
                    <div class="password-strength">
                        <div class="password-strength-bar" id="strengthBar"></div>
                    </div>
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
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <div class="password-field">
                        <input 
                            id="password_confirmation" 
                            class="form-input"
                            type="password"
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            placeholder="Confirm password"
                        />
                        <button type="button" class="password-toggle" id="toggleConfirm">👁️</button>
                        <span class="match-indicator" id="matchIndicator">✓</span>
                    </div>
                    @if ($errors->get('password_confirmation'))
                        <div class="error-message">
                            @foreach ($errors->get('password_confirmation') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Password Requirements -->
            <div class="password-requirements">
                <div class="requirement" id="req-length">At least 8 characters long</div>
                <div class="requirement" id="req-uppercase">Contains uppercase letter</div>
                <div class="requirement" id="req-lowercase">Contains lowercase letter</div>
                <div class="requirement" id="req-number">Contains at least one number</div>
                <div class="requirement" id="req-special">Contains special character</div>
            </div>

            <button type="submit" class="reset-btn" id="submitBtn">
                {{ __('Reset Password') }}
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');
            const strengthBar = document.getElementById('strengthBar');
            const matchIndicator = document.getElementById('matchIndicator');
            const submitBtn = document.getElementById('submitBtn');
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirm = document.getElementById('toggleConfirm');

            // Password requirements
            const requirements = {
                length: /^.{8,}$/,
                uppercase: /[A-Z]/,
                lowercase: /[a-z]/,
                number: /\d/,
                special: /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/
            };

            // Toggle password visibility
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;
                this.textContent = type === 'password' ? '👁️' : '🙈';
            });

            toggleConfirm.addEventListener('click', function() {
                const type = confirmInput.type === 'password' ? 'text' : 'password';
                confirmInput.type = type;
                this.textContent = type === 'password' ? '👁️' : '🙈';
            });

            // Check password strength
            function checkPasswordStrength(password) {
                let score = 0;
                
                Object.values(requirements).forEach(regex => {
                    if (regex.test(password)) score++;
                });

                return score;
            }

            // Update strength bar
            function updateStrengthBar(score) {
                const percentage = (score / 5) * 100;
                strengthBar.style.width = percentage + '%';
                
                strengthBar.className = 'password-strength-bar';
                if (score === 0) strengthBar.classList.add('strength-weak');
                else if (score <= 2) strengthBar.classList.add('strength-weak');
                else if (score <= 3) strengthBar.classList.add('strength-fair');
                else if (score <= 4) strengthBar.classList.add('strength-good');
                else strengthBar.classList.add('strength-strong');
            }

            // Update requirements display
            function updateRequirements(password) {
                Object.keys(requirements).forEach(req => {
                    const element = document.getElementById('req-' + req);
                    if (requirements[req].test(password)) {
                        element.classList.add('met');
                    } else {
                        element.classList.remove('met');
                    }
                });
            }

            // Check password match
            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirm = confirmInput.value;
                
                if (confirm === '') {
                    matchIndicator.classList.remove('show');
                    confirmInput.classList.remove('valid', 'invalid');
                    return;
                }
                
                matchIndicator.classList.add('show');
                
                if (password === confirm) {
                    matchIndicator.classList.add('match');
                    matchIndicator.classList.remove('no-match');
                    matchIndicator.textContent = '✓';
                    confirmInput.classList.add('valid');
                    confirmInput.classList.remove('invalid');
                } else {
                    matchIndicator.classList.add('no-match');
                    matchIndicator.classList.remove('match');
                    matchIndicator.textContent = '✗';
                    confirmInput.classList.add('invalid');
                    confirmInput.classList.remove('valid');
                }
            }

            // Validate form
            function validateForm() {
                const password = passwordInput.value;
                const confirm = confirmInput.value;
                const strength = checkPasswordStrength(password);
                const passwordsMatch = password === confirm;
                
                if (strength >= 3 && passwordsMatch && password.length > 0) {
                    submitBtn.disabled = false;
                    passwordInput.classList.add('valid');
                    passwordInput.classList.remove('invalid');
                } else {
                    submitBtn.disabled = true;
                    if (password.length > 0 && strength < 3) {
                        passwordInput.classList.add('invalid');
                        passwordInput.classList.remove('valid');
                    }
                }
            }

            // Event listeners
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                const strength = checkPasswordStrength(password);
                
                updateStrengthBar(strength);
                updateRequirements(password);
                checkPasswordMatch();
                validateForm();
            });

            confirmInput.addEventListener('input', function() {
                checkPasswordMatch();
                validateForm();
            });

            // Form submission
            document.getElementById('resetForm').addEventListener('submit', function(e) {
                const password = passwordInput.value;
                const confirm = confirmInput.value;
                const strength = checkPasswordStrength(password);
                
                if (strength < 3 || password !== confirm) {
                    e.preventDefault();
                    alert('Please ensure your password meets all requirements and both passwords match.');
                    return;
                }
                
                submitBtn.textContent = 'Resetting Password...';
                submitBtn.disabled = true;
            });

            // Initial validation
            validateForm();
        });
    </script>
</body>
</html>