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
  validandosenha()

  function logout() {
    conta = 0;
  }



