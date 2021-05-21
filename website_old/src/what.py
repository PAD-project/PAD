def application(environ, start_response):
    start_response('200 Ok', [('Content-type', 'text/html')])
    return [bytes('<h1>Test</h1>')]