<!DOCTYPE html>
<html>
<head>
    <title>Products - AVP</title>
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

        .products-wrapper {
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

        .filter-section {
            background: white;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .filter-section h3 {
            font-size: 16px;
            margin-bottom: 16px;
            color: var(--color-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-title-icon {
            width: 20px;
            height: 20px;
            background: linear-gradient(135deg, rgba(47, 170, 78, 0.15), rgba(255, 193, 7, 0.1));
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .filter-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            cursor: pointer;
        }

        .filter-item input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--color-primary);
        }

        .filter-item label {
            cursor: pointer;
            font-size: 14px;
            color: var(--color-text-light);
            flex: 1;
            transition: var(--transition);
        }

        .filter-item:hover label {
            color: var(--color-primary);
        }

        .filter-count {
            font-size: 12px;
            color: #999;
            margin-left: auto;
        }

        /* Search Bar */
        .search-section {
            background: white;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .search-section input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
        }

        .search-section input::placeholder {
            color: #ccc;
        }

        .search-icon {
            color: var(--color-text-light);
            font-size: 18px;
        }

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 32px;
        }

        .product-card {
            background: white;
            border: 1px solid var(--color-border);
            border-radius: 12px;
            overflow: hidden;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            border-color: var(--color-primary);
            box-shadow: 0 16px 40px rgba(47, 170, 78, 0.12);
            transform: translateY(-8px);
        }

        .product-image {
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

        .product-image::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.1));
        }

        .product-badge {
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

        .product-content {
            padding: 24px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-category {
            font-size: 12px;
            color: var(--color-primary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .product-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--color-dark);
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .product-description {
            font-size: 14px;
            color: var(--color-text-light);
            margin-bottom: 16px;
            line-height: 1.6;
            flex-grow: 1;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid var(--color-border);
        }

        .product-price {
            font-size: 18px;
            font-weight: 700;
            color: var(--color-primary);
        }

        .product-link {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
        }

        .product-link:hover {
            color: var(--color-primary-dark);
            gap: 10px;
        }

        /* Top Bar Controls */
        .products-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            padding: 20px;
            background: var(--color-light);
            border-radius: 12px;
            border: 1px solid var(--color-border);
        }

        .products-count {
            font-size: 14px;
            color: var(--color-text-light);
            font-weight: 500;
        }

        .sort-dropdown {
            padding: 10px 16px;
            border: 1px solid var(--color-border);
            border-radius: 8px;
            background: white;
            color: var(--color-text);
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: var(--transition);
            font-size: 14px;
        }

        .sort-dropdown:hover {
            border-color: var(--color-primary);
            background: rgba(47, 170, 78, 0.02);
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
            .products-wrapper {
                grid-template-columns: 200px 1fr;
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .products-wrapper {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 20px;
            }

            .products-top {
                flex-direction: column;
                gap: 16px;
                align-items: flex-start;
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
        }

        @media (max-width: 480px) {
            .products-grid {
                grid-template-columns: 1fr;
            }

            .filter-section {
                display: none;
            }

            .page-header h1 {
                font-size: 24px;
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
            <h1>Our Products</h1>
            <p>Discover our comprehensive range of high-quality products and solutions designed for your business needs.</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Top Controls -->
        <div class="products-top">
            <span class="products-count">Showing <strong>{{ $products->count() }}</strong> products</span>
            <select class="sort-dropdown">
                <option>Sort by: Newest</option>
                <option>Sort by: Price (Low to High)</option>
                <option>Sort by: Price (High to Low)</option>
                <option>Sort by: Most Popular</option>
            </select>
        </div>

        <div class="products-wrapper">
            <!-- Sidebar Filters -->
            <aside class="sidebar">
                <!-- Search -->
                <div class="search-section">
                    <span class="search-icon">🔍</span>
                    <input type="text" placeholder="Search products...">
                </div>

                <!-- Category Filter -->
                <div class="filter-section">
                    <h3>
                        <span class="filter-title-icon">📁</span>
                        Categories
                    </h3>
                    <div class="filter-item">
                        <input type="checkbox" id="cat-all" checked>
                        <label for="cat-all">All Products</label>
                        <span class="filter-count">{{ $products->count() }}</span>
                    </div>
                    <div class="filter-item">
                        <input type="checkbox" id="cat-featured">
                        <label for="cat-featured">Featured</label>
                        <span class="filter-count">12</span>
                    </div>
                    <div class="filter-item">
                        <input type="checkbox" id="cat-new">
                        <label for="cat-new">New Arrivals</label>
                        <span class="filter-count">8</span>
                    </div>
                    <div class="filter-item">
                        <input type="checkbox" id="cat-sale">
                        <label for="cat-sale">On Sale</label>
                        <span class="filter-count">5</span>
                    </div>
                </div>

                <!-- Price Filter -->
                <div class="filter-section">
                    <h3>
                        <span class="filter-title-icon">💰</span>
                        Price Range
                    </h3>
                    <div class="filter-item">
                        <input type="checkbox" id="price-all" checked>
                        <label for="price-all">All Prices</label>
                    </div>
                    <div class="filter-item">
                        <input type="checkbox" id="price-low">
                        <label for="price-low">Under $100</label>
                    </div>
                    <div class="filter-item">
                        <input type="checkbox" id="price-mid">
                        <label for="price-mid">$100 - $500</label>
                    </div>
                    <div class="filter-item">
                        <input type="checkbox" id="price-high">
                        <label for="price-high">$500+</label>
                    </div>
                </div>

                <!-- Status Filter -->
                <div class="filter-section">
                    <h3>
                        <span class="filter-title-icon">✓</span>
                        Status
                    </h3>
                    <div class="filter-item">
                        <input type="checkbox" id="status-all" checked>
                        <label for="status-all">All Products</label>
                    </div>
                    <div class="filter-item">
                        <input type="checkbox" id="status-stock">
                        <label for="status-stock">In Stock</label>
                    </div>
                    <div class="filter-item">
                        <input type="checkbox" id="status-pre">
                        <label for="status-pre">Pre-Order</label>
                    </div>
                </div>
            </aside>

            <!-- Products Grid -->
            <main>
                @if($products->count() > 0)
                    <div class="products-grid">
                        @foreach($products as $product)
                            <div class="product-card">
                                <div class="product-image">
                                    📦
                                    <span class="product-badge">New</span>
                                </div>
                                <div class="product-content">
                                    <span class="product-category">Product</span>
                                    <h3 class="product-title">{{ $product->title }}</h3>
                                    <p class="product-description">
                                        {{ Str::limit($product->description, 100) }}
                                    </p>
                                </div>
                                <div class="product-footer">
                                    <span class="product-price">$99.99</span>
                                    <a href="/products/{{ $product->id }}" class="product-link">View →</a>
                                </div>
                            </div>
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
                        <h3>No Products Found</h3>
                        <p>Try adjusting your filters or search terms</p>
                        <a href="/products" style="color: var(--color-primary); text-decoration: none; font-weight: 600;">Reset Filters</a>
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
                <h4>Products</h4>
                <ul>
                    <li><a href="/products">All Products</a></li>
                    <li><a href="/products">Featured Items</a></li>
                    <li><a href="/products">New Arrivals</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Company</h4>
                <ul>
                    <li><a href="/blog">Blog</a></li>
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