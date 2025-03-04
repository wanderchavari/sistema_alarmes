document.addEventListener("DOMContentLoaded", function() {
    console.log("Sistema de Alarmes carregado!");

    // Exemplo: exibir alerta ao clicar em um botão de ativar alarme
    document.querySelectorAll(".btn-ativar").forEach(button => {
        button.addEventListener("click", function() {
            alert("Alarme ativado!");
        });
    });
});