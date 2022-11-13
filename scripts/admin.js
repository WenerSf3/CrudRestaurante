
function addprato() {
  let modal_formprato = document.getElementById('addpratos');

  if (modal_formprato) {
    modal_formprato.classList.add('mostre');
    modal_formprato.addEventListener('click', (e) => {
      if (e.target === e.currentTarget) {
        modal_formprato.classList.remove('mostre');
      }
    })
  }
}

function adicionarprato() {

  let foto = document.getElementById('foto').value;
  let nome = document.getElementById('nomeprato').value;
  console.log(foto)
  document.getElementById('imgteste').src = foto;
  window.location.href = 'admin.php';

  var objeto = {
    nome: nome,
    foto: foto
  }

  fetch("http://localhost/bomviver/fotos.php", {
    method: "POST",
    body: JSON.stringify(objeto),
    headers: { "Content-type": "application/json; charset=UTF-8" },
  });
  
}
function teste(){
  let foto = document.getElementById('foto').value;
  let nome = document.getElementById('nomeprato').value;

  document.getElementById('imgteste').src = foto ;
  document.getElementById('nometeste').innerHTML = nome ;
}
