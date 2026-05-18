import subprocess
import re

# Database Tagging
mapping = {
    'sub-cham-cong': [349, 350, 351, 352, 353],
    'sub-huy-giay': [354, 355, 356, 357, 358],
    'sub-in-bill': [359, 360, 361, 362, 363],
    'sub-scan': [364, 365, 366, 367, 368],
    'sub-chieu': [369, 370, 371, 372, 373]
}

def run_query(query):
    subprocess.run(['mysql', '-u', 'root', '-pPatterson3994', 'avpsicby_db', '-e', query], check=True)

for tag, ids in mapping.items():
    id_list = ",".join(map(str, ids))
    print(f"Updating products {id_list} with tag {tag}")
    query = f"UPDATE product SET tags = CONCAT(tags, ',{tag}') WHERE id IN ({id_list}) AND tags NOT LIKE '%{tag}%';"
    run_query(query)

# SQL Sync
with open('database/localhost.sql', 'r', encoding='utf-8') as f:
    lines = f.readlines()

new_lines = []
current_table = None

for line in lines:
    if 'INSERT INTO `product` (' in line:
        current_table = 'product'
    elif 'INSERT INTO `' in line:
        current_table = None
    
    if current_table == 'product' and line.strip().startswith('('):
        match_id = re.match(r"^\s*\((\d+),", line)
        if match_id:
            pid = int(match_id.group(1))
            for tag, ids in mapping.items():
                if pid in ids:
                    # Find tags field
                    pattern = rf"^(\s*\({pid},\s*'[^']*',\s*(?:'[^']*'|[^,]+),\s*(?:'[^']*'|[^,]+),\s*(?:'[^']*'|[^,]+),\s*\d+,\s*\d+,\s*[\d\.]+,\s*'[^']*',\s*\d+,\s*')([^']*)(')"
                    match_tags = re.search(pattern, line)
                    if match_tags:
                        existing_tags = match_tags.group(2)
                        if tag not in existing_tags:
                            new_tags = existing_tags
                            if new_tags and not new_tags.endswith(','): new_tags += ','
                            new_tags += tag
                            line = line.replace(f"'{existing_tags}'", f"'{new_tags}'", 1)
                    break
    new_lines.append(line)

with open('database/localhost.sql', 'w', encoding='utf-8') as f:
    f.write(''.join(new_lines))

print("Tagged office products and synchronized localhost.sql.")
