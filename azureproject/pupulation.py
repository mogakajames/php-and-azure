import mysql.connector
from mysql.connector import errorcode
#We created a successful connection to Ms Azure from python and on the terminal, 
# we query some data to ptoof the connection, for web display purposes, this same code is written and 
# provided in PHP files that will accompany the report 
# Obtain connection string information from the portal

config = {
  'hostserver':'cop.mysql.database.azure.com',
  'usernameid':'cop@cop',
  'userpassword':'Equilibrium1996',
  'clouddatabase':'population'
}

# Construct connection string
try:
   connection = mysql.connector.connect(**config)
   print("Connection to database has been well established")
except mysql.connector.Error as err:
  if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
    print("error occured, no connection")
  elif err.errno == errorcode.ER_BAD_DB_ERROR:
    print("The database you are trying to access does not exist on the cloud")
  else:
    print(err)
else:
  cursor = connection.cursor()
  cursor.execute("SELECT Data_Source, Column_63 FROM pop;")
  rows = cursor.fetchall()
  #print("Read",cursor.rowcount,"row(s) of data.")

  # Print all rows
  for row in rows:
  	#print("Data row = (%s, %s)" %(str(row[0]), str(row[1])))
   print(row)

  # Cleanup
  connection.commit()
  cursor.close()
  connection.close()
  print("Operation has been completed.")