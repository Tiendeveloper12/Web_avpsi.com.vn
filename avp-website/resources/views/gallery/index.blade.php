<!DOCTYPE html>
<html>
<head>
    <title>Gallery - AVP</title>
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

        /* Top Controls */
        .gallery-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding: 20px;
            background: var(--color-light);
            border-radius: 12px;
            border: 1px solid var(--color-border);
            flex-wrap: wrap;
            gap: 16px;
        }

        .gallery-count {
            font-size: 14px;
            color: var(--color-text-light);
            font-weight: 500;
        }

        .gallery-controls {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .view-toggle {
            padding: 10px 16px;
            border: 1px solid var(--color-border);
            border-radius: 8px;
            background: white;
            color: var(--color-text);
            cursor: pointer;
            transition: var(--transition);
            font-size: 14px;
            font-family: 'Inter', sans-serif;
        }

        .view-toggle.active {
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
            color: white;
            border-color: var(--color-primary);
        }

        .view-toggle:hover {
            border-color: var(--color-primary);
            background: rgba(47, 170, 78, 0.02);
        }

        /* Gallery Grid */
        .galleries {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 32px;
            margin-bottom: 40px;
        }

        .gallery-card {
            background: white;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            overflow: hidden;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .gallery-card:hover {
            border-color: var(--color-primary);
            box-shadow: 0 16px 40px rgba(47, 170, 78, 0.12);
            transform: translateY(-8px);
        }

        .gallery-card-image {
            width: 100%;
            height: 240px;
            background: linear-gradient(135deg, rgba(47, 170, 78, 0.1), rgba(255, 193, 7, 0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            position: relative;
            overflow: hidden;
        }

        .gallery-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-card:hover .gallery-card-image img {
            transform: scale(1.05);
        }

        .gallery-card-image::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.1));
            pointer-events: none;
        }

        .gallery-card-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: var(--color-warning);
            color: var(--color-dark);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            z-index: 2;
        }

        .gallery-card-content {
            padding: 24px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .gallery-card h3 {
            font-size: 18px;
            font-weight: 600;
            color: var(--color-dark);
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .gallery-card p {
            font-size: 14px;
            color: var(--color-text-light);
            margin-bottom: 16px;
            line-height: 1.6;
            flex-grow: 1;
        }

        .gallery-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid var(--color-border);
        }

        .gallery-count-badge {
            font-size: 12px;
            color: var(--color-primary);
            font-weight: 600;
            background: rgba(47, 170, 78, 0.1);
            padding: 4px 10px;
            border-radius: 12px;
        }

        .gallery-link {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
        }

        .gallery-link:hover {
            color: var(--color-primary-dark);
            gap: 10px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 40px;
            background: var(--color-light);
            border-radius: 12px;
            border: 1px solid var(--color-border);
        }

        .empty-state h3 {
            font-size: 24px;
            margin-bottom: 12px;
            color: var(--color-dark);
        }

        .empty-state p {
            color: var(--color-text-light);
            margin-bottom: 24px;
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

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 40px;
        }

        .pagination .page-link {
            padding: 8px 12px;
            border: 1px solid var(--color-border);
            border-radius: 6px;
            background: white;
            color: var(--color-text);
            text-decoration: none;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: var(--transition);
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }

        .pagination .page-link:hover {
            border-color: var(--color-primary);
            background: rgba(47, 170, 78, 0.05);
            color: var(--color-primary);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
            color: white;
            border-color: var(--color-primary);
        }

        .pagination .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination .page-item {
            display: inline-block;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .galleries {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 24px;
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

            .page-header h1 {
                font-size: 32px;
            }

            .galleries {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 16px;
            }

            .gallery-card-image {
                height: 180px;
                font-size: 60px;
            }

            .gallery-top {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            .page-header {
                padding: 40px 20px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .galleries {
                grid-template-columns: 1fr;
            }

            .gallery-card-image {
                height: 200px;
                font-size: 60px;
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
            <h1>Gallery Collections</h1>
            <p>Explore our curated gallery collections showcasing our best work and visual inspiration.</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Top Controls -->
        <div class="gallery-top">
            <span class="gallery-count">Showing <strong>{{ count($galleries) }}</strong> galleries</span>
            <div class="gallery-controls">
                <button class="view-toggle active">Grid View</button>
                <button class="view-toggle">List View</button>
            </div>
        </div>

        <!-- Gallery Grid -->
        @if(count($galleries) > 0)
            <div class="galleries">
                @foreach($galleries as $gallery)
                    <div class="gallery-card">
                        <div class="gallery-card-image">
                            @if(isset($gallery->image) && $gallery->image)
                                <img src="/images/{{ $gallery->image }}" alt="{{ $gallery->title }}">
                            @else
                                🖼️
                            @endif
                            <span class="gallery-card-badge">Featured</span>
                        </div>
                        <div class="gallery-card-content">
                            <h3>{{ $gallery->title }}</h3>
                            <p>{{ Str::limit($gallery->description, 100) }}</p>
                        </div>
                        <div class="gallery-card-footer">
                            <span class="gallery-count-badge">View Collection</span>
                            <a href="/gallery/{{ $gallery->id }}" class="gallery-link">Open →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h3>No Galleries Found</h3>
                <p>Check back soon for new collections</p>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>About AVP</h4>
                <p style="color: rgba(255, 255, 255, 0.7); font-size: 14px; margin-top: 12px;">Your trusted partner for quality products and exceptional service since day one.</p>
            </div>
            <div class="footer-section">
                <h4>Gallery</h4>
                <ul>
                    <li><a href="/gallery">All Collections</a></li>
                    <li><a href="/gallery">Featured</a></li>
                    <li><a href="/gallery">Recent</a></li>
                    <li><a href="/gallery">Popular</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Company</h4>
                <ul>
                    <li><a href="/">About Us</a></li>
                    <li><a href="/products">Products</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/contact">Contact</a></li>
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