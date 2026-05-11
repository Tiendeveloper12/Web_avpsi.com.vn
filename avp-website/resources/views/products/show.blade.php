<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->title }} - AVP</title>
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
            background: #ffffff;
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        /* Navigation */
        nav {
            background: white;
            border-bottom: 1px solid var(--color-border);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 75px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-family: 'Poppins', sans-serif;
            letter-spacing: -0.5px;
            cursor: pointer;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 35px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--color-text);
            font-weight: 500;
            font-size: 14px;
            position: relative;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--color-primary);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--color-primary), var(--color-warning));
            border-radius: 2px;
            transition: var(--transition);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .phone-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: rgba(227, 30, 36, 0.08);
            border-radius: 25px;
            color: var(--color-accent);
            font-weight: 600;
            font-size: 13px;
            text-decoration: none;
            transition: var(--transition);
        }

        .phone-badge:hover {
            background: rgba(227, 30, 36, 0.15);
            transform: translateY(-2px);
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #ffffff 0%, var(--color-light) 100%);
            padding: 60px 40px;
            border-bottom: 1px solid var(--color-border);
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(47, 170, 78, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 0;
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .page-header h1 {
            font-size: 44px;
            margin-bottom: 12px;
            color: var(--color-dark);
        }

        .page-header p {
            font-size: 16px;
            color: var(--color-text-light);
            max-width: 600px;
        }

        /* Main Content */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 40px;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;
            font-size: 14px;
            color: var(--color-text-light);
        }

        .breadcrumb a {
            color: var(--color-primary);
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .breadcrumb a:hover {
            color: var(--color-primary-dark);
        }

        /* Product Detail Section */
        .product-detail-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }

        .product-image-section {
            background: linear-gradient(135deg, rgba(47, 170, 78, 0.1), rgba(255, 193, 7, 0.1));
            border-radius: 16px;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 400px;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--color-border);
        }

        .product-image-section::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.1));
            pointer-events: none;
        }

        .product-image-icon {
            font-size: 120px;
            opacity: 0.8;
            z-index: 1;
        }

        .product-info-section {
            display: flex;
            flex-direction: column;
        }

        .product-category {
            font-size: 12px;
            color: var(--color-primary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
        }

        .product-title {
            font-size: 42px;
            font-weight: 700;
            color: var(--color-dark);
            margin-bottom: 24px;
            line-height: 1.3;
        }

        .product-price {
            font-size: 32px;
            font-weight: 700;
            color: var(--color-primary);
            margin-bottom: 32px;
            padding-bottom: 32px;
            border-bottom: 2px solid var(--color-border);
        }

        .product-description {
            font-size: 16px;
            color: var(--color-text-light);
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .product-details {
            background: var(--color-light);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 40px;
            border: 1px solid var(--color-border);
        }

        .product-details h3 {
            font-size: 16px;
            color: var(--color-dark);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .product-details-content {
            font-size: 14px;
            color: var(--color-text);
            line-height: 1.8;
        }

        .product-details-content h4 {
            font-size: 14px;
            font-weight: 600;
            margin-top: 16px;
            margin-bottom: 8px;
            color: var(--color-dark);
        }

        .product-details-content p {
            margin-bottom: 12px;
        }

        .product-details-content ul {
            margin-left: 20px;
            margin-bottom: 12px;
        }

        .product-details-content li {
            margin-bottom: 8px;
        }

        .action-buttons {
            display: flex;
            gap: 16px;
            margin-bottom: 40px;
        }

        .btn {
            padding: 14px 32px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(47, 170, 78, 0.3);
        }

        .btn-secondary {
            background: white;
            color: var(--color-primary);
            border: 2px solid var(--color-primary);
        }

        .btn-secondary:hover {
            background: rgba(47, 170, 78, 0.05);
            transform: translateY(-2px);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 40px;
            transition: var(--transition);
        }

        .back-link:hover {
            color: var(--color-primary-dark);
            gap: 12px;
        }

        /* Footer */
        footer {
            background: var(--color-dark);
            color: white;
            padding: 60px 40px 30px;
            margin-top: 80px;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h4 {
            font-family: 'Poppins', sans-serif;
            margin-bottom: 16px;
            font-size: 16px;
            color: var(--color-warning);
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 14px;
            transition: var(--transition);
        }

        .footer-section a:hover {
            color: var(--color-warning);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .product-detail-wrapper {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .product-title {
                font-size: 32px;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .container {
                padding: 40px 20px;
            }

            .nav-container {
                padding: 0 20px;
            }

            .product-image-section {
                min-height: 300px;
                padding: 30px;
            }

            .product-image-icon {
                font-size: 80px;
            }

            .product-title {
                font-size: 28px;
            }

            .product-price {
                font-size: 24px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .page-header h1 {
                font-size: 32px;
            }
        }

        @media (max-width: 480px) {
            .page-header {
                padding: 40px 20px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .product-title {
                font-size: 22px;
            }

            .product-price {
                font-size: 20px;
            }

            .container {
                padding: 30px 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <a href="/" class="logo">AVP</a>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/products">Products</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/gallery">Gallery</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
            <div class="nav-right">
                <a href="/contact" class="phone-badge">📞 Call Us</a>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="header-container">
            <h1>Product Details</h1>
            <p>Discover comprehensive information about this product and how it can benefit you.</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Breadcrumb -->
        <a href="/products" class="back-link">← Back to Products</a>

        <!-- Product Detail Section -->
        <div class="product-detail-wrapper">
            <!-- Product Image -->
            <div class="product-image-section">
                <div class="product-image-icon">📦</div>
            </div>

            <!-- Product Info -->
            <div class="product-info-section">
                <div class="product-category">Product</div>
                <h1 class="product-title">{{ $product->title }}</h1>
                <!-- <div class="product-price">${{ $product->price ?? 'Contact for pricing' }}</div> -->

                <p class="product-description">
                    {{ $product->description }}
                </p>

                <!-- Product Details -->
                <div class="product-details">
                    <h3>📋 Product Details</h3>
                    <div class="product-details-content">
                        {!! $product->content !!}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button class="btn btn-primary">Add to Cart</button>
                    <button class="btn btn-secondary">Request Information</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>About AVP</h4>
                <p style="color: rgba(255, 255, 255, 0.7); font-size: 14px; margin-top: 12px;">Your trusted partner for quality products and exceptional service since day one.</p>
            </div>
            <div class="footer-section">
                <h4>Products</h4>
                <ul>
                    <li><a href="/products">All Products</a></li>
                    <li><a href="/products">Featured</a></li>
                    <li><a href="/products">New Arrivals</a></li>
                    <li><a href="/products">Best Sellers</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Company</h4>
                <ul>
                    <li><a href="/">About Us</a></li>
                    <li><a href="/">Careers</a></li>
                    <li><a href="/">Blog</a></li>
                    <li><a href="/">Press</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Support</h4>
                <ul>
                    <li><a href="/contact">Contact Us</a></li>
                    <li><a href="/">FAQ</a></li>
                    <li><a href="/">Help Center</a></li>
                    <li><a href="/">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 AVP. All rights reserved. | Our Mission is Satisfy Your Needing</p>
        </div>
    </footer>
</body>
</html>