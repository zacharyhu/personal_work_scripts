
#####配置进程编号

PROCESS_ID=(
        2001
        2002
        )
#####主机编号 以IP区分
eth="eth0"
hostid=`ifconfig ${eth} | grep "inet addr" | grep  -v "127.0.0.1" |awk '{print $2}'|grep -o '[0-9.]\{8,26\}'|awk -F. '{print "1"$4}'`
########各项开启状态 1为开启状态
checkcpu="1"
checkmem="1"
checkdisk="1"
checktraffic="1"
checkprocess="0"
#######监控接口url
moniter_url="http://10.48.179.115:88/check"
###流量监控频率 单位：秒
SEC="60"
######脚本路径
ROOTDIR=/cron

script_process="mon_process.sh"
script_process_list="get_process_list.sh"
pfile=${ROOTDIR}"/"${script_process}
plfile=${ROOTDIR}"/"${script_process_list}
####流量监控脚本
traf_script=${ROOTDIR}"/traffic.sh"



arr=(
`top -b -n 1 | grep Cpu  |awk '{print $2,$3,$4,$5,$6}'|grep -o '[0-9.]\{1,6\}'|sed -e /^$/d`
)
cpu_us=${arr[0]}
cpu_sy=${arr[1]}
cpu_ni=${arr[2]}
cpu_id=${arr[3]}
cpu_wa=${arr[4]}


mem_use=`free -m | grep "\-\/\+" |awk '{print $3}'`
mem_free=`free -m |grep Mem |awk '{print $4}'`
mem_cache=`free -m |grep Mem |awk '{print $7}'`
mem_total=`free -m |grep Mem |awk '{print $2}'`
mem_swap=`free -m | grep Swap |awk '{print $3}'`

disk_use=`df -h |grep -P "\s/$" |awk '{print $2}'|grep -o '[0-9.]\{1,6\}'`
disk_free=`df -h |grep -P "\s/$" |awk '{print $3}'|grep -o '[0-9.]\{1,6\}'`
disk_total=`df -h |grep -P "\s/$" |awk '{print $1}'|grep -o '[0-9.]\{1,6\}'`
disk_per=`df -h |grep -P "\s/$" |awk '{print $4}'`



if [ $checkcpu -eq "1" ];then
curl $moniter_url"?ctype=cpu&id="$hostid"&us="$cpu_us"&sy="$cpu_sy"&ni="$cpu_ni"&cpuid="$cpu_id"&wa="$cpu_wa
#echo  $moniter_url"?id="$hostid"&us="$us"&sy="$sy"&ni="$ni"&cpuid="$id"&wa="$wa
#echo "ok"
else 

echo "cpu off"
fi


if [ $checkmem -eq "1" ];then
curl $moniter_url"?ctype=mem&id="$hostid"&use="$mem_use"&free="$mem_free"&cache="$mem_cache"&total="$mem_total"&swap="$mem_swap
else
echo "mem off"
r
fi

if [ $checkdisk -eq "1" ];then
curl $moniter_url"?ctype=disk&id="$hostid"&use="$disk_use"&free="$disk_free"&total="$disk_total"&per="$disk_per
else
echo "disk check off"
fi

if [ $checktraffic -eq "1" ];then
traf_pid=`ps axu | grep $traf_script|grep -v grep |awk '{print $2}'`
	if [ -z $traf_pid ];then
	sh $traf_script $SEC $eth  $moniter_url $hostid &
	echo "script start..."
	else
	echo "script still running pid is "$traf_pid
	fi
else
echo "traffic check off"
fi


if [ $checkprocess -eq "1" ];then
for ((i=0;i<${#PROCESS_ID[*]};i++))
do
#bianliang yinyong 
 #eval desc="$""desc"${PROCESS_ID[$i]}
  #echo -e "${PROCESS_ID[$i]}\n"
  #echo $desc 
   desc=`sh ${plfile} ${PROCESS_ID[$i]}`
   sh ${pfile} ${desc} ${PROCESS_ID[$i]} ${moniter_url}
done
else
echo " process check off"
fi



echo `date +%c`
