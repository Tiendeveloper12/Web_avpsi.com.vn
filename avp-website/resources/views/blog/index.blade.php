<!DOCTYPE html>
<html>
<head>
    <title>Blog & Articles - AVP</title>
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

        .blog-wrapper {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 40px;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 100px;
            height: fit-content;
        }

        .sidebar-section {
            background: white;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .sidebar-section h3 {
            font-size: 16px;
            margin-bottom: 16px;
            color: var(--color-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-icon {
            width: 20px;
            height: 20px;
            background: linear-gradient(135deg, rgba(47, 170, 78, 0.15), rgba(255, 193, 7, 0.1));
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        /* Categories */
        .category-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--color-border);
            cursor: pointer;
            transition: var(--transition);
        }

        .category-item:last-child {
            border-bottom: none;
        }

        .category-item a {
            text-decoration: none;
            color: var(--color-text-light);
            font-size: 14px;
            flex: 1;
            transition: var(--transition);
        }

        .category-item:hover a {
            color: var(--color-primary);
        }

        .category-count {
            background: rgba(47, 170, 78, 0.1);
            color: var(--color-primary);
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Search */
        .search-box {
            background: white;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .search-box input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
        }

        .search-box input::placeholder {
            color: #ccc;
        }

        .search-icon {
            color: var(--color-text-light);
            font-size: 18px;
        }

        /* Recent Posts */
        .recent-posts {
            padding: 0;
        }

        .recent-item {
            padding: 16px 0;
            border-bottom: 1px solid var(--color-border);
            cursor: pointer;
            transition: var(--transition);
        }

        .recent-item:last-child {
            border-bottom: none;
        }

        .recent-item:hover {
            padding-left: 8px;
        }

        .recent-item a {
            text-decoration: none;
            color: var(--color-text);
            font-weight: 500;
            font-size: 14px;
            display: block;
            margin-bottom: 6px;
            transition: var(--transition);
        }

        .recent-item:hover a {
            color: var(--color-primary);
        }

        .recent-date {
            font-size: 12px;
            color: var(--color-text-light);
        }

        /* Featured Article */
        .featured-article {
            background: linear-gradient(135deg, rgba(47, 170, 78, 0.1), rgba(255, 193, 7, 0.05));
            border: 2px solid var(--color-primary);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 32px;
            position: relative;
            overflow: hidden;
        }

        .featured-badge {
            display: inline-block;
            background: var(--color-warning);
            color: var(--color-dark);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
        }

        .featured-article h3 {
            font-size: 22px;
            margin-bottom: 12px;
            color: var(--color-dark);
            line-height: 1.3;
        }

        .featured-article p {
            font-size: 14px;
            color: var(--color-text-light);
            margin-bottom: 16px;
            line-height: 1.6;
        }

        .featured-meta {
            display: flex;
            gap: 16px;
            font-size: 12px;
            color: var(--color-text-light);
            margin-bottom: 16px;
        }

        .featured-link {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
        }

        .featured-link:hover {
            color: var(--color-primary-dark);
            gap: 10px;
        }

        /* Articles Grid */
        .articles-section {
            margin-bottom: 40px;
        }

        .articles-header {
            margin-bottom: 32px;
        }

        .articles-header h2 {
            font-size: 28px;
            color: var(--color-dark);
            margin-bottom: 8px;
        }

        .articles-header p {
            color: var(--color-text-light);
            font-size: 14px;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 32px;
        }

        .article-card {
            background: white;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            overflow: hidden;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .article-card:hover {
            border-color: var(--color-primary);
            box-shadow: 0 16px 40px rgba(47, 170, 78, 0.12);
            transform: translateY(-8px);
        }

        .article-image {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, rgba(47, 170, 78, 0.1), rgba(255, 193, 7, 0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            position: relative;
            overflow: hidden;
        }

        .article-image::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.1));
        }

        .article-content {
            padding: 24px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
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
            margin-bottom: 12px;
            width: fit-content;
            letter-spacing: 0.5px;
        }

        .article-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--color-dark);
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .article-excerpt {
            font-size: 14px;
            color: var(--color-text-light);
            margin-bottom: 16px;
            line-height: 1.6;
            flex-grow: 1;
        }

        .article-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid var(--color-border);
            font-size: 12px;
            color: var(--color-text-light);
        }

        .article-date {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .article-readtime {
            background: rgba(47, 170, 78, 0.08);
            padding: 4px 10px;
            border-radius: 12px;
            color: var(--color-primary);
            font-weight: 600;
        }

        .article-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
        }

        .article-author {
            font-size: 12px;
            color: var(--color-text-light);
        }

        .read-more {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
        }

        .read-more:hover {
            color: var(--color-primary-dark);
            gap: 10px;
        }

        /* Empty State */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 40px;
            background: var(--color-light);
            border-radius: 12px;
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

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 60px;
        }

        .pagination a,
        .pagination button {
            padding: 10px 14px;
            border: 1px solid var(--color-border);
            border-radius: 8px;
            background: white;
            color: var(--color-text);
            text-decoration: none;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            transition: var(--transition);
            font-size: 14px;
        }

        .pagination a:hover,
        .pagination button:hover {
            border-color: var(--color-primary);
            background: rgba(47, 170, 78, 0.05);
            color: var(--color-primary);
        }

        .pagination .active {
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
            color: white;
            border-color: var(--color-primary);
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
            .blog-wrapper {
                grid-template-columns: 200px 1fr;
                gap: 30px;
            }

            .articles-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .blog-wrapper {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }

            .articles-grid {
                grid-template-columns: 1fr;
            }

            .page-header h1 {
                font-size: 32px;
            }

            .nav-links {
                display: none;
            }

            .container {
                padding: 40px 20px;
            }

            .nav-container {
                padding: 0 20px;
            }

            .featured-article {
                padding: 16px;
            }

            .featured-article h3 {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .articles-grid {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .articles-header h2 {
                font-size: 22px;
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
            <h1>Blog & Articles</h1>
            <p>Discover insights, tips, and industry news from our expert team. Stay informed with our latest articles and thought leadership.</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <div class="blog-wrapper">
            <!-- Sidebar -->
            <aside class="sidebar">
                <!-- Search -->
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text" placeholder="Search articles...">
                </div>

                <!-- Featured Article Section -->
                @if($articles->first())
                    <div class="featured-article">
                        <span class="featured-badge">Featured</span>
                        <h3>{{ $articles->first()->title }}</h3>
                        <p>{{ Str::limit($articles->first()->description, 150) }}</p>
                        <div class="featured-meta">
                            <span>📅 {{ $articles->first()->created_at->format('M d, Y') }}</span>
                            <span>⏱️ 5 min read</span>
                        </div>
                        <a href="/blog/{{ $articles->first()->id }}" class="featured-link">Read Article →</a>
                    </div>
                @endif

                <!-- Categories -->
                <div class="sidebar-section">
                    <h3>
                        <span class="section-icon">📁</span>
                        Categories
                    </h3>
                    <div class="category-item">
                        <a href="/blog?category=all">All Articles</a>
                        <span class="category-count">{{ $articles->count() }}</span>
                    </div>
                    <div class="category-item">
                        <a href="/blog?category=news">News</a>
                        <span class="category-count">12</span>
                    </div>
                    <div class="category-item">
                        <a href="/blog?category=tips">Tips & Tricks</a>
                        <span class="category-count">18</span>
                    </div>
                    <div class="category-item">
                        <a href="/blog?category=industry">Industry Updates</a>
                        <span class="category-count">9</span>
                    </div>
                    <div class="category-item">
                        <a href="/blog?category=guides">Guides</a>
                        <span class="category-count">15</span>
                    </div>
                </div>

                <!-- Recent Posts -->
                <div class="sidebar-section recent-posts">
                    <h3>
                        <span class="section-icon">📌</span>
                        Recent Posts
                    </h3>
                    @foreach($articles->take(5) as $article)
                        <div class="recent-item">
                            <a href="/blog/{{ $article->id }}">{{ Str::limit($article->title, 40) }}</a>
                            <span class="recent-date">{{ $article->created_at->format('M d, Y') }}</span>
                        </div>
                    @endforeach
                </div>
            </aside>

            <!-- Articles Section -->
            <main>
                <!-- Articles Header -->
                <div class="articles-header">
                    <h2>Latest Articles</h2>
                    <p>Discover our most recent content and industry insights</p>
                </div>

                <!-- Articles Grid -->
                @if($articles->count() > 0)
                    <div class="articles-grid">
                        @foreach($articles as $article)
                            <article class="article-card">
                                <div class="article-image">
                                    📰
                                </div>
                                <div class="article-content">
                                    <span class="article-category">Article</span>
                                    <h3 class="article-title">{{ $article->title }}</h3>
                                    <p class="article-excerpt">{{ Str::limit($article->description, 120) }}</p>
                                </div>
                                <div class="article-meta">
                                    <div class="article-date">
                                        📅 {{ $article->created_at->format('M d, Y') }}
                                    </div>
                                    <span class="article-readtime">5 min</span>
                                </div>
                                <div class="article-footer">
                                    <span class="article-author">By AVP Team</span>
                                    <a href="/blog/{{ $article->id }}" class="read-more">Read →</a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination">
                        <a href="#">← Previous</a>
                        <button class="active">1</button>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">Next →</a>
                    </div>
                @else
                    <div class="empty-state">
                        <h3>No Articles Found</h3>
                        <p>Try adjusting your search or category filters</p>
                        <a href="/blog" style="color: var(--color-primary); text-decoration: none; font-weight: 600;">View All Articles</a>
                    </div>
                @endif
            </main>
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
                <h4>Blog</h4>
                <ul>
                    <li><a href="/blog">All Articles</a></li>
                    <li><a href="/blog">Latest Posts</a></li>
                    <li><a href="/blog">Categories</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Company</h4>
                <ul>
                    <li><a href="/products">Products</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Support</h4>
                <ul>
                    <li><a href="/contact">Get Help</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                    <li><a href="tel:0912979394">Hotline: 0912 97 9394</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 AVP. All rights reserved. | Our Mission is Satisfy Your Needing</p>
        </div>
    </footer>
</body>
</html>