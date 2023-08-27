
//Essa estrutura serve para repetir os números de 1 a 50
for(let m = 1; m<=50; m++){
//Condição para mostrar que o número é múltiplo de 3
if(m%3 == 0 && m<=50){
console.log(m,'Fizz')
}
// Condição para mostrar que o número é múltiplo de 5
else if(m%5 == 0 && m<=50){
   console.log(m,'Buzz');
}
//Condição para quando for os dois e ou nenhum
else{
    console.log(m,'FizzBuzz')
}
}
