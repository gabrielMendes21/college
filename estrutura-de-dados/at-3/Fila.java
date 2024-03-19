// 1. Implementar a classe Fila (versão encadeada).
public class Fila {
  private class No {
    Object item;
    No proximo;
  }

  private No inicio;
  private No fim;

  public Fila() {
    this.inicio = new No();
    this.fim = this.inicio;
    this.inicio.proximo = null;
  }

  public void enfileirar(Object valor) {
    this.fim.proximo = new No();
    this.fim = this.fim.proximo;
    this.fim.item = valor;
    this.fim.proximo = null;
  }

  public Object desenfileirar() {
    if (this.vazia()) {
      System.out.println("Fila vazia");
    }

    this.inicio = this.inicio.proximo;
    return this.inicio.item;
  }

  public boolean vazia() {
    return this.inicio == this.fim;
  }

  public int tamanho() {
    // return this
  }

  public void imprime() {
    No aux;
    aux = this.inicio.proximo;
    while(aux != null) {
      if (aux.item instanceof Pessoa) {
        Pessoa p = (Pessoa) aux.item;
        System.out.print("" + p.getNome() + "\n");
      }
        aux = aux.proximo;
    }
    System.out.println();  
  }
}