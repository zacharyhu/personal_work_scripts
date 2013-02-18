import ConfigParser,os,time
import pscheck


#print 'sections : ', secs
print os.getcwd()
logdir = os.getcwd()+'/logs'
work_dir = os.getcwd()
if os.path.exists(logdir):
    print logdir+" is exsit"
else:
    os.mkdir(logdir)
logfile = logdir+'/check.log'


while 1:
    f = open(logfile,'a')
    os.chdir(work_dir)
    cf = ConfigParser.ConfigParser()
    cf.read("process.conf")
    secs = cf.sections()
    process_nu = cf.get("main","process_num")
    if not cf.get("main","sleeptime"):
        sleeptime = float(15)
    else:
        sleeptime = float(cf.get("main","sleeptime"))

    print "Time sleep : "+str(sleeptime)+" seconds"
    if process_nu <= "0":
        print "error : there is no process to be moniter"
        exit
    #else:
    #print process_nu , "processes has to be monitered process "

    process_nu=int(process_nu)
    for i in range(process_nu):
        Pnum = i+1
        sec = "process_"+str(Pnum)
        #print cf.get(sec,"dir")," is the dir and "
        #print "the exe is ",cf.get(sec,"exe")
        local_dir = cf.get(sec,"dir")
        exe = cf.get(sec,"exe")
        #print sec
        if "port" in cf.options(sec):
            #print "port is set " + cf.get(sec,"port")
            port = cf.get(sec,"port")
            if "is_game" in cf.options(sec) and cf.get(sec,"is_game") == '1':
                game_check = '1'
            else:
                game_check = '0'
            #print 
            log_str = pscheck.check_process_status(local_dir,exe,port,game_check)
            #print "port is " + port
        else:
            log_str = pscheck.check_process_status(local_dir,exe)
        f.write(log_str+"\r\n")
        print log_str
    time.sleep(sleeptime)
    f.close()


