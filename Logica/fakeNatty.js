function calcularFormula1(pontos, resultados) { //Função na qual vai calcular a pontuação total dos corredores e esse função será chamada no último "for"
    let pontosMax = -1;
    let vitoriosos = [];

    for (let n = 1; n <= pontos.length; n++) { // Loop para repetir até a pontuação necessária para a concu
        let atualPontos = 0;

        for (let o = 0; o < resultados.length; o++) {// Loop para ser feita a impressão da pontuação dos competidores
            let lugar = resultados[o][n - 1];
            atualPontos += pontos[lugar - 1];
        }

        if (atualPontos > pontosMax) {// Condição para caso a pontuação máxima seja igual a pontuação atual.
            pontosMax = atualPontos;
            vitoriosos = [n];
        } else if (atualPontos === pontosMax) {
            vitoriosos.push(n);
        }
    }

    return vitoriosos;
}

function main(vida) { //Essa função é pra valiadar a pontuação dos participantes
    const linhas = vida.trim().split("\n");
    let inicio = 0;

    while (true) {
        const [G, P] = linhas[inicio++].split(" ").map(Number);

        if (G === 0 && P === 0) {
            break;
        }

        const pontos = linhas[inicio++].split(" ").map(Number);
        const resultados = [];

        for (let n = 0; n < G; n++) {
            resultados.push(linhas[inicio++].split(" ").map(Number));
        }

        const S = Number(linhas[inicio++]);
        const sys_pontos = [];

        for (let n = 0; n < S; n++) {
            const [K, ...pontuados] = linhas[inicio++].split(" ").map(Number);
            sys_pontos.push(pontuados);
        }

        for (const sistema of sys_pontos) {
            const champions = calcularFormula1(sistema, resultados, sys_pontos); //Função chamada como dito anteriormente
            console.log(champions.join(" "));
        }
    }
}
//Aqui vai imprimir a saída do resultado das pontuações dos competidores
const vida = `
2 4
10 8 6 5
1 2 3 4
4 1 2 3
1
2 10 5
0 0
3
1 3 9 5
7 5 1 8
2 4 5 
0 0
`;

main(vida); // Imprime o resultado