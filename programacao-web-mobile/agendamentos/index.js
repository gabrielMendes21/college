// import connect from "./db_connection";
// import { DataTypes } from "sequelize";
import { engine } from "express-handlebars";
import express from 'express'

// Create application with express
const app = express();

// Connect to databse
// const db = connect();

app.engine("handlebars", engine({defaultLayout: "main"}));

app.set("view engine", "handlebars");

// Create agendamentos table
// const agendamentos = db.define("agendamentos", {
//     nome: {
//         type: DataTypes.STRING
//     },
//     endereco: {
//         type: DataTypes.STRING,
//     },
//     bairro: {
//         type: DataTypes.STRING
//     },
//     estado: {
//         type: DataTypes.STRING
//     },
//     cep: {
//         type: DataTypes.STRING
//     },
//     observacao: {
//         type: DataTypes.STRING
//     }
// })

// agendamentos.sync();

app.get('/', (req, res) => {
    res.render("home")
})

app.get('/consultar', (req, res) => {
    res.render("consultar")
})

app.get('/atualizar', (req, res) => {
    res.render("atualizar")
})

// Middleware for insert data into database
// function inserirDados(req, res, next) {
//     try {
//         agendamentos.create({
//             nome: req.query.nome,
//             endereco: req.query.endereco,
//             bairro: req.query.bairro,
//             cep: req.query.cep,
//             cidade: req.query.cidade,
//             estado: req.query.estado,
//             observacao: req.query.observacao
//         });

//         res.json("Dados cadastrados");
//     } catch(err) {
//         res.status(500).json({
//             msg: "Erro ao cadastrar os dados",
//             err
//         })
//     }

//     next()
// }

/*  Query for test
?nome=gabriel&endereco=rua&bairro=sp&estado=spdnv&cep=111&observacao=teste
*/
// app.get('/cadastrar', inserirDados)


app.listen(3000);