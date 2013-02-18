import urllib
from urllib2 import Request, urlopen, URLError, HTTPError


#values={'a':'cool','b':'shell'}
#url='http://10.48.179.115:88/find_data'

def post_data(url,values):
    user_agent = 'HU-web'
    headers = {'User-Agent' : user_agent}
    data = urllib.urlencode(values)
    print data
    fullurl=url + '?' + data
    req = Request(fullurl,data,headers)
    try:
        response = urlopen(req)
    except HTTPError, e:
        print 'The server couldn\'t fulfill the request.'
        print 'Error code: ', e.code
    except URLError, e:
        print 'We failed to reach a server.'
        print 'Reason: ', e.reason
    else:
        the_page = response.read()
        print the_page


#post_data(url,values)
