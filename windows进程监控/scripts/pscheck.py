# -*- coding: cp936 -*-
import os,time,socket,sys,re


def check_process_status(local_dir,exe,port = '',is_game = '0'):

    local_time= time.strftime('%Y-%m-%d %H:%m:%S',time.localtime(time.time()))
    cmd_tasklist= 'tasklist /NH  /FO CSV /FI "IMAGENAME eq '+ exe +'"'
    #print cmd_tasklist
    rel = os.popen(cmd_tasklist).read()
    list_rel = rel.split('","')
    #print "lenth : "+str(len(list_rel))
    #判断是否传端口
    if port:
        cmd_netstat = 'netstat -ano |findstr "LISTENING"|findstr ":'+ str(port) +'"'
        #print cmd_netstat
        rel_net = os.popen(cmd_netstat).read()
        if len(list_rel)<5 or not rel or list_rel[1] != rel_net.split()[4]:
            log_str = local_time+" "+"there is no rel , so start up process: "+exe
            start_process(local_dir,exe)
        else:
            log_str = local_time+" "+exe+" process running,pid is : "+ list_rel[1]+" 内存使用："+list_rel[4]
            if is_game == '1':
                on_num=check_game_online('127.0.0.1',port)
                log_str += " 在线人数:"+on_num
    else:
        if len(list_rel)<5 or not rel:
            log_str = local_time+" "+"there is no rel , so start up process: "+exe
            start_process(local_dir,exe)
        else:
            log_str = local_time+" "+exe+" process running,pid is : "+ list_rel[1]+" 内存使用："+list_rel[4]
        
    return log_str
    #print rel
    #print rel_net



def start_process(local_dir,exe):
    os.popen("taskkill /IM "+exe)
    os.chdir(local_dir)
    os.popen("start "+exe)

#游戏端口人数检测机制

def check_game_online(HOST,PORT):
    s = None
    timeout = 8
    socket.setdefaulttimeout(timeout)

    for res in socket.getaddrinfo(HOST, PORT, socket.AF_UNSPEC, socket.SOCK_STREAM):
        af, socktype, proto, canonname, sa = res
        try:
            s = socket.socket(af, socktype, proto)
        except socket.error as msg:
            s = None
            continue
        try:
            s.connect(sa)
        except socket.error as msg:
            #print "error here connect"
	    #print msg
            s.close()
            s = None
            continue
        break
    if s is None:
        #print 'could not open socket'
        #sys.exit(1)
        online = '-1'
    else:
        try:
            data = s.recv(1025)
            if not data:
                print "no data"
                online = '-1'
            else:
                #get online data such as online="119/216"
                p = re.compile('online=\"[0-9]{1,3}/?[0-9]{0,3}\"')
                p_num = re.compile('[0-9]{1,3}')
                #print p.findall(data)
                online = p_num.findall(p.findall(data)[0])[0]
            s.close()
        except socket.error as msg:
            #print "error here time out"
            #print msg
            online = '-1'        
    

    #print 'Received', repr(data)
    return online
