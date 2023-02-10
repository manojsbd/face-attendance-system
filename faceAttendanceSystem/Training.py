# We are using a library called face_recognition which helps us to detect, recognize, train and encode any 
# faces. 
# HOG representation --> detection of face_recognition
# Dlib --> Landmarks
# Open face--> previously trained neural network--> encoding 128 measurement
# library used 
# 1. Cmake 
# 2. Dlib 
# 3. face_recognition
# 4. Numpy
# 5.Open cv
# ---------------------------------------------------------------------------------------------------------------
# IMPORTING THE LIBRARY
# ---------------------------------------------------------------------------------------------------------------
import cv2
import numpy as np
import face_recognition
# from tkinter import messagebox
from tkinter import *







# ---------------------------------------------------------------------------------------------------------------
# LOADING THE IMAGES 
# ---------------------------------------------------------------------------------------------------------------
# loading rajesh hamal image from training_rajesh_hamal folder
imgRajesh = face_recognition.load_image_file('training_rajesh_hamal/Rajesh Hamal.jpg')
#converting rajesh hamal image into rgb
imgRajesh = cv2.cvtColor(imgRajesh, cv2.COLOR_BGR2RGB)
# loading rajesh hamal image from training_rajesh_hamal folder for test image
imgTest = face_recognition.load_image_file('training_rajesh_hamal/Rajesh Hamal Test.jpg')
# imgWhite = face_recognition.load_image_file('training_rajesh_hamal/White.jpg')

#converting rajesh hamal image into rgb for test image
imgTest = cv2.cvtColor(imgTest, cv2.COLOR_BGR2RGB)
# ---------------------------------------------------------------------------------------------------------------
# FIND FACE IN IMAGE AND ENCODE FACE 
# ---------------------------------------------------------------------------------------------------------------
#imapge ma face find garney
faceLoc = face_recognition.face_locations(imgRajesh)[0]
#found face lai encode garney
encodeRajesh = face_recognition.face_encodings(imgRajesh)[0]
#drawing circle around face [cv2.circle (image_name,(x1,y1),(x2,y2)) color]
cv2.rectangle(imgRajesh, (faceLoc[3], faceLoc[0]), (faceLoc[1], faceLoc[2]),(0, 171, 255), 2)
# ---------------------------------------------------------------------------------------------------------------
# FIND FACE IN IMAGE AND ENCODE FACE FOR TEST IMAGE
# ---------------------------------------------------------------------------------------------------------------
faceLocTest = face_recognition.face_locations(imgTest)[0]
encodeTest = face_recognition.face_encodings(imgTest)[0]
cv2.rectangle(imgTest, (faceLocTest[3], faceLocTest[0]), (faceLocTest[1], faceLocTest[2]),(0, 171, 255), 2)
# ---------------------------------------------------------------------------------------------------------------
# CALLING COMPARE_FACES FUNCTION TO COMPARE RAJESH AND RAJEST TEST AND SAVING IT INTO RESULT
# ---------------------------------------------------------------------------------------------------------------
results = face_recognition.compare_faces([encodeRajesh], encodeTest)
#finding face distance
faceDistance = face_recognition.face_distance([encodeRajesh], encodeTest)
#terminal ma result(true or false) and facedistance print garney (usually 0.44)
# print(results, faceDistance)
#image ma name print garna lai , facedistance ko code lai round of garney,font,scale,



# im = cv2.imread('training_rajesh_hamal/White.jpg')                    
# imS = cv2.resize(im, (1200, 650)) 

# im1 = cv2.imread('training_rajesh_hamal/White1.jpg')                    
# imS1 = cv2.resize(im, (1200, 650)) 



# cv2.putText(imS, f"Face Location HOG [Reference]-->{faceLoc}   Face Location HOG [Test]-->{faceLocTest}", (20, 20), cv2.FONT_ITALIC ,0.4, (0, 0, 0), 1)
# cv2.imshow('Training Rgesult', imS)

# cv2.putText(imS1, f"Face Location HOG [Reference]-->{encodeRajesh}   Face Location HOG [Test]-->{encodeTest}", (20, 20), cv2.FONT_ITALIC ,0.4, (0, 0, 0), 1)


# # cv2.imshow('Training Result', imS1)

# # messagebox.showinfo("Training Result",f"Informativeweakjdlasndklasndklnaskdlnaslkdnalkdnalkndalkndlaknd{results}")
# # cv2.imshow('Picture Of Rajesh Hamal For Testing Purpose', imgTest)

# f = open('csv_of_student_attendance/encode.txt', 'w')
# print("-------------------------------------------------------------------------------------------------\n",file=f)
# print("The Face Location obtained from HOG representation for Reference Image (x1,y1)(x2,y2):",file=f)
# print(f"----> {faceLoc}\n" , file=f)
# print("-------------------------------------------------------------------------------------------------\n",file=f)
# print("The Face Location obtained from HOG representation for Test Image (x1,y1)(x2,y2):",file=f)
# print(f"----> {faceLocTest}\n" , file=f)
# print("-------------------------------------------------------------------------------------------------\n",file=f)
# print("The Face Encodings obtained from OpenFace NN for Reference Image:\n",file=f)
# print(f"{encodeRajesh}\n" , file=f)
# print("-------------------------------------------------------------------------------------------------\n",file=f)
# print("The Face Encodings obtained from OpenFace NN for Test Image:\n",file=f)
# print(f"{encodeTest}\n" , file=f)
# print("-------------------------------------------------------------------------------------------------\n",file=f)
# print("The Face Training Result Between both training image is:",file=f)
# print(f"----> {results}\n" , file=f)
# print("-------------------------------------------------------------------------------------------------\n",file=f)
# f.close()

# cv2.waitKey(0)

print("Launching Trained Encoding from OpenFace NN...")


class Window(Frame):
    def __init__(self, master=None):
        Frame.__init__(self, master)
        self.master = master
        self.pack(fill=BOTH, expand=1)
        
        text = Label(self, text=f"OPENFACE NN ENCODINGS [Reference Image]:\n{encodeRajesh}\nOPENFACE NN ENCODINGS [Test Image]:\n{encodeTest}")
        text.place(x=20,y=20)
        # text1 = Label(self,text=f"OpenFace NN Encode [Test]:\n{encodeTest}")
        
        # text1.place(x=20,y=20)

        #text.pack()
        
root = Tk()
app = Window(root)
root.wm_title("Results of the trained encodings")
root.geometry("500x800")
root.mainloop()