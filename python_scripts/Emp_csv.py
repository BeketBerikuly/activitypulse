from csv import reader
import csv
import pandas as pd
import string
import random

column_names = ["Employee_Name", "EmpID", "MarriedID", "MaritalStatusID","GenderID", "EmpStatusID","DeptID","PerfScoreID","FromDiversityJobFairID","Salary","Termd","PositionID","Position","State","Zip","DOB","Sex","MaritalDesc","CitizenDesc","HispanicLatino","RaceDesc","DateofHire","DateofTermination","TermReason","EmploymentStatus","Department","ManagerName","ManagerID","RecruitmentSource","PerformanceScore","EngagementSurvey","EmpSatisfaction","SpecialProjectsCount","LastPerformanceReview_Date","DaysLateLast30","Absences"]
df = pd.read_csv("hr.csv", names=column_names)

names = df.Employee_Name.to_list()
names.pop(0)

id = 4
avatar_id = 4
j_title = "Developer"
password = "DemoUserTest123"
isAvailable = "1"
res_row = ""
r_list = []
s_list = []
for name in names:
    if(id == 81):
        break
    if(avatar_id == 21):
        avatar_id = 4
    img = "avatar" + str(avatar_id) + ".jpg"


    initial = ""
    for i in range(4):
        initial += random.choice(string.ascii_uppercase)
    
    res_row = ""
    res_row += str(id) + ";" + initial + ";" + name + ";" + img + ";" + j_title + ";" + isAvailable + ";" + password + "\n"

    with open('employees.csv', 'a') as file:
        file.write(res_row)
            
    avatar_id += 1
    id += 1

