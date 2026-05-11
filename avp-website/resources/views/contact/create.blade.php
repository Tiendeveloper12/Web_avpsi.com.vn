<!DOCTYPE html>
<html>
<head>
    <title>Contact Us | AVP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --color-primary: #2FAA4E;
            --color-primary-dark: #1F7A35;
            --color-primary-light: #4DBF64;
            --color-accent: #E31E24;
            --color-warning: #FFC107;
            --color-dark: #1a1a1a;
            --color-light: #f8f9fa;
            --color-text: #333333;
            --color-text-light: #666666;
            --color-border: #e0e0e0;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--color-text);
            background: #f4f7fb;
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        nav {
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid var(--color-border);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 76px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .nav-links {
            display: flex;
            gap: 28px;
            list-style: none;
        }

        .nav-links a {
            color: var(--color-text);
            font-size: 14px;
            font-weight: 500;
            position: relative;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--color-primary);
        }

        .hero {
            background: linear-gradient(135deg, #ffffff 0%, var(--color-light) 100%);
            padding: 100px 32px 60px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -35%;
            right: -20%;
            width: 650px;
            height: 650px;
            background: radial-gradient(circle, rgba(47, 170, 78, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 0;
        }

        .hero-content {
            max-width: 920px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .hero-content h1 {
            font-size: clamp(2.5rem, 4vw, 4rem);
            line-height: 1.05;
            margin-bottom: 24px;
            color: var(--color-dark);
        }

        .hero-content p {
            max-width: 700px;
            margin: 0 auto;
            color: var(--color-text-light);
            font-size: 1rem;
            line-height: 1.8;
        }

        .page-wrap {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 32px 80px;
            transform: translateY(-60px);
        }

        .contact-card {
            background: white;
            border-radius: 32px;
            box-shadow: 0 30px 90px rgba(8, 20, 40, 0.08);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1.05fr;
            gap: 0;
        }

        .contact-aside {
            padding: 48px;
            background: linear-gradient(180deg, rgba(47, 170, 78, 0.1), rgba(41, 115, 211, 0.04));
            border-right: 1px solid rgba(47, 170, 78, 0.12);
        }

        .contact-aside h2 {
            font-size: 28px;
            margin-bottom: 18px;
            color: var(--color-primary-dark);
        }

        .contact-aside p {
            color: var(--color-text-light);
            line-height: 1.8;
            margin-bottom: 28px;
        }

        .contact-aside .info-list {
            list-style: none;
            padding: 0;
            display: grid;
            gap: 16px;
        }

        .contact-aside .info-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--color-text);
            font-size: 0.95rem;
        }

        .contact-aside .info-list strong {
            min-width: 90px;
            color: var(--color-primary);
        }

        .contact-form {
            padding: 48px;
        }

        .contact-form h3 {
            font-size: 22px;
            margin-bottom: 18px;
            color: var(--color-dark);
        }

        .form-grid {
            display: grid;
            gap: 20px;
        }

        .form-group {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: 600;
            color: var(--color-text);
            font-size: 0.95rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 16px 18px;
            border-radius: 14px;
            border: 1px solid var(--color-border);
            background: #fbfcff;
            color: var(--color-text);
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            transition: var(--transition);
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 10px 30px rgba(47, 170, 78, 0.12);
        }

        textarea {
            min-height: 180px;
            resize: vertical;
        }

        .button-row {
            margin-top: 18px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 16px 28px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
            color: white;
            border: none;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 40px rgba(47, 170, 78, 0.22);
        }

        .success-message,
        .error-message {
            border-radius: 16px;
            padding: 18px 20px;
            margin-bottom: 22px;
            font-size: 0.95rem;
        }

        .success-message {
            background: rgba(47, 170, 78, 0.12);
            color: var(--color-primary-dark);
            border: 1px solid rgba(47, 170, 78, 0.2);
        }

        .error-message {
            background: rgba(227, 30, 36, 0.1);
            color: var(--color-accent);
            border: 1px solid rgba(227, 30, 36, 0.16);
        }

        .error-list {
            list-style: none;
            margin-top: 12px;
            padding-left: 18px;
        }

        .error-list li {
            margin-bottom: 10px;
        }

        footer {
            margin-top: 0;
            padding: 40px 32px 32px;
            background: white;
            border-top: 1px solid var(--color-border);
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            gap: 36px;
            flex-wrap: wrap;
        }

        .footer-section {
            min-width: 220px;
        }

        .footer-section h4 {
            font-size: 16px;
            margin-bottom: 16px;
            color: var(--color-dark);
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            display: grid;
            gap: 12px;
        }

        .footer-section a {
            color: var(--color-text-light);
            transition: var(--transition);
        }

        .footer-section a:hover {
            color: var(--color-primary);
        }

        .footer-bottom {
            margin-top: 30px;
            text-align: center;
            color: var(--color-text-light);
            font-size: 0.95rem;
        }

        @media (max-width: 1024px) {
            .hero {
                padding: 80px 24px 40px;
            }

            .page-wrap {
                padding: 0 24px 60px;
                transform: translateY(-50px);
            }

            .contact-card {
                grid-template-columns: 1fr;
            }

            .contact-aside,
            .contact-form {
                padding: 32px;
            }
        }

        @media (max-width: 720px) {
            .nav-container {
                padding: 0 20px;
            }

            .nav-links {
                gap: 18px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero-content h1 {
                font-size: 2.8rem;
            }

            .page-wrap {
                padding: 0 18px 40px;
                transform: translateY(-40px);
            }

            .contact-aside,
            .contact-form {
                padding: 24px;
            }

            .contact-aside {
                border-right: none;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="/" class="logo">AVP</a>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/blog">Blog</a>
                <a href="/products">Products</a>
                <a href="/gallery">Gallery</a>
                <a href="/contact">Contact</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Contact AVP</h1>
            <p>Have a question, project request, or partnership idea? Send us a message and our team will get back to you within one business day.</p>
        </div>
    </section>

    <main class="page-wrap">
        <section class="contact-card">
            <aside class="contact-aside">
                <h2>Let's talk</h2>
                <p>Share your requirements and we’ll help you find the best solution. Whether it’s a product inquiry, service question, or general feedback, we’re here to support your business.</p>

                <ul class="info-list">
                    <li><strong>Email:</strong> info@avp.com</li>
                    <li><strong>Phone:</strong> +1 (555) 123-4567</li>
                    <li><strong>Hours:</strong> Mon-Fri, 9am - 6pm</li>
                </ul>
            </aside>

            <div class="contact-form">
                <h3>Send us a message</h3>

                @if(session('success'))
                    <div class="success-message">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="error-message">
                        ✗ Please fix the following errors:
                        <ul class="error-list">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/contact">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">Full Name <span class="required">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Your full name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number <span class="required">*</span></label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Your phone number" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Message <span class="required">*</span></label>
                            <textarea id="content" name="content" placeholder="Please tell us more..." required>{{ old('content') }}</textarea>
                        </div>
                    </div>

                    <div class="button-row">
                        <button type="submit" class="btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h4>AVP</h4>
                <p>Delivering modern products and services with exceptional customer support.</p>
            </div>
            <div class="footer-section">
                <h4>Quick links</h4>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/products">Products</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <ul>
                    <li><a href="mailto:info@avp.com">info@avp.com</a></li>
                    <li><a href="tel:+15551234567">+1 (555) 123-4567</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">© {{ date('Y') }} AVP. All rights reserved.</div>
    </footer>
</body>
</html>