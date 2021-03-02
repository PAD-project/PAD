const express = require('express')
const app = express()

// Vanwege Docker moeten we SIGINT handmatig afvangen (SIGINT = CONTROL+C)
process.on('SIGINT', function() {
    console.log('Received SIGINT signal, exiting...')
    process.exit(0)
})

// Functie die alle requests logt
app.use(function(req, res, next) {
    console.log(`[${new Date().toLocaleString()}]: ${req.url}`)
    next()
})


/**
 *  app.get               -> Handel een GET request naar het aangegeven pad af (je hebt ook functies voor POST, PUT, DELETE, etc)
 *  '/pad1'               -> Het pad dat afgehandeld moet worden (dus in dit geval is het 'http://<ip.address>/pad1')
 *  (req, res) => { ... } -> De functie die de request (req) kan uitlezen en een response (res) kan sturen
 */
app.get('/pad1', function(req, res) {
    // HTML stuur je normaal niet zo maar voor de demo is het prima
    res.send('<h1>pad1</h1>')
})

app.get('/pad2', function(req, res) {
    res.send('<h2>pad2</h2>')
})

app.get('/pad3', function(req, res) {
    res.send('<h3>pad3</h3>')
})

/**
 *  Leuke feature -> dynamische paden
 *  :iets zegt hier tegen Express om alle paden na /pad/ af te handelen
 *  
 *  dus "/pad/hallo"      MAG
 *      "/pad/doei"       MAG
 *      "/pad/natuurlijk" MAG
 * 
 *  MAAR "/pad/"       mag NIET -> oplossing: app.get('/pad/')
 *  EN   "/pad"        mag NIET -> oplossing: app.get('/pad')
 *  EN   "/pad/ja/nee" mag NIET -> oplossing: app.get('/pad/ja/nee') OF .get('/pad/:var1/:var2') (je kan de `:vars` ook mixen met statische paden)
 *      
 */
app.get('/pad/:iets', function(req, res) {
    res.send(`<b>${req.params.iets}</b>`)
})

app.listen(80, function() {
    console.log('ExpressJS server started on port 80');
})