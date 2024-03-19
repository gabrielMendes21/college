public class Vetor {
  private int tamanho;
  public int totalDeObjetos = 0;
  private Estudante[] objetos; 
  
  public Vetor(int tamanho) {
    this.tamanho = tamanho;
    this.objetos = new Estudante[tamanho];
  }

  // (a) Adiciona um elemento no início da lista
  public void adicionaNoInicio(Estudante objeto) {
    // Desloca os objetos para a direita
    for (int i = this.totalDeObjetos - 1; i >= 0; i--) {
      this.objetos[i + 1] = this.objetos[i];
    }

    // Insere o objeto no início dda lista
    this.objetos[0] = objeto;
    this.totalDeObjetos++;
  }

  // (b) Adiciona um elemento no final da lista
  public void adicionaNoFim(Estudante objeto) {
    // this.garantaEspaco();
    this.objetos[this.totalDeObjetos] = objeto;
    this.totalDeObjetos++;
  }

  // (c) Adiciona um objeto em qualquer posição da lista
  public void adiciona(int posicao, Estudante objeto) {
    // Garante que há espaço para adicionar o objeto
    // this.garantaEspaco();

    if (this.totalDeObjetos == tamanho) {
      System.out.println("Vetor cheio");
      return;
    }

    if (!this.posicaoValida(posicao)) {
      throw new IllegalArgumentException("Posicao inválida");
    } 

    // Desloca os objetos para a direita
    for (int i = this.totalDeObjetos - 1; i >= posicao; i--) {
      this.objetos[i + 1] = this.objetos[i];
    }

    // Insere o objeto na posição específica
    this.objetos[posicao] = objeto;
    this.totalDeObjetos++;
  }

  // (d) Remove um item do vetor
  public void remove(int posicao) {
    // Não permitir a remoção em uma lista vazia
    if (this.totalDeObjetos == 0) {
      System.out.println(
          "Não é possível remover um item de uma lista vazia");

      return;
    }
    
    if (!this.posicaoOcupada(posicao)) {
      throw new IllegalArgumentException("Posicao inválida");
    }


    // Desloca os objetos para a esquerda
    for (int i = posicao; i < this.totalDeObjetos - 1; i++) {
      this.objetos[i] = this.objetos[i + 1];
    }

    this.totalDeObjetos--;
  }

  // (e) Verifica se o vetor contem um objeto
  public boolean contem(Estudante aluno) {
    for (int i = 0; i < this.totalDeObjetos; i++) {
      if (aluno.equals(this.objetos[i])) {
        return true;
      }
    }

    return false;
  }
  
  // (f) Retorna o tamanho da lista
  public String tamanho() {
    return "Tamanho da lista: " + this.totalDeObjetos;
  }

  // (g) Verificar se a lista está cheia
  public String estaCheia() {
    return this.totalDeObjetos == this.tamanho ? "Lista cheia" : "Lista não cheia";
  }
  
  // (h) Verificar se a lista está vazia
  public String estaVazia() {
    return this.totalDeObjetos == 0 ? "Lista vazia" : "Lista não vazia";
  }

  // Listar os objetos da lista
  public void listar() {
    for (int i = 0; i < totalDeObjetos; i++) {
      System.out.println("Nome: " + this.objetos[i].nome);
      System.out.println("Matrícula: " + this.objetos[i].ra);
      System.out.println();
    }

    System.out.println("================================\n");
  }

  // Verifica se a posição está ocupada
  private boolean posicaoOcupada(int posicao) {
    return posicao >= 0 && posicao < this.totalDeObjetos;
  }

  // Verifica se a posição é válida
  private boolean posicaoValida(int posicao) {
    return posicao >= 0 && posicao <= this.totalDeObjetos;
  }
  
  // // Pega um objeto do vetor

  // Garante que há espaço para adicionar um objeto
  // private void garantaEspaco() {
  //   if (this.totalDeObjetos == this.objetos.length) {
  //     Estudante[] novaArray = new Estudante[this.objetos.length * 2];
  //     for (int i = 0; i < this.objetos.length; i++) {
  //       novaArray[i] = this.objetos[i];
  //     }
  //     this.objetos = novaArray;
  //   }
  // }
}
