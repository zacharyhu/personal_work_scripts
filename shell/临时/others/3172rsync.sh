#!/bin/bash
#huzhiwei@gmail.com

rsync -avz --progress --delete --password-file=/root/rsync.pas rsync@125.210.228.172::gamedata172 /data/game_172
rsync -avz --progress --delete --password-file=/root/rsync.pas rsync@10.48.179.109::gamedbwxr /data/game_wxr
