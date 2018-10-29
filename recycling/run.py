import socket
import pymysql

HOST = '120.105.129.165'
PORT1 = 50007
PORT2 = 50008
db = pymysql.connect("127.0.0.1","Ben","99859985","project" )

while True:
    s1 = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s1.bind((HOST, PORT1))
    s1.listen(1)
    
    print('Listening at port1:',PORT1)
    conn1, addr1 = s1.accept()
    print('Connected by', addr1)
    
    data1 = conn1.recv(1024)
    data1 = data1.decode()
    print('Recycle id:', data1)
    
    text_file = open("recycle1.txt", "w")
    text_file.write("1")
    text_file.close()
    
    conn1.close()
    
    s2 = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s2.bind((HOST, PORT2))
    s2.listen(1)
    
    print('Listening at port2:',PORT2)
    conn2, addr2 = s2.accept()
    print('Connected by', addr2)
    
    data2 = conn2.recv(1024)
    data2 = data2.decode()
    print('Recycle result:', data2)
    
    text_file = open("recycle1.txt", "w")
    text_file.write("0")
    text_file.close()
    
    text_file = open("return1.txt", "w")
    text_file.write(data2)
    text_file.close()
    
    cursor = db.cursor()
    sql = "INSERT INTO `recycle_form` (`recycle_id`, `recycle_member_id`, `recycle_kind`, `recycle_time`) VALUES ( NULL,"+data1+","+data2+", NULL)"
    cursor.execute(sql)
    db.commit()
    
    conn2.close()
    
s1.close()
s2.close()
