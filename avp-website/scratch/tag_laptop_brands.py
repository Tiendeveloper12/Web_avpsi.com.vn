import subprocess

brands = {
    'sub-macbook': ['Apple', 'MacBook'],
    'sub-asus': ['ASUS'],
    'sub-lenovo': ['Lenovo'],
    'sub-dell': ['Dell'],
    'sub-hp': ['HP'],
    'sub-acer': ['Acer'],
    'sub-msi': ['MSI'],
    'sub-razer': ['Razer'],
    'sub-microsoft': ['Microsoft'],
    'sub-lg': ['LG'],
    'sub-huawei': ['Huawei'],
    'sub-gigabyte': ['Gigabyte'],
    'sub-samsung': ['Samsung']
}

def run_query(query):
    subprocess.run(['mysql', '-u', 'root', '-pPatterson3994', 'avpsicby_db', '-e', query], check=True)

for tag, keywords in brands.items():
    for kw in keywords:
        print(f"Updating laptop products for brand: {kw} -> tag: {tag}")
        query = f"UPDATE product SET tags = CONCAT(tags, ',{tag}') WHERE tags LIKE '%laptop%' AND title LIKE '%{kw}%' AND tags NOT LIKE '%{tag}%';"
        run_query(query)

print("Laptop tag updates complete.")
