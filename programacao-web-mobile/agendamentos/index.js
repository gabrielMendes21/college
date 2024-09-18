const express = require('express');
const exhdb = require('express-handlebars').engine;

// Create application with express
const app = express();

app.engine("handlebars", exhdb({defaultLayout: 'main'}));

app.set("view engine", "handlebars");

app.get('/', (req, res) => {
    res.render("cadastrar")
})

app.get('/cadastrar', (req, res) => {
    res.render("cadastrar")
})

app.get('/consultar', (req, res) => {
    res.render("consultar")
})

app.get('/atualizar', (req, res) => {
    res.render("atualizar")
})

app.get("/secret", (req, res) => {
    res.render('livros', {
        livros: [
            {
                nome: "Livro 1",
                editora: "Editora 1"
            },
            {
                nome: "Livro 2",
                editora: "Editora 2"
            }
        ]
    })
});



app.listen(3000);