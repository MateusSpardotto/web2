function validarFormulario() {
    let nome = document.getElementById('nome').value.trim();
    let idade = document.getElementById('idade').value;
    let cpf = document.getElementById('cpf').value.replace(/\D/g, '');
    let apt = document.getElementById('apartamento').value;
    let senha = document.getElementById('senha').value;

    document.getElementById('nome').value = nome.charAt(0).toUpperCase() + nome.slice(1);
    
    if (idade < 18) {
        alert('Idade mínima de 18 anos.');
        return false;
    }
    if (cpf.length !== 11) {
        alert('CPF deve ter 11 dígitos.');
        return false;
    }
    if (!validarNumero(apt)) {
        alert('Número do apartamento inválido.');
        return false;
    }
    if (!/^[0-9]{4}$/.test(senha)) {
        alert('A senha deve ter exatamente 4 dígitos numéricos.');
        return false;
    }
    return true;
}

function validarNumero(numero) {
  if (numero < 100 || numero > 900) {
      return false; // Fora do intervalo permitido
  }

  let ultimosDois = numero % 100; // Pegando os dois últimos dígitos

  if (ultimosDois > 10) {
      return false; // Os últimos dois dígitos devem estar entre 00 e 10
  }

  return true; // Número válido
}