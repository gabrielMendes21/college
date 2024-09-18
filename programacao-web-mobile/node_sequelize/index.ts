import express from 'express';
import { DataTypes } from "sequelize";
// import user from './User';
import db from "./db_connection";

// Create application with express
const app = express();

const user = db.define("user", {
    name: {
        type: DataTypes.STRING
    },
    age: {
        type: DataTypes.INTEGER
    }
});

user.sync();

app.post('/cadastrar', async (req, res) => {
    try {
        await user.create({name: "Gabriel Mendes", age: 18});
        res.json("Usuário criado");
    } catch(e) {
        res.json(e);
    }
})

app.get('/users', async (req, res) => {
    try {
        const users = await user.findAll();
        res.json(users);
    } catch(e) {
        res.json(e);
    }
});

app.put('/update', async (req, res) => {
    try {
        await user.update({
            name: "Jude Hoffman",
            age: 55
        }, {
            where: {
                id: 1
            }
        })

        res.json("usuário atualizado");
    } catch(e) {
        res.json(e);
    }
})

app.delete('/delete', async (req, res) => {
    try {
        await user.destroy({
            where: {
                id: 1
            }
        })

        res.json("Usuário removido");
    } catch(e) {
        res.json(e);
    }
})

app.listen(3000);