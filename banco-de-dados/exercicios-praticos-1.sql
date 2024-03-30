SELECT * FROM clientes
WHERE cliente_id IN (
    SELECT cliente_id FROM vendas
    WHERE valor_venda > AVG(valor_venda)
);

-- 1
SELECT * FROM produtos
WHERE NOT EXISTS (
    SELECT 1 FROM vendas
    WHERE produtos.produto_id = vendas.produto_id
);

-- 2
SELECT cliente_id, nome FROM clientes
WHERE cliente_id IN (
    SELECT vendas.cliente_id FROM vendas
    WHERE vendas.produto_id IN (
        SELECT produtos.produto_id FROM produtos
        WHERE produtos.nome LIKE 'Notebook' OR produtos.nome LIKE 'Smartwatch'
    )
);

-- 3
