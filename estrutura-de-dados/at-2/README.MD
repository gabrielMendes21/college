# Visão geral
Essa atividade consiste em criar uma stack (pilha) que recebe um array de letras (uma palavra).

# Detalhes
*  Junto com a pilha original, seriam criadas a pilha auxiliar e a pilha de saida. O objetivo era copiar as letras da pilha original para a pilha auxiliar, depois desempilhar a pilha auxiliar e colocar os dados na pilha de sáida. 
* Ao comparar a pilha original com a pilha de saída, eu teria a versão original da palavra, e a versão invertida. Se as duas pilhas fossem iguais, então a palavra é um palíndromo.

# Observações e aprendizado
* Pensando na lógica desse processo, nota-se que o uso de stacks é crucial para esse algoritmo, já que ao desempilhar a pilha auxiliar, eu obedeço o LIFO (last in, first out), fazendo com que a pilha de saída seja o inverso da pilha original.