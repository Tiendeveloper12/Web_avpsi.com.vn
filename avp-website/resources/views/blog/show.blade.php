<!DOCTYPE html>
<html>
<head>
    <title>{{ $article->title }} - AVP Blog</title>
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
            max-width: 900px;
            margin: 0 auto;
            padding: 60px 40px;
        }

        /* Back Link */
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

        /* Article Header */
        .article-header {
            margin-bottom: 40px;
        }

        .article-category {
            display: inline-block;
            background: rgba(47, 170, 78, 0.1);
            color: var(--color-primary);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 16px;
            letter-spacing: 0.5px;
        }

        .article-title {
            font-size: 42px;
            font-weight: 700;
            color: var(--color-dark);
            margin-bottom: 16px;
            line-height: 1.3;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 24px;
            padding-bottom: 24px;
            border-bottom: 2px solid var(--color-border);
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--color-text-light);
        }

        .meta-label {
            font-weight: 600;
            color: var(--color-text);
        }

        /* Article Content */
        .article-content {
            font-size: 16px;
            line-height: 1.9;
            color: var(--color-text);
            margin: 40px 0;
        }

        .article-content h2 {
            font-size: 28px;
            margin: 40px 0 16px 0;
            color: var(--color-dark);
            line-height: 1.3;
        }

        .article-content h3 {
            font-size: 22px;
            margin: 32px 0 12px 0;
            color: var(--color-dark);
            line-height: 1.3;
        }

        .article-content h4 {
            font-size: 18px;
            margin: 24px 0 8px 0;
            color: var(--color-dark);
        }

        .article-content p {
            margin-bottom: 16px;
        }

        .article-content ul {
            margin: 16px 0 16px 24px;
            list-style: disc;
        }

        .article-content ul li {
            margin-bottom: 12px;
        }

        .article-content ol {
            margin: 16px 0 16px 24px;
            list-style: decimal;
        }

        .article-content ol li {
            margin-bottom: 12px;
        }

        .article-content blockquote {
            margin: 24px 0;
            padding: 20px 24px;
            background: linear-gradient(135deg, rgba(47, 170, 78, 0.08), rgba(255, 193, 7, 0.05));
            border-left: 4px solid var(--color-primary);
            border-radius: 8px;
            font-style: italic;
            color: var(--color-text-light);
        }

        .article-content code {
            background: var(--color-light);
            padding: 2px 8px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            color: var(--color-accent);
        }

        .article-content pre {
            background: var(--color-dark);
            color: #fff;
            padding: 16px;
            border-radius: 8px;
            overflow-x: auto;
            margin: 20px 0;
            font-size: 14px;
            line-height: 1.6;
        }

        .article-content a {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .article-content a:hover {
            color: var(--color-primary-dark);
            text-decoration: underline;
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 24px 0;
            border: 1px solid var(--color-border);
        }

        /* Article Footer */
        .article-footer {
            margin: 60px 0;
            padding: 40px;
            background: linear-gradient(135deg, rgba(47, 170, 78, 0.05), rgba(255, 193, 7, 0.03));
            border: 1px solid var(--color-border);
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .article-footer-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .article-footer-icon {
            font-size: 32px;
            width: 50px;
            height: 50px;
            background: rgba(47, 170, 78, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .article-footer-text h4 {
            font-size: 16px;
            color: var(--color-dark);
            margin-bottom: 4px;
        }

        .article-footer-text p {
            font-size: 13px;
            color: var(--color-text-light);
            margin: 0;
        }

        .article-actions {
            display: flex;
            gap: 12px;
        }

        .share-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--color-border);
            background: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: var(--transition);
        }

        .share-btn:hover {
            border-color: var(--color-primary);
            background: rgba(47, 170, 78, 0.05);
            transform: translateY(-2px);
        }

        /* Related Articles */
        .related-section {
            margin: 80px 0 40px 0;
            padding: 40px;
            background: var(--color-light);
            border-radius: 12px;
            border: 1px solid var(--color-border);
        }

        .related-section h2 {
            font-size: 24px;
            color: var(--color-dark);
            margin-bottom: 24px;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
        }

        .related-card {
            background: white;
            border: 1px solid var(--color-border);
            border-radius: 8px;
            padding: 16px;
            transition: var(--transition);
        }

        .related-card:hover {
            border-color: var(--color-primary);
            box-shadow: 0 8px 20px rgba(47, 170, 78, 0.12);
        }

        .related-card a {
            text-decoration: none;
            color: var(--color-dark);
            font-weight: 600;
            font-size: 16px;
            display: block;
            margin-bottom: 8px;
            transition: var(--transition);
        }

        .related-card:hover a {
            color: var(--color-primary);
        }

        .related-date {
            font-size: 12px;
            color: var(--color-text-light);
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

            .article-title {
                font-size: 32px;
            }

            .page-header h1 {
                font-size: 32px;
            }

            .article-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .article-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .page-header {
                padding: 40px 20px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .article-title {
                font-size: 24px;
            }

            .article-content {
                font-size: 15px;
            }

            .article-content h2 {
                font-size: 22px;
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
            <h1>Blog Article</h1>
            <p>Read our latest insights, tips, and industry knowledge from our expert team.</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Back Link -->
        <a href="/blog" class="back-link">← Back to Blog</a>

        <!-- Article Header -->
        <article>
            <header class="article-header">
                <div class="article-category">Article</div>
                <h1 class="article-title">{{ $article->title }}</h1>
                <div class="article-meta">
                    <div class="meta-item">
                        <span class="meta-label">Published:</span>
                        {{ $article->created_at ? \Carbon\Carbon::parse($article->created_at)->format('M d, Y') : 'Recently' }}
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Reading Time:</span>
                        {{ ceil(str_word_count(strip_tags($article->content)) / 200) }} min read
                    </div>
                </div>
            </header>

            <!-- Article Content -->
            <div class="article-content">
                {!! $article->content !!}
            </div>

            <!-- Article Footer -->
            <div class="article-footer">
                <div class="article-footer-info">
                    <div class="article-footer-icon">✍️</div>
                    <div class="article-footer-text">
                        <h4>Written by AVP Team</h4>
                        <p>Industry experts sharing valuable insights</p>
                    </div>
                </div>
                <div class="article-actions">
                    <button class="share-btn" title="Share on Facebook">f</button>
                    <button class="share-btn" title="Share on Twitter">𝕏</button>
                    <button class="share-btn" title="Share on LinkedIn">in</button>
                </div>
            </div>
        </article>
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
                    <li><a href="/blog">Blog</a></li>
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