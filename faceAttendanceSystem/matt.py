# Connecting to mysql database
import mysql.connector
import numpy as np
import matplotlib.pyplot as plt


mydb = mysql.connector.connect(host="localhost",
							user="root",
							password="",
							database="face_attendance_system")
mycursor = mydb.cursor()

# Fecthing Data From mysql to my python progame
mycursor.execute("select NAME, Att from student_attendance_final")
result = mycursor.fetchall

NAME = []
Att = []

for i in mycursor:
	NAME.append(i[0])
	Att.append(i[1])
	
print("Name of Students = ", NAME)
print("Student Attendance = ", Att)


# Visulizing Data using Matplotlib
plt.bar(NAME, Att)
plt.ylim(0, 30)
plt.xlabel("Name of Students")
plt.ylabel("Student Attendance")
plt.title("Student's Information")
plt.show()
