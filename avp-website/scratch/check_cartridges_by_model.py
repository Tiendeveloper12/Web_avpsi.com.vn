import subprocess
import os
import re

cartridges = [
    ('HP 67', '67'), ('HP 680', '680'), ('HP 954', '954'), ('HP GT53', 'GT53'), ('HP GT52', 'GT52'),
    ('Epson 003', '003'), ('Epson 664', '664'), ('Epson T673', 'T673'),
    ('OKI C332', 'C332'), ('OKI B412', 'B412'), ('OKI MC363', 'MC363'),
    ('Canon GI-790', 'GI-790'), ('Canon PG-745', 'PG-745'), ('Canon CL-746', 'CL-746'), ('Canon 325', '325'),
    ('Brother BT-D60', 'BT-D60'), ('Brother BT5000', 'BT5000'), ('Brother TN-2385', 'TN-2385'), ('Brother TN-261', 'TN-261'),
    ('Ricoh SP C250', 'C250'), ('Ricoh MP C3503', 'C3503')
]

results = []
for display, model in cartridges:
    query = f"SELECT title, image FROM product WHERE title LIKE '%{model}%' LIMIT 5;"
    cmd = ["mysql", "-u", "root", "-pPatterson3994", "avpsicby_db", "-e", query]
    try:
        out = subprocess.check_output(cmd, text=True, stderr=subprocess.STDOUT)
        if "title" in out:
            lines = out.strip().split('\n')
            if len(lines) > 1:
                results.append(f"Model {model}:")
                for line in lines[1:]:
                    results.append(f"  - {line}")
            else:
                results.append(f"Model {model}: NOT FOUND")
        else:
            results.append(f"Model {model}: NOT FOUND")
    except Exception as e:
        results.append(f"Model {model}: ERROR ({str(e)})")

with open('scratch/cartridge_model_check.txt', 'w', encoding='utf-8') as f:
    f.write('\n'.join(results))

print("Results written to scratch/cartridge_model_check.txt")
