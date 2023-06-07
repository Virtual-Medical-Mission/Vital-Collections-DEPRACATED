import serial
import MySQLdb
import time

dbConn = MySQLdb.connect("localhost","root","Ansi@2004","telemed1") or die
("could no connect to database")

cursor = dbConn.cursor()

device = 'COM3' 
try: 
        print "Trying....",device
        arduino = serial.Serial(device,57600)
except:
        print "Failed to connect on", device
while 1: 

        try:
                while arduino.in_waiting == 0:
                                print "inwaiting"
                data=arduino.readline()
                print data
                print "got data"
                pieces = data.split(" ")
                try: 
                        print "tyring to tx"
                        cursor=dbConn.cursor()
                        cursor.execute("INSERT INTO vitals1 (O2sat,heartrate,BP,Temp,EKG) VALUES (%s,%s,%s,%s,%s)", (pieces[0],pieces[1],pieces[2],pieces[3],pieces[4]))
                        dbConn.commit()
                        cursor.close()
                        print " tx ed"
                except MySQLdb.IntegrityError:
                        print "failed to insert data"
                finally:
                        cursor.close()
        except:
                print "error serial"
