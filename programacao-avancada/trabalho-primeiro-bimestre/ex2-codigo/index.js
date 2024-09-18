import cors from 'cors';
import express from 'express';


const app = express()
app.use(cors())
app.use(express.json())
app.use(express.urlencoded({ extended: false }))

app.post('/', (req, res) => {
    console.log(req.body)
    res.json(req.body)
})

app.listen(3000)