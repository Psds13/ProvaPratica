function FiboSeq(p){ //Função pra mostrar a sequência e essa função vai ser chamada no final do algoritmo
    console.log('Eis a sequência:'); //Apenas uma mensagem de título para a questão
    const seq = [0, 1]; //Const vai receber a primeira sequência da função

    for (let x = 2; x < p; x++) { //Estrutura que vai retornar a sequência de Fibonacci
        const proxSeq = seq[x - 1] + seq[x - 2]; //Variável para a receber a próxima sequência
        seq.push(proxSeq);//Retorna os valores para o vetor da sequência
    }

    return seq; //Retorna a sequência
}

const EaSeqFib = FiboSeq(40); //Essa variável vai receber a função da sequência de Fibonacci e como dito anteriormente a função foi chamada
console.log(EaSeqFib);//Imprime o resultado das sequências pedidas