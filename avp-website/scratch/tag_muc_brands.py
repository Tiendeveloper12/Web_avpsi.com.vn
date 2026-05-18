import subprocess

brands = {
    'sub-avp': 'AVP',
    'sub-hp': 'HP',
    'sub-epson': 'Epson',
    'sub-oki': 'OKI',
    'sub-canon': 'Canon',
    'sub-brother': 'Brother',
    'sub-ricoh': 'Ricoh'
}

def run_query(query):
    subprocess.run(['mysql', '-u', 'root', '-pPatterson3994', 'avpsicby_db', '-e', query], check=True)

for tag, brand in brands.items():
    print(f"Updating products for brand: {brand} -> tag: {tag}")
    # Search for titles starting with brand name
    # We append the tag to existing tags
    query = f"UPDATE product SET tags = CONCAT(tags, ',{tag}') WHERE tags LIKE '%muc%' AND title LIKE '{brand}%' AND tags NOT LIKE '%{tag}%';"
    run_query(query)

print("Tag updates complete.")
