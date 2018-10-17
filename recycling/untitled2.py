import socket
import pymysql

HOST = '120.105.129.165'
PORT1 = 50007
PORT2 = 50008
db = pymysql.connect("127.0.0.1","Ben","99859985","project" )

while True:
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s.bind((HOST, PORT1))
    s.listen(1)
    
    print('Listening at port1:',PORT1)
    conn, addr = s.accept()
    print('Connected by', addr)
    
    data1 = conn.recv(1024)
    data1 = data1.decode()
    print('Received id:', data1)
    
    text_file = open("recycle01.txt", "w")
    text_file.write("1")
    text_file.close()
    
    conn.close()
    
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s.bind((HOST, PORT2))
    s.listen(1)
    
    print('Listening at port2:',PORT2)
    conn, addr = s.accept()
    print('Connected by', addr)
    
    data2 = conn.recv(1024)
    data2 = data2.decode()
    
    text_file = open("recycle01.txt", "w")
    text_file.write("0")
    text_file.close()
    
    cursor = db.cursor()
    sql = "INSERT INTO `recycle_form` (`recycle_id`, `recycle_member_id`, `recycle_kind`, `recycle_time`) VALUES ( NULL,"+data1+","+data2+", NULL)"
    cursor.execute(sql)
    db.commit()
    
    conn.close()
    
s.close()

