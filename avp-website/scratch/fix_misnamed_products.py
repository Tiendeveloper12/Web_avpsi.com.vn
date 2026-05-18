import subprocess
import re

corrections = [
    {"old_title": "Lenovo ThmucCentre M70t Gen 4", "new_title": "Lenovo ThinkCentre M70t Gen 4", "new_img": "Lenovo ThinkCentre M70t Gen 4.jpg"},
    {"old_title": "TP-Lmuc Archer AX55", "new_title": "TP-Link Archer AX55", "new_img": "TP-Link Archer AX55.jpg"},
    {"old_title": "TP-Lmuc Archer C54", "new_title": "TP-Link Archer C54", "new_img": "TP-Link Archer C54.jpg"},
    {"old_title": "TP-Lmuc TL-SG108", "new_title": "TP-Link TL-SG108", "new_img": "TP-Link TL-SG108.jpg"},
    {"old_title": "TP-Lmuc TL-SG1005D", "new_title": "TP-Link TL-SG1005D", "new_img": "TP-Link TL-SG1005D.jpg"},
    {"old_title": "D-Lmuc DGS-108", "new_title": "D-Link DGS-108", "new_img": "D-Link DGS-108.jpg"}
]

def slugify(text):
    text = text.lower()
    text = re.sub(r'[^a-z0-9]+', '-', text)
    return text.strip('-')

def run_query(query):
    cmd = ["mysql", "-u", "root", "-pPatterson3994", "avpsicby_db", "-e", query]
    subprocess.run(cmd, check=True)

for corr in corrections:
    old = corr["old_title"]
    new = corr["new_title"]
    img = corr["new_img"]
    new_slug = slugify(new)
    
    # Get IDs
    query = f"SELECT id FROM product WHERE title = '{old}';"
    try:
        out = subprocess.check_output(["mysql", "-u", "root", "-pPatterson3994", "avpsicby_db", "-N", "-e", query], text=True).strip()
        if not out:
            print(f"No products found for '{old}'")
            continue
        ids = out.split('\n')
        for pid in ids:
            pid = pid.strip()
            print(f"Updating ID {pid}: {old} -> {new}")
            
            # 1. Update product
            raw_title = new.lower()
            # We don't have the full description here easily, but we can just update the title and image
            # Actually, raw_full contains description. Let's just update title, image, and raw_title.
            update_prod = f"UPDATE product SET title = '{new}', image = '{img}', raw_title = '{raw_title}' WHERE id = {pid};"
            run_query(update_prod)
            
            # 2. Update product_translations
            update_trans = f"UPDATE product_translations SET title = '{new}' WHERE product_id = {pid};"
            run_query(update_trans)
            
            # 3. Update slug
            update_slug = f"UPDATE slug SET handle = '{new_slug}' WHERE post_id = {pid} AND post_type = 'product';"
            run_query(update_slug)
            
    except Exception as e:
        print(f"Error processing {old}: {e}")

print("Database updates complete.")
