// 3. Implementar a Classe Principal
public class Main {
  public static void main(String[] args) {
    // 3.1. Instanciar 5 objetos da classe Pessoa
    Pessoa gabriel = new Pessoa("Gabriel", 22);
    Pessoa joao = new Pessoa("João", 21);
    Pessoa maria = new Pessoa("Maria", 20);
    Pessoa pedro = new Pessoa("Pedro", 19);
    Pessoa ana = new Pessoa("Ana", 18);

    // 3.2 Criar uma fila vazia
    Fila f = new Fila(); 

    // 3.3. Testar se a fila está vazia
    System.out.println(f.vazia() ? "Fila vazia" : "Fila não vazia");

    // 3.4. Enfileirar 4 objetos da classe Pessoa
    f.enfileirar(gabriel);
    f.enfileirar(joao);
    f.enfileirar(maria);
    f.enfileirar(pedro);

    // 3.5. Imprimir a Fila
    f.imprime();

    // 3.6. Desenfileirar, ou seja, remover o primeiro elemento da fila, retornando-o.
    f.desenfileirar();
    
    // 3.7. Imprimir a Fila
    f.imprime();

    // 3.8. Enfileirar mais um objeto da classe Pessoa.
    f.enfileirar(ana);

    // 3.9. Imprimir a Fila
    f.imprime();

    // 3.10. Qual é o tamanho da fila?
    System.out.println("Tamanho da fila: " + f.tamanho());
  }
}