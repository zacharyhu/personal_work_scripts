#!/bin/bash
#huzhiwei@gmail.com

rsync -avz --progress --delete --password-file=/root/rsync.pas rsync@10.48.179.99::gamedb /data/game_data/
