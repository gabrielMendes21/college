import express from 'express';
import handlebars from 'express-handlebars';
import { cert, initializeApp } from 'firebase-admin/app';
import { getFirestore } from 'firebase-admin/firestore';

const app = express();

initializeApp({
    credential: cert('./chave-secreta-shhh.json')
});

const db = getFirestore();

app.engine("handlebars", handlebars.engine({defaultLayout: "main"}));
app.set("view engine", "handlebars");

app.use(express.urlencoded({extended: false}));
app.use(express.json());
app.use(express.static('./'))

app.get("/", (req, res) => {
    res.render("primeira_pagina");
})

app.post("/cadastrar", async (req, res) => {
    try {
        const {
            nome,
            telefone,
            origem,
            data_contato,
            observacao,
        } = req.body;
    
        const docRef = db.collection('agendamentos').doc('alovelace');
    
        await docRef.set({
            nome,
            telefone,
            origem,
            data_contato,
            observacao,
        });

        res.json("Agendamento cadastrado com sucesso");
    } catch(err) {
        res.status(500).json({
            msg: "Erro ao cadastrar agendamento",
            err
        });
    }
})

app.get("/consulta", async (req, res) => {
    const agendamentos = await db.collection('agendamentos').get();
    const data = [];

    agendamentos.forEach(ag => {
        data.push({
            id: ag.id,
            ...ag.data()
        })
    })

    res.render('consulta', {
        data,
        teste: "Gabriel Mendes"
    });
})

app.get("/editar/:id", async (req, res) => {
    const agendamentos = await db.collection('agendamentos').get();
    let agendamento = null;

    agendamentos.forEach((ag) => {
        if (ag.id === req.params.id) {
            agendamento = {
                id: ag.id,
                ...ag.data()
            };
        }
    });

    res.render("editar", agendamento);
})

app.get("/excluir/:id", async (req, res) => {
    const response = await db.collection('agendamentos').doc(req.params.id).delete();

    res.redirect('/consulta');
})

app.post("/atualizar/:id", async (req, res) => {
    try {
        const body = req.body;
        
        const agRef = db.collection('agendamentos').doc(req.params.id);
        const response = await agRef.update({...body});

        res.json("Sucesso");
    } catch(err) {
        console.log(err)
        res.status(500).json({
            msg: "Erro ao editar agendamento",
            err
        })
    }
})

app.listen(3000, () => console.log("Servidor ativo"));