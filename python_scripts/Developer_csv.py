import pandas as pd
import string
import random

res_row = ""
for id in range(1,801): 
    
    emp_id = str(random.randint(1, 80))
    
    res_row = ""
    res_row += str(id) + ";" + emp_id + ";" + str(id) + "\n"

    with open('developer.csv', 'a') as file:
        file.write(res_row)
