import subprocess

brands = {
    'sub-apple': ['Apple'],
    'sub-dell': ['Dell'],
    'sub-hp': ['HP'],
    'sub-lenovo': ['Lenovo'],
    'sub-asus': ['ASUS'],
    'sub-msi': ['MSI'],
    'sub-acer': ['Acer'],
    'sub-gigabyte': ['Gigabyte'],
    'sub-huawei': ['Huawei'],
    'sub-samsung': ['Samsung'],
    'sub-khac': ['Corsair', 'CyberPowerPC', 'Intel', 'Fujitsu']
}

def run_query(query):
    subprocess.run(['mysql', '-u', 'root', '-pPatterson3994', 'avpsicby_db', '-e', query], check=True)

for tag, keywords in brands.items():
    for kw in keywords:
        print(f"Updating PC products for brand: {kw} -> tag: {tag}")
        query = f"UPDATE product SET tags = CONCAT(tags, ',{tag}') WHERE tags LIKE '%pc%' AND title LIKE '%{kw}%' AND tags NOT LIKE '%{tag}%';"
        run_query(query)

print("PC tag updates complete.")
