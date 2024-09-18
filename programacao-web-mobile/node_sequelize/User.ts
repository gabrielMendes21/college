import { DataTypes } from "sequelize";
import db from './db_connection';

const user = db.define("user", {
    name: {
        type: DataTypes.STRING
    },
    age: {
        type: DataTypes.NUMBER
    }
});

user.sync();

export default user;