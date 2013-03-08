import urllib,re
from urllib2 import Request, urlopen, URLError, HTTPError


#values={'a':'cool','b':'shell'}
#url='http://10.48.179.115:88/find_data'
url = 'http://langsha.tmall.com/search.htm?spm=a1z10.3.w15320962.29.t4wLLU&search=y&viewType=grid&orderType=_coefp&pageNum='
#url = 'http://www.baidu.com'

def get_data(url):
    user_agent = 'Chrome'
    headers = {'User-Agent' : user_agent}
    #data = urllib.urlencode(values)
    #print data
    #fullurl=url + '?' + data
    print url
    #req = urllib.urlopen(url)
    try:
        response = urllib.urlopen(url)
    except HTTPError, e:
        print 'The server couldn\'t fulfill the request.'
        print 'Error code: ', e.code
    except URLError, e:
        print 'We failed to reach a server.'
        print 'Reason: ', e.reason
    else:
        #print response
        the_page = response.readlines()
        #print type(the_page)
        print len(the_page)
        #output = open('d:\wazi.txt', 'w+')
        for i in range(len(the_page)):
            listpic=re.findall("<img src=\"http.*\.gif\" data-ks-lazyload=\"http.*\.jpg\"",the_page[i])
            listproduct=re.findall("<span class=H>.*</span>",the_page[i])
            listprice=re.findall("<s class=\"symbol\">&yen;</s><strong>[0-9\.]{1,8}</strong>",the_page[i])
            listsales=re.findall("<em>\d{1,8}<\/em>",the_page[i])
            if len(listpic) >=1:
                print "picurl: " + the_page[i]
            if len(listproduct)>=1:
                print "product : " +the_page[i]
            if len(listprice) >= 1:
                print "price: " +re.findall("\d{1,5}\.",(str(listprice[0])))[0]
            if len(listsales) >= 1:
                print"sales: "+re.findall("\d{1,8}",(str(listsales[0])))[0]
        #output.close()
                

for i in range(23):
    url_i=url+str(i)+"#anchor"
    #print url_i
    get_data(url_i)
