public class Pilha {
  private int tamanho;
  private int topo;
  private int totalDeLetras;
  private char[] pilha;

  public Pilha(int tamanho) {
    this.tamanho = tamanho;
    this.topo = -1;
    this.totalDeLetras = 0;
    pilha = new char[tamanho];
  }

  // Inserção de letras na pilha
  public void push(char letra) {
    if (isFull()) {
      System.out.println("A pilha está cheia!");
    } else {
      this.topo++;
      this.pilha[this.topo] = letra;
      this.totalDeLetras++;
    }
  }

  // Remoção de letras da pilha
  public char pop() {
    if (isEmpty()) {
      System.out.println("A pilha está vazia!");
      return '1';
    } else {
      char removedChar = this.pilha[this.topo];
      this.topo--;
      return removedChar;
    }
  }

  public void listar() {
    for (int i = 0; i <= this.topo; i++) {
      System.out.println(this.pilha[i]);
    }
  }

  // Verificar se a pilha está cheia
  public boolean isFull() {
    return this.totalDeLetras == this.tamanho ? true : false;
  }

  // Verificar se a pilha está vazia
  public boolean isEmpty() {
    return this.totalDeLetras == 0 ? true : false;
  }
}