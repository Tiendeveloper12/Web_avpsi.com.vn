import subprocess

brands = {
    'sub-hp': 'HP',
    'sub-canon': 'Canon',
    'sub-brother': 'Brother',
    'sub-epson': 'Epson',
    'sub-xerox': 'Xerox',
    'sub-pantum': 'Pantum'
}

def run_query(query):
    subprocess.run(['mysql', '-u', 'root', '-pPatterson3994', 'avpsicby_db', '-e', query], check=True)

for tag, brand in brands.items():
    print(f"Updating printer products for brand: {brand} -> tag: {tag}")
    # Search for titles containing brand name (better than starting with for variety)
    query = f"UPDATE product SET tags = CONCAT(tags, ',{tag}') WHERE tags LIKE '%printer%' AND title LIKE '%{brand}%' AND tags NOT LIKE '%{tag}%';"
    run_query(query)

print("Printer tag updates complete.")
