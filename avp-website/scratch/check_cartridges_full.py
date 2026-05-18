import subprocess
import os

cartridges = [
    'HP 67 Black Ink Cartridge', 'HP 67 Tri-Color Ink Cartridge', 'HP 680 Black Ink Cartridge', 'HP 680 Color Ink Cartridge',
    'HP 954 Black Ink Cartridge', 'HP GT53 Black Ink Bottle', 'HP GT52 Color Ink Bottle', 'Epson 003 Black Ink Bottle',
    'Epson 003 Cyan Ink Bottle', 'Epson 003 Magenta Ink Bottle', 'Epson 003 Yellow Ink Bottle', 'Epson 664 Black Ink Bottle',
    'Epson 664 Cyan Ink Bottle', 'Epson T673 Photo Black Ink Bottle', 'OKI C332 Black Toner Cartridge',
    'OKI C332 Cyan Toner Cartridge', 'OKI C332 Magenta Toner Cartridge', 'OKI C332 Yellow Toner Cartridge',
    'OKI B412 Black Toner Cartridge', 'OKI MC363 Black Toner Cartridge', 'OKI MC363 Cyan Toner Cartridge',
    'Canon GI-790 Black Ink Bottle', 'Canon GI-790 Cyan Ink Bottle', 'Canon GI-790 Magenta Ink Bottle',
    'Canon GI-790 Yellow Ink Bottle', 'Canon PG-745 Black Ink Cartridge', 'Canon CL-746 Color Ink Cartridge',
    'Canon Cartridge 325 Toner', 'Brother BT-D60 Black Ink Bottle', 'Brother BT5000 Cyan Ink Bottle',
    'Brother BT5000 Magenta Ink Bottle', 'Brother BT5000 Yellow Ink Bottle', 'Brother TN-2385 Black Toner Cartridge',
    'Brother TN-261 Cyan Toner Cartridge', 'Brother TN-261 Magenta Toner Cartridge', 'Ricoh SP C250 Black Toner Cartridge',
    'Ricoh SP C250 Cyan Toner Cartridge', 'Ricoh SP C250 Magenta Toner Cartridge', 'Ricoh SP C250 Yellow Toner Cartridge',
    'Ricoh MP C3503 Black Toner Cartridge', 'Ricoh MP C3503 Cyan Toner Cartridge', 'Ricoh MP C3503 Magenta Toner Cartridge'
]

results = []
for c in cartridges:
    # Check live DB
    query = f"SELECT title FROM product WHERE title = '{c}' LIMIT 1;"
    cmd_live = ["mysql", "-u", "root", "-pPatterson3994", "avpsicby_db", "-e", query]
    in_live = False
    try:
        out_live = subprocess.check_output(cmd_live, text=True, stderr=subprocess.STDOUT)
        if c in out_live:
            in_live = True
    except:
        pass
    
    # Check localhost.sql
    # Use grep/Select-String to find the line
    cmd_sql = f'Select-String -Path database/localhost.sql -Pattern "{c}"'
    in_sql = False
    try:
        out_sql = subprocess.check_output(["powershell", "-Command", cmd_sql], text=True, stderr=subprocess.STDOUT)
        if c in out_sql:
            in_sql = True
    except:
        pass
    
    # Check image file
    img_path = f"public/images/products/{c}.jpg"
    has_img = os.path.exists(img_path)
    
    results.append(f"{c}|{'YES' if in_live else 'NO'}|{'YES' if in_sql else 'NO'}|{'YES' if has_img else 'NO'}")

with open('scratch/cartridge_comprehensive_check.txt', 'w', encoding='utf-8') as f:
    f.write("Title|In Live DB|In localhost.sql|Has Image\n")
    f.write('\n'.join(results))

print("Results written to scratch/cartridge_comprehensive_check.txt")
