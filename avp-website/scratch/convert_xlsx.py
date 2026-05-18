import pandas as pd
try:
    df = pd.read_excel('products.xlsx')
    df.to_csv('products.csv', index=False)
    print("Successfully converted products.xlsx to products.csv")
except Exception as e:
    print(f"Error: {e}")
