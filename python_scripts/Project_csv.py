import string
import random
import datetime

creator = ["UDKA", "ABCN", "HADP"]
status = "1"
res_row = ""

for id in range(5, 41):
    start_date = datetime.date(2021, 1, 1)
    end_date = datetime.date(2029, 1, 1)

    time_between_dates = end_date - start_date
    days_between_dates = time_between_dates.days
    random_number_of_days = random.randrange(days_between_dates)
    s_random_date = start_date + datetime.timedelta(days=random_number_of_days)

    random_number_of_days = random.randrange(days_between_dates)
    d_random_date = start_date + datetime.timedelta(days=random_number_of_days)

    while(s_random_date > d_random_date):
        random_number_of_days = random.randrange(days_between_dates)
        d_random_date = start_date + datetime.timedelta(days=random_number_of_days)
        
    number = ""
    for i in range(4):
        number += str(random.randint(1,9))
    for i in range(3):
        number += random.choice(string.ascii_uppercase)

    name = "Version "
    name += random.choice(string.ascii_uppercase)
    
    res_row = ""
    res_row += str(id) + ";" + number + ";" + name + ";" + random.choice(creator) + ";" + str(s_random_date) + ";" + str(d_random_date) + ";" + status + "\n"

    with open('projects.csv', 'a') as file:
        file.write(res_row)
    
        
