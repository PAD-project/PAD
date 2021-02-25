import sys
import datetime

def application(environ, start_response):
    status = '200 OK'

    response_header = [('Content-type', 'text/html')]
    start_response(status, response_header)
    
    return [bytes('<h1>pad1</h1>', 'utf-8')]
    
if __name__ == '__main__':
    application({}, print)