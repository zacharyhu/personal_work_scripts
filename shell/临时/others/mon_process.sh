

#!/bin/bash
# monitor process


DATE=`date +%F" "%T`
PROCESS_DESC=$1
ID=$2


desc="grep "`echo "$PROCESS_DESC"|sed -e 's/,/ |grep /g'`
ps_status=`echo  "ps axu|grep -v grep|grep -v $0| $desc " |sh |awk '{print $2" "$3" "$4}'`


#echo $ps_status
pid=`echo $ps_status|awk '{print $1}' `
#because of the blank string $pid so get a num $i to use if
i=`echo $pid |awk -v b=1 '{print($1>b)?"1":"0"}' `
#echo $pid
if [ -n ${pid} ] && [ ${i} == "1"  ] ;then
cpu=`echo $ps_status|awk '{print $2}' `
mem=`echo $ps_status|awk '{print $3}' `
ES_num=`netstat -np | grep $pid"/"|grep ES -c`
thread_num=`ps -mp $pid |wc -l`
#echo "the thread num is " $thread_num " and it's cpu : "$cpu" mem: "$mem "ES NUM IS : "$ES_num
else 
echo "errrrrrrrrrrrrrrrrrrro...."
pid="-1"
cpu="0"
mem="0"
ES_num="0"
thread_num="0"
#echo "the  pid is "$pid " thread num is " $thread_num " and it's cpu : "$cpu" mem: "$mem "ES NUM IS : "$ES_num
fi


curl "${3}?ctype=process&id=${ID}&pid=${pid}&pcpu=${cpu}&pmem=${mem}&pnum=${thread_num}&pconum=${ES_num}"
