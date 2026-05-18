import subprocess
import os

items = [
    'Ổ cứng SSD/ HDD', 'Mainboard', 'Switch', 'Màn Hình Vi Tính - LCD', 'Nguồn Arrow 500w',
    'Phần Mềm Diệt Virus Kaspersky', 'Bộ Bàn phím và chuột Logitech', 'ộ Bàn phím và chuột Dell',
    'Bộ phát Wifi 4G TP-Link M7350', 'Tai nghe HP', 'Core i3 - 9100', 'Ram Kingmax',
    'Ram (Bộ nhớ trong)', 'Nhân RJ45', 'Box 2.5 Urgreen'
]

results = []
for item in items:
    # Use partial matching to be safe
    # Filter out common Vietnamese characters that might cause issues in LIKE if not handled well
    safe_item = item.replace("'", "''")
    query = f"SELECT id, title, tags FROM product WHERE title LIKE '%{safe_item}%';"
    cmd = ["mysql", "-u", "root", "-pPatterson3994", "avpsicby_db", "-e", query]
    try:
        out = subprocess.check_output(cmd, text=True, stderr=subprocess.STDOUT)
        if "id" in out:
            results.append(f"QUERY: {item}\n{out.strip()}")
        else:
            results.append(f"QUERY: {item} -> NOT FOUND")
    except Exception as e:
        results.append(f"QUERY: {item} -> ERROR: {str(e)}")

with open('scratch/accessory_check_final.txt', 'w', encoding='utf-8') as f:
    f.write('\n\n'.join(results))

print("Results written to scratch/accessory_check_final.txt")
