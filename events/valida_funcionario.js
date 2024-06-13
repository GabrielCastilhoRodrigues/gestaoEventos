let senha = document.getElementById("senha");
let confirmaSenha = document.getElementById("confirmaSenha");
let form = document.querySelector("form");

/*form.addEventListener('submit', (e) => {
  if (!validaEmail(email.value)) {
    email.setCustomValidity("Email inválido");
  } else {
    console.log('entrou aqui!')
    email.setCustomValidity("");
  }

  if (!cpfValido(cpf.value)) {
    
  }

  e.preventDefault();
});*/

function validaEmail() {
  var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var email = document.getElementById("email");

  if (re.test(email.value)) {
    email.setCustomValidity("");
  } else {
    email.setCustomValidity("Email inválido");
  }
}

function cpfValido() {
  var cpf = document.getElementById("cpf");
  var strCPF = cpf.value.replace(/[^a-z0-9]/gi,'');
  var Soma;
  var Resto;
  Soma = 0;


  if (strCPF == "00000000000") {
    cpf.setCustomValidity("CPF Inválido");
  } else {
    cpf.setCustomValidity("");
  }

  for (i = 1; i <= 9; i++)
    Soma = Soma + parseInt(String(strCPF).substring(i - 1, i)) * (11 - i);

  Resto = (Soma * 10) % 11;

  if (Resto == 10 || Resto == 11) Resto = 0;

  if (Resto != parseInt(String(strCPF).substring(9, 10))) {
    cpf.setCustomValidity("CPF Inválido");
  } else {
    cpf.setCustomValidity("");
  }

  Soma = 0;

  for (i = 1; i <= 10; i++)
    Soma = Soma + parseInt(String(strCPF).substring(i - 1, i)) * (12 - i);

  Resto = (Soma * 10) % 11;

  if (Resto == 10 || Resto == 11) Resto = 0;

  if (Resto != parseInt(String(strCPF).substring(10, 11))) {
    cpf.setCustomValidity("CPF Inválido");
  } else {
    cpf.setCustomValidity("");
  }
}

function validaSenha(){
    var senha = document.getElementById('senha');
    var confirmaSenha = document.getElementById('confirmaSenha');

    if(senha.value.length < 8){
        senha.setCustomValidity('Deve possuir pelo menos 8 caracteres');
    }
    else {
        senha.setCustomValidity('');
    }

    if (senha.value != confirmaSenha.value){
        confirmaSenha.setCustomValidity('As senhas devem ser iguais');
    }
    else{
        confirmaSenha.setCustomValidity('');
    }
}
