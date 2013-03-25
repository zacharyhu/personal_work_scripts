# -*- coding: utf-8 -*-
import urllib2
import get_items

print "===============start csdn_geek News GET!================"
content_csdn = urllib2.urlopen('http://geek.csdn.net/news/index/new').read()
m=get_items.My_CSDN_HTMLParser()
m.feed(content_csdn)
items = m.getItems()
for text,link in items:
    print text+" ==>  "+link



print "===============start StartUp News GET!=================="
content_sn = urllib2.urlopen('http://news.dbanotes.net/').read()
sn_get=get_items.My_SN_HTMLParser()
sn_get.feed(content_sn)
items = sn_get.getItems()
for text,link in items:
    print text+" ==>  "+link
