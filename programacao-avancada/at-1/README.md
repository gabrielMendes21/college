# Como clonar o projeto
* Clone o projeto: `git clone https://github.com/gabrielMendes21/college.git`
* Acesse a pasta da atividade: `cd college/programacao-avancada/at-01`
* Execute o comando `composer install`
* Crie um banco MySQL chamado `aula_db`
* Acesse a pasta App: `cd App`
* Execute o servidor: `php -S localhost:3000`
* Agora é só testar os métodos HTTP:
    * Exemplo de JSON para a criação de um cliente:
    ```json
      {
        "nome": "Gabriel Mendes",
        "email": "gabriel@email.com",
        "cidade": "São Paulo",
        "estado": "SP"
      }
    ```
