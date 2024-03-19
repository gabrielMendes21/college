import javax.swing.JOptionPane;

public class Main {
  public static void main(String[] args) {
    // Coletar uma palavra do usuário
    /* Palíndromos para testes
       * arara
       * renner
       * osso
    */

    /* Não-palíndromos para testes
      * abacate
      * carro
      * bola
    */
    String userInput = JOptionPane.showInputDialog("Digite uma palavra:");
    int tamanhoDaPalavra = userInput.length();

    // Criar uma pilha com o tamanho da palavra
    Pilha pilha = new Pilha(tamanhoDaPalavra);
    Pilha pilhaAuxiliar = new Pilha(tamanhoDaPalavra);
    Pilha saida = new Pilha(tamanhoDaPalavra);

    // Inserção das letras na pilha original e na pilha auxiliar
    for (int i = 0; i < userInput.length(); i++) {
      // Se i = 0, então charAt(i) retorna a primeira letra da palavra, e por aí vai
      pilha.push(userInput.charAt(i));
      pilhaAuxiliar.push(userInput.charAt(i));
    }

    // Remoção das letras da pilha auxiliar e inserção na pilha de saída
    for (int i = 0; i < userInput.length(); i++) {
      saida.push(pilhaAuxiliar.pop());
    }

    // Verificar se a palavra é um palíndromo
    boolean isPalindromo = true;

    for (int i = 0; i < userInput.length(); i++) {
      if (pilha.pop() != saida.pop()) {
        isPalindromo = false;
        break;
      }
    }

    // Exibir o resultado
    System.out.println(isPalindromo ? "A palavra é um palíndromo." : "A palavra não é um palíndromo.");
  }
}