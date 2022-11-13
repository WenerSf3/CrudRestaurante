window.onload = function () {
  document.getElementById("msg5").innerHTML = 'Conta não existente! faça seu cadastro!';
  setTimeout(() => {
    document.getElementById("msg5").innerHTML = '';
  }, 6000);
}

function validsign() {

  let nomec = document.getElementById("nome2").value;
  let emailc = document.getElementById("email2").value;
  let telefonec = document.getElementById("telefone2").value;
  let senhac = document.getElementById("senha2").value;
  let novidades = document.querySelector("#novidades").checked;
  let novidades2 = '';
  let confirmSenhac = document.getElementById("confirmSenha2").value;
  let msg = document.getElementById('msg').value;

  function validandosenha() {
    if (senhac !== confirmSenhac) {
      document.getElementById("senha2").style = 'box-shadow: 1px 1px 2px 2px red;animation: treme 0.1s;';
      document.getElementById("confirmSenha2").style = 'box-shadow: 1px 1px 2px 2px red;animation: treme 0.1s;';
      if (nomec === '') {
        document.getElementById("nome2").style = 'box-shadow: 1px 1px 2px 2px red;animation: treme 0.1s;';
      } else {
        document.getElementById("nome2").style = 'box-shadow: 1px 1px 2px 2px green;animation: treme 0.1s;';
      }
      if (emailc === '') {
        document.getElementById("email2").style = 'box-shadow: 1px 1px 2px 2px red;animation: treme 0.1s;';
      } else {
        document.getElementById("email2").style = 'box-shadow: 1px 1px 2px 2px green;';
      }
      if (telefonec === '') {
        document.getElementById("telefone2").style = 'box-shadow: 1px 1px 2px 2px red;animation: treme 0.1s;';
      } else {
        document.getElementById("telefone2").style = 'box-shadow: 1px 1px 2px 2px green;';
      }
      if (senhac !== confirmSenhac) {
        msg = document.getElementById('msg').style = 'color: red;animation: treme 0.1s;';
        msg = document.getElementById('msg').innerHTML = "Senha errada";
        document.getElementsByClassName('senhas2').style = "border:1px solid red ;animation: treme 0.1s;";
      }
      setTimeout(() => {
        msg = document.getElementById('msg').innerHTML = "";
        if (nomec === '') {
          document.getElementById("nome2").style = 'box-shadow: 1px 1px 2px 1px black;';
        }
        if (emailc === '') {
          document.getElementById("email2").style = 'box-shadow: 1px 1px 2px 1px black;';
        }
        if (telefonec === '') {
          document.getElementById("telefone2").style = 'box-shadow: 1px 1px 2px 1px black;';
        }
        if (senhac === '') {
          document.getElementById("senha2").style = 'box-shadow: 1px 1px 2px 1px black;';
          document.getElementById("confirmSenha2").style = 'box-shadow: 1px 1px 2px 1px black;';
        }
      }, 3000)
    } else {
      validandocampos()
    }
  }

  function validandocampos() {
    if (nomec !== '' && emailc !== '' && telefonec !== '' && senhac !== '' && confirmSenhac !== '') {

      if (novidades) {
        novidades2 = 'SIM';
      } else {
        novidades2 = 'NAO';
      }

      const objeto = {
        nome: nomec,
        email: emailc,
        telefone: telefonec,
        senha: senhac,
        novidades2: novidades2
      };

      console.log(objeto)

      fetch("http://localhost/bomviver/cadastro.php", {
        method: "POST",
        body: JSON.stringify(objeto),
        headers: { "Content-type": "application/json; charset=UTF-8" },
      });

      msg = document.getElementById('msg').innerHTML = "Cadastro realizado";
      msg = document.getElementById('msg').style = 'color: green;';


      setTimeout(() => {
        msg = document.getElementById('msg').innerHTML = "";
        console.log(JSON.stringify(objeto))
        window.location.href = "Index.php";
      }, 2000)


    }
    else {
      if (nomec === '') {
        document.getElementById("nome2").style = 'box-shadow: 1px 1px 2px 2px red;animation: treme 0.1s;';

      } else {
        document.getElementById("nome2").style = 'box-shadow: 1px 1px 2px 2px green;';
      }
      if (emailc === '') {
        document.getElementById("email2").style = 'box-shadow: 1px 1px 2px 2px red;animation: treme 0.1s;';
      } else {
        document.getElementById("email2").style = 'box-shadow: 1px 1px 2px 2px green;';
      }
      if (telefonec === '') {
        document.getElementById("telefone2").style = 'box-shadow: 1px 1px 2px 2px red;animation: treme 0.1s;';
      } else {
        document.getElementById("telefone2").style = 'box-shadow: 1px 1px 2px 2px green;';
      }
      if (senhac === '') {
        document.getElementById("senha2").style = 'box-shadow: 1px 1px 2px 2px red;animation: treme 0.1s;';
        document.getElementById("confirmSenha2").style = 'box-shadow: 1px 1px 2px 2px red;animation: treme 0.1s;';
      } else {
        document.getElementById("senha2").style = 'box-shadow: 1px 1px 2px 1px green;';
        document.getElementById("confirmSenha2").style = 'box-shadow: 1px 1px 2px 1px green;';
      }
      msg = document.getElementById('msg').style = 'color: red;';
      msg = document.getElementById('msg').innerHTML = "Preencha os campos acima";

      setTimeout(() => {
        msg = document.getElementById('msg').innerHTML = "";
        if (nomec === '') {
          document.getElementById("nome2").style = 'box-shadow: 1px 1px 2px 1px black;';
        }
        if (emailc === '') {
          document.getElementById("email2").style = 'box-shadow: 1px 1px 2px 1px black;';
        }
        if (telefonec === '') {
          document.getElementById("telefone2").style = 'box-shadow: 1px 1px 2px 1px black;';
        }
        if (senhac === '') {
          document.getElementById("senha2").style = 'box-shadow: 1px 1px 2px 1px black;';
          document.getElementById("confirmSenha2").style = 'box-shadow: 1px 1px 2px 1px black;';
        }
      }, 3000)
    }

  }
  validandosenha()

  function logout() {
    conta = 0;
  }


}



