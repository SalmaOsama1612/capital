<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPITAL - Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .home-section {
            text-align: center;
            max-width: 800px;
            padding: 0 20px;
        }

        .logo {
            font-size: 64px;
            font-weight: bold;
            color: #fbbf24;
            margin-bottom: 30px;
            letter-spacing: 3px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .tagline {
            font-size: 28px;
            font-weight: 300;
            color: #e5e7eb;
            margin-bottom: 20px;
            line-height: 1.4;
        }

        .description {
            font-size: 18px;
            color: #d1d5db;
            margin-bottom: 40px;
            line-height: 1.6;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 16px 32px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary {
            background: #fbbf24;
            color: #1f2937;
        }

        .btn-primary:hover {
            background: #f59e0b;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(251, 191, 36, 0.3);
        }

        .btn-secondary {
            background: transparent;
            color: #fbbf24;
            border: 2px solid #fbbf24;
        }

        .btn-secondary:hover {
            background: #fbbf24;
            color: #1f2937;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .logo {
                font-size: 48px;
            }
            
            .tagline {
                font-size: 24px;
            }
            
            .description {
                font-size: 16px;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 250px;
            }
        }
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

        .login-container {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(218, 165, 32, 0.3);
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.5),
                0 0 100px rgba(218, 165, 32, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
        }

        .login-container::before {
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

    </style>
</head>
<body>
    <section class="home-section">
        <div class="logo">CAPITAL</div>
        <h1 class="tagline">Premium Finishing Solutions</h1>
        <p class="description">
            Transform your space with our expert finishing services. We deliver exceptional quality and craftsmanship for residential and commercial projects.
        </p>
        <div class="cta-buttons">
            <a href="" class="btn btn-primary">Home</a>
            <a href="/login" class="btn btn-secondary">Run As Admin</a>
        </div>
    </section>
</body>
</html>