

#!/bin/bash

SEC=$1
eth=$2
baseurl=$3
hostid=$4


while [ "1" ]
do
RXpre=$(cat /proc/net/dev | grep $eth | tr : " " | awk '{print $2}')
TXpre=$(cat /proc/net/dev | grep $eth | tr : " " | awk '{print $10}')
sleep $SEC
RXnext=$(cat /proc/net/dev | grep $eth | tr : " " | awk '{print $2}')
TXnext=$(cat /proc/net/dev | grep $eth | tr : " " | awk '{print $10}')
#echo  -e  "\t RX `date +%k:%M:%S` TX"
                                  
RX=`gawk -v a=${RXpre} -v b=${RXnext} -v c=${SEC} 'BEGIN{printf "%.2f",(b-a)/c}' `
TX=`gawk -v a=${TXpre} -v b=${TXnext} -v c=${SEC} 'BEGIN{printf "%.2f",(b-a)/c}' `
RX="${RX}"
TX="${TX}"
#RX="${RX}B/s"
#TX="${TX}B/s"
#echo -e "$eth \t $RX   $TX "
curl $baseurl"?ctype=traffic&id="$hostid"&rx="$RX"&tx="$TX"&dev="$eth
done
