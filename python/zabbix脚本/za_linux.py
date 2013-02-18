import os,sys,urllib,re

httpad = 'http://10.48.179.107/'
localdir = '/usr/local/zabbix/'
if os.path.exists(localdir):
    print localdir + "exists"
else:
    print localdir + " didn't exists,now create"
    os.mkdir(localdir)

#filelist
files = 'zabbix_agent.tar.gz'



#download file
url = httpad + files
localfile = localdir + files
print url
print localfile
urllib.urlretrieve(url,localfile)

os.popen('tar zxvf '+localfile+' -C /usr/local/')


#get ip
ips = os.popen('ifconfig | grep "inet addr:" |grep -v "127.0.0.1" |grep "10.48" |awk \'{print $2}\' |awk -F: \'{print $2}\'').read()
#edit hostname
hostname = 'GAME_'+ ips.split(".")[3]

#modify conf
f = open(localdir+'conf/zabbix_agentd.conf','r+')
host = f.read()
host = host.replace('HOST_NAME',hostname)
f.seek(0)
f.write(host)
f.close()

#useradd
os.popen('useradd zabbix -s /sbin/nologin')
##install service
cpfile = 'cp -f ' + localdir + 'zabbix_agentd /etc/init.d/'
os.popen(cpfile)


#install service
if os.path.exists('/tmp/zabbix_agentd.pid'):
    pid = os.popen('cat /tmp/zabbix_agentd.pid').read()
    print pid
    os.popen('kill '+ pid)
    os.popen('service zabbix_agentd start')
else:
    os.popen('service zabbix_agentd start')


listen_stat=os.popen('netstat -lnp| grep zabbix').read()
if not listen_stat:
    print "listen not start.."+listen_stat
else:
    print "listen start ....:  "+listen_stat
