#!/bin/bash
#get process desc list
#auth by hzw0705@gmail.com


PROCESSID=$1

CU=`curl "http://10.48.179.115:88/process_list?id=${PROCESSID}"|grep -o '[A-Za-z0-9_,]\{2,30\}\|:'`
KEY=`echo $CU| awk -F: '{print $2}'|sed -e 's/\s//g'`
echo $KEY


