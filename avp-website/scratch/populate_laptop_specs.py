import subprocess

specs_data = [
    ("Apple MacBook Air 13 M3", "Apple M3 / Integrated GPU / 16GB Unified Memory / 512GB SSD / 13.6-inch Liquid Retina"),
    ("Apple MacBook Pro 14 M4 Pro", "Apple M4 Pro / Integrated GPU / 24GB Unified Memory / 1TB SSD / 14.2-inch Liquid Retina XDR"),
    ("ASUS ROG Strix G16", "i9-14900HX / RTX 4070 / 32GB DDR5 / 1TB SSD / 240Hz QHD"),
    ("ASUS TUF Gaming A15", "Ryzen 7 8845HS / RTX 4060 / 16GB DDR5 / 1TB SSD / 144Hz FHD"),
    ("Lenovo Legion Pro 5", "Ryzen 9 7945HX / RTX 4070 / 32GB DDR5 / 1TB SSD / 240Hz QHD"),
    ("Lenovo IdeaPad Slim 5", "Ryzen 7 8845HS / Radeon Graphics / 16GB DDR5 / 512GB SSD / 16-inch WUXGA"),
    ("Dell XPS 13", "Intel Core Ultra 7 155H / Intel Arc Graphics / 16GB LPDDR5X / 1TB SSD / 13.4-inch 3K OLED"),
    ("Dell Inspiron 15", "i7-1355U / Intel Iris Xe / 16GB DDR4 / 512GB SSD / 15.6-inch FHD"),
    ("HP Victus 15", "Ryzen 7 8845HS / RTX 4060 / 16GB DDR5 / 1TB SSD / 144Hz FHD"),
    ("HP Pavilion 14", "i5-1335U / Intel Iris Xe / 16GB DDR4 / 512GB SSD / 14-inch FHD"),
    ("Acer Nitro V 15", "i7-13620H / RTX 4050 / 16GB DDR5 / 512GB SSD / 144Hz FHD"),
    ("Acer Aspire 5", "Ryzen 7 7730U / Radeon Graphics / 16GB DDR4 / 512GB SSD / 15.6-inch FHD"),
    ("MSI Katana 15", "i7-13620H / RTX 4070 / 16GB DDR5 / 1TB SSD / 144Hz FHD"),
    ("MSI Modern 14", "i5-1335U / Intel Iris Xe / 16GB DDR4 / 512GB SSD / 14-inch FHD"),
    ("Razer Blade 16", "i9-14900HX / RTX 4090 / 32GB DDR5 / 2TB SSD / 240Hz QHD+"),
    ("Microsoft Surface Laptop 6", "Intel Core Ultra 7 / Intel Arc Graphics / 16GB LPDDR5X / 512GB SSD / 15-inch PixelSense"),
    ("LG Gram 16", "Intel Core Ultra 7 / Intel Arc Graphics / 16GB LPDDR5X / 1TB SSD / 16-inch WQXGA"),
    ("Huawei MateBook D 16", "i9-13900H / Intel Iris Xe / 16GB DDR4 / 1TB SSD / 16-inch FHD+"),
    ("Gigabyte G5 KF", "i7-12650H / RTX 4060 / 16GB DDR4 / 512GB SSD / 144Hz FHD"),
    ("Samsung Galaxy Book4 Pro", "Intel Core Ultra 7 / Intel Arc Graphics / 16GB LPDDR5X / 1TB SSD / 16-inch AMOLED 120Hz")
]

def run_query(query):
    subprocess.run(['mysql', '-u', 'root', '-pPatterson3994', 'avpsicby_db', '-e', query], check=True)

for title, specs in specs_data:
    print(f"Updating specs for: {title}")
    safe_specs = specs.replace("'", "\\'")
    query = f"UPDATE product SET specs = '{safe_specs}' WHERE title LIKE '%{title}%';"
    run_query(query)

print("Laptop specs population complete.")
