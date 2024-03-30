-- TABLES
CREATE TABLE Clientes (
    cliente_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    estado VARCHAR(2) NOT NULL
);

CREATE TABLE Produtos (
    produto_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    categoria VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);

CREATE TABLE Vendas (
    venda_id INT PRIMARY KEY AUTO_INCREMENT,
    cliente_id INT NOT NULL,
    produto_id INT NOT NULL,
    data_venda DATE NOT NULL,
    valor_venda DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES Clientes(cliente_id),
    FOREIGN KEY (produto_id) REFERENCES Produtos(produto_id)
);

-- INSERTS
INSERT INTO Clientes (nome, email, cidade, estado) VALUES
  ('João Silva', 'joaosilva@email.com', 'São Paulo', 'SP'),
  ('Maria Oliveira', 'mariaoliveira@email.com', 'Rio de Janeiro', 'RJ'),
  ('Pedro Souza', 'pedrosouza@email.com', 'Belo Horizonte', 'MG'),
  ('Ana Costa', 'anacosta@email.com', 'Salvador', 'BA'),
  ('Carlos Santos', 'carloshsantos@email.com', 'Curitiba', 'PR'),
  ('Fernanda Lima', 'fernandalim@email.com', 'Brasília', 'DF'),
  ('Roberto Dias', 'robertodias@email.com', 'Fortaleza', 'CE'),
  ('Eduardo Pereira', 'eduardopereira@email.com', 'Recife', 'PE'),
  ('Gabriela Reis', 'gabrielareis@email.com', 'Porto Alegre', 'RS'),
  ('Marcelo Campos', 'marcelocampos@email.com', 'Manaus', 'AM');
INSERT INTO Produtos (nome, categoria, preco) VALUES
  ('Notebook', 'Eletrônicos', 2000.00),
  ('Smartphone', 'Eletrônicos', 1500.00),
  ('Smartwatch', 'Eletrônicos', 500.00),
  ('Camisa', 'Vestuário', 100.00),
  ('Calça', 'Vestuário', 150.00),
  ('Tênis', 'Vestuário', 200.00),
  ('Livro', 'Livros', 50.00),
  ('Caneta', 'Papelaria', 10.00),
  ('Lápis', 'Papelaria', 5.00),
  ('Borracha', 'Papelaria', 2.00);
INSERT INTO Vendas (cliente_id, produto_id, data_venda, valor_venda) VALUES
  (1, 1, '2023-01-01', 100.00),
  (2, 2, '2023-02-02', 200.00),
  (3, 3, '2023-03-03', 300.00),
  (4, 1, '2023-04-04', 400.00),
  (5, 2, '2023-05-05', 500.00),
  (6, 3, '2023-06-06', 600.00),
  (7, 1, '2023-07-07', 700.00),
  (8, 2, '2023-08-08', 800.00),
  (9, 3, '2023-09-09', 900.00),
  (10, 1, '2023-10-10', 1000.00);

-- EXERCISES
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
