import sys
import datetime

def application(environ, start_response):
    status = '200 OK'

    response_header = [('Content-type', 'text/html')]
    start_response(status, response_header)
    
    return [bytes('<h3 style="color: red; font-family: \'Segoe UI\';">WSGI ondersteund geen dynamische paden!</h3>', 'utf-8')]
    
if __name__ == '__main__':
    application({}, print)