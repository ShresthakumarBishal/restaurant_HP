const express = require('express')
const serveStatic = require('serve-static')
const cors = require('cors')
const app = express()
const port = process.env.PORT || 3000

app.use(
  cors({
    origin: 'http://localhost:8081',
    credentials: true,
    optionsSuccessStatus: 200,
  })
)

app.use(serveStatic(__dirname + '/dist'))

app.listen(port, () => console.log(`Example app listening at http://localhost:${port}`))
app.get('/api', (req, res) => {
  res.send('get message')
})
