public class Main {
  public static void main(String[] args) {
    // Instância da classe Aluno
    Estudante gabriel = new Estudante();
    Estudante joao = new Estudante();
    Estudante paulo = new Estudante();
    Estudante lucas = new Estudante();

    // Atribuição de valores aos atributos da classe Aluno
    gabriel.nome = "Gabriel";
    gabriel.ra = 22302;

    paulo.nome = "Paulo";
    paulo.ra = 22301;

    joao.nome = "João";
    joao.ra = 22300;

    lucas.nome = "Lucas";
    lucas.ra = 22303;

    // Instância da classe Vetor
    Vetor vetor = new Vetor(3);

    // (a)
    vetor.adicionaNoInicio(gabriel);
    
    // (b)
    vetor.adicionaNoFim(joao);

    // (i)
    vetor.listar();

    // (c)
    vetor.adiciona(1, paulo);
    vetor.listar();

    // (d)
    vetor.remove(0);
    vetor.listar();

    // (e)
    System.out.println(vetor.contem(paulo));

    // (f)
    System.out.println(vetor.tamanho());

    // (g)
    System.out.println(vetor.estaCheia());

    // (h)
    System.out.println(vetor.estaVazia());
  }
}