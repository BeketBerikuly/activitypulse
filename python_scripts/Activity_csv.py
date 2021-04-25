import pandas as pd
import string
import random

column_names = ["number"]
df = pd.read_csv("projects_x.csv", names=column_names)

activity_names = ["Design of communication module", "Complete preparation of new work area", "Enterprise Environmental Factor", "Scope baseline being the primary input" , "Following are five time management"]

p_numbers = df.number.to_list()
p_numbers.pop(0)

res_row = ""
for id in range(1, 801):
    p_number = random.choice(p_numbers)
    p_substr = p_number[:4] 
    a_number = str(random.randint(1,20))
    a_number = p_substr + "-" + a_number
    a_name = random.choice(activity_names)
    status = random.randint(0, 1)
    progress = random.randint(0, 100)
    spent = str(random.randint(1,60)) + ":" + str(random.randint(1,59))
    remain = str(random.randint(1,60)) + ":" + str(random.randint(1,59))

    spent_list = spent.split(":")
    remain_list = remain.split(":")
    
    total = int(spent_list[0]) * 60 + int(spent_list[1]) + int(remain_list[0]) * 60 + int(remain_list[1])
    hours = total // 60
    minutes = total % 60

    total_time = "%2d:%02d" % (hours, minutes)
    
    res_row = ""
    res_row += str(id) + ";" + p_number + ";" + a_number + ";" + a_name + ";" + spent + ";" + remain + ";" + str(status) + ";" + str(progress) + ";" + total_time + "\n"

           
    with open('activities.csv', 'a') as file:
        file.write(res_row)
