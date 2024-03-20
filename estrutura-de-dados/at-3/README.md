# Visão geral
Essa atividade consiste em criar uma fila (queue) encadeada de pessoas.

# Detalhes
* Existem duas classes (Fila e Pessoa) além da classe principal (Main). A classe Fila é a responsável por agrupar os objetos da classe Pessoa.
* Essas duas classes são instanciadas e testadas na classe principal.

# Observações e aprendizado
* Como uma fila respeita o padrão FIFO (first in, first out), a operação de dequeue (desenfileirar) sempre removerá o primeiro elemento da fila.
* Por ser encadeada, essas filas não têm um tamanho fixo, portanto, são bem mais flexíveis que um array comum.
* Ao criar a função que retorna o tamanho da fila, foi necessário realizar uma iteração em cada elemento da fila. No início o tamanho era sempre maior do que eu esperava, depois percebi que a variável `início` é apenas uma referência ao primeiro elemento da fila, ou até um nó vazio (no começo da fila, o `this.inicio` é um nó vazio, apenas apontando para o próximo elemento), então, como eu estava passando pelo início e pelo primeiro elemento, eu teria uma contagem repetida: `for (No l = this.inicio; l != null; l = l.proximo)`. Portanto, não precisava começar pela variável início, e sim pelo primeiro elemento da fila, que era `this.inicio.proximo`: `for (No l = this.inicio.proximo; l != null; l = l.proximo)`