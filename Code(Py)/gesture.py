import cv2
import numpy as np
import HandTrackingModule as htm
import time
import autopy

Wcam, Hcam = 640, 420 # Cam Width n Height
frameR = 92 # Frame Reduction
smoothen = 5
cap = cv2.VideoCapture(0)  # Camera if inbuilt then 0 or else external 1
cap.set(3, Wcam)
cap.set(4, Hcam)
pTime = 0
plocX, plocY = 0, 0
clocX, clocY = 0, 0
detector = htm.handDetector(maxHands=1)
Wscr, Hscr = autopy.screen.size()  # Screen Width n Height
# print(Wscr,Hscr)


# Define a variable to track if a click has been performed
click_performed = False

while True:
    # Find Hand
    success, img = cap.read()
    img = detector.findHands(img)
    lmList, bbox = detector.findPosition(img)

    # Get tip of index and middle fingers
    if len(lmList) != 0:
        x1, y1 = lmList[8][1:]
        x2, y2 = lmList[12][1:]
        # print(x1,y1,x2,y2)

        # Check Fingers are up
        fingers = detector.fingersUp()
        # print(fingers)
        cv2.rectangle(img, (frameR, frameR), (Wcam - frameR, Hcam - frameR), (255, 0, 255), 3)

        # Check Only Index Finger up : Moving Mode
        if fingers[1] == 1 and fingers[2] == 0:
            x3 = np.interp(x1, (frameR, Wcam - frameR), (0, Wscr))  # Convert into co ordinates
            y3 = np.interp(y1, (frameR, Hcam - frameR), (0, Hscr))

            # For Smoothen the mouse
            clocX = plocX + (x3 - plocX) / smoothen
            clocY = plocY + (y3 - plocY) / smoothen

            # Move Mouse
            autopy.mouse.move(Wscr - x3, y3)
            cv2.circle(img, (x1, y1), 12, (0, 255, 255), cv2.FILLED)  # BGR in Opencv2
            plocX, plocY = clocX, clocY

            # Reset click_performed variable
            click_performed = False

        # Both Index and Middle fingers are up and fingers distance is short then Left Click
        if fingers[1] == 1 and fingers[2] == 1 and not click_performed:
            length, img, lineInfo = detector.findDistance(8, 12, img)
            print(length)
            if length < 40:  # If Distance less than 40 then click event
                cv2.circle(img, (lineInfo[4], lineInfo[5]), 12, (0, 255, 0), cv2.FILLED)  # BGR in Opencv2

                # Left Click
                autopy.mouse.click()

                # Set click_performed to True to indicate click is performed
                click_performed = True

    # FPS
    cTime = time.time()
    fps = 1 / (cTime - pTime)
    pTime = cTime
    f_size = 2
    cv2.putText(img, f"FPS:{str(int(fps))}", (10, 50), cv2.FONT_HERSHEY_PLAIN, f_size,
                (255, 0, 0), 2)

    # Display Image
    cv2.imshow("Image", img)
    cv2.waitKey(1)
