import json
with open('scratch/products_utf8.json', 'r', encoding='utf-8-sig') as f:
    data = json.load(f)

linh_kien = [p for p in data if p.get('Tag') == 'linh-kien']
print(f"Total linh-kien: {len(linh_kien)}")

with open('scratch/linh_kien_17.json', 'w', encoding='utf-8') as f:
    json.dump(linh_kien[:17], f, ensure_ascii=False, indent=2)
