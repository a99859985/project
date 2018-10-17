#import select
import socket

#伺服端主機IP位址和連接埠號
HOST = '120.105.129.165'
PORT = 50007
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
try:
    #連接伺服器
    s.connect((HOST, PORT))
except Exception as e:
    print('Server not found or not open')
    #sys.exit()
    
s.setblocking(0)

c = input('Input the content you want to send:')
s.sendall(c.encode())
#ready = select.select([s],[],[],5)
#if ready[0]:
#    data = s.recv(1024)


#關閉連接
s.close()
