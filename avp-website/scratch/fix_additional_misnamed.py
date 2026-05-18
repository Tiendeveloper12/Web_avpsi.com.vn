import subprocess
import re

corrections = [
    {'old': 'TP-Lmuc Deco X20', 'new': 'TP-Link Deco X20'},
    {'old': 'TP-Lmuc Archer C6', 'new': 'TP-Link Archer C6'},
    {'old': 'Lmucsys MR7350', 'new': 'Linksys MR7350'}
]

def slugify(text):
    text = text.lower()
    text = re.sub(r'[^a-z0-9]+', '-', text)
    return text.strip('-')

def run_query(query):
    subprocess.run(['mysql', '-u', 'root', '-pPatterson3994', 'avpsicby_db', '-e', query], check=True)

for c in corrections:
    old = c['old']
    new = c['new']
    img = f"{new}.jpg"
    new_slug = slugify(new)
    
    query = f"SELECT id FROM product WHERE title = '{old}';"
    try:
        out = subprocess.check_output(['mysql', '-u', 'root', '-pPatterson3994', 'avpsicby_db', '-N', '-e', query], text=True).strip()
        if out:
            ids = out.split('\n')
            for pid in ids:
                pid = pid.strip()
                print(f"Fixing {pid}: {old} -> {new}")
                run_query(f"UPDATE product SET title = '{new}', image = '{img}', raw_title = '{new.lower()}' WHERE id = {pid};")
                run_query(f"UPDATE product_translations SET title = '{new}' WHERE product_id = {pid};")
                run_query(f"UPDATE slug SET handle = '{new_slug}' WHERE post_id = {pid} AND post_type = 'product';")
    except Exception as e:
        print(f"Error fixing {old}: {e}")

# Global replace in localhost.sql
with open('database/localhost.sql', 'r', encoding='utf-8') as f:
    sql = f.read()

for c in corrections:
    old = c['old']
    new = c['new']
    sql = sql.replace(old, new)
    sql = sql.replace(old.lower().replace(' ', '-'), new.lower().replace(' ', '-'))
    sql = sql.replace(old.lower(), new.lower())
    sql = sql.replace(f"{old}.jpg", f"{new}.jpg")

with open('database/localhost.sql', 'w', encoding='utf-8') as f:
    f.write(sql)

print("Additional fixes complete.")
