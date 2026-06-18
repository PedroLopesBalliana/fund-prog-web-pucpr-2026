// Função para aplicar máscara de telefone (definie padrão)
function mascaraTelefone(event) {

    let telefone = event.target.value.replace(/\D+/g, "");

 
    if (telefone.length > 11) {
        telefone = telefone.substring(0, 11);
    }

    // Formatação do telefoneconforme o tamanho
    if (telefone.length > 10) {
        //(xx) xxxxx-xxxx
        telefone = telefone.replace(/^(\d{2})(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (telefone.length > 5) {
        //(xx) xxxx-xxxx
        telefone = telefone.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (telefone.length > 2) {
        // (xx) xxxx
        telefone = telefone.replace(/^(\d{2})(\d{0,5})/, "($1) $2");
    } else {
        // (xx
        telefone = telefone.replace(/^(\d*)/, "($1");
    }
    // Atualiza o valor do campo 
    event.target.value = telefone;
}


document.addEventListener('DOMContentLoaded', function () {
    // 
    document.getElementById('celular').addEventListener('input', mascaraTelefone);

    // Validação do formulário
    document.getElementById('cadastroForm').addEventListener('submit', function(e) {
        e.preventDefault(); 
        // Regex para validar formato final (xx) xxxxx-xxxx
        const celular = document.getElementById('celular').value;
        const regexTelefone = /^\(\d{2}\)\s\d{4,5}-\d{4}$/;

        if (regexTelefone.test(celular)) {
            document.getElementById('mensagemSucesso').style.display = 'block';
        } else {
            alert("Número de celular inválido. Use o formato (xx) xxxxx-xxxx");
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);

    document.getElementById("resName").textContent = params.get("name") || "";
    document.getElementById("resEmail").textContent = params.get("email") || "";
    document.getElementById("resCelular").textContent = params.get("celular") || "";
    document.getElementById("resDtNasc").textContent = params.get("dt_nasc") || "";
    document.getElementById("resEndereco").textContent = params.get("endereco") || "";
    document.getElementById("resCidade").textContent = params.get("cidade") || "";
    document.getElementById("resEstado").textContent = params.get("estado") || "";
});
