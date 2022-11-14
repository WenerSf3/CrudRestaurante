
let conta = 0;
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

function login(){
  let inputs = document.querySelectorAll('input');
  let modal_formlogin = document.querySelector('#modal_formlogin');


  if (modal_formlogin && conta === 0) {

    modal_formlogin.classList.add('show');

    modal_formlogin.addEventListener('click', (e) => {
      if (e.target === e.currentTarget) {
          modal_formlogin.classList.remove('show');
          inputs.forEach(e => {
              e.value = '';
          });
      }
    })
  }
}
function validlogin() {
  let email = document.getElementById("email").value;
  let senha = document.getElementById("senha").value;
  let modal_formlogin = document.querySelector('#modal_formlogin');

  if (email === '' || senha === '') {
    document.getElementById("email").style = 'box-shadow: 1px 1px 2px 2px red;';
    document.getElementById("senha").style = 'box-shadow: 1px 1px 2px 2px red;';
    document.getElementById("msg2").style = 'color: red;';
    document.getElementById("msg2").innerHTML = 'Preencha os campos';
    setTimeout(() => {
      document.getElementById("email").style = 'box-shadow: transparent;';
      document.getElementById("senha").style = 'box-shadow: transparent;';
    document.getElementById("msg2").innerHTML = '';
    }, 3000)
  }
  else {
    document.getElementById("email").style = 'box-shadow: 1px 1px 2px 2px green;';
    document.getElementById("senha").style = 'box-shadow: 1px 1px 2px 2px green;';
    document.getElementById('botao').type = 'submit';

    setTimeout(() => {

      modal_formlogin.classList.remove('show');
      document.getElementById('modal_formlogin').style.display = 'none';

    }, 2000)
    document.getElementById('sair').style = 'display:block;';
    document.getElementById('recebern').style = 'display:flex;';
    document.getElementById('loginc').style = 'display:none;';
    document.getElementById('signc').style = 'display:none;';
    conta = 1;
  }
}
function logout() {
  window.location.href = "Index.php";
  docu
  conta = 0;
}



function sign() {
  let inputs = document.querySelectorAll('input');
  let modal_formsign = document.querySelector('#modal_formsign');
  document.getElementById('modal_formlogin').style.display = 'none';

  if (modal_formsign && conta === 0) {
    modal_formsign.classList.add('show');
    modal_formsign.addEventListener('click', (e) => {
      if (e.target === e.currentTarget) {
        modal_formsign.classList.remove('show');
        document.getElementById('modal_formlogin').style.display = 'flex';
  
        inputs.forEach(e => {
          e.value = '';
          document.getElementById('modal_formlogin').style = 'display:flex;justify-content:center;';
          document.querySelector('.modal_contentlogin').style = 'margin-top:60px;';
        });
      }
    })
  }
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

      if(novidades){
        novidades2 = 'SIM';
      }else{
        novidades2 = 'NAO';
      }

      const objeto = {
        nome: nomec,
        email: emailc,
        telefone: telefonec,
        senha: senhac,
        novidades2 : novidades2
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
        document.getElementById('modal_formlogin').style.display = 'flex';
        modal_formsign.classList.remove('show');
        console.log(JSON.stringify(objeto))
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


