document.querySelectorAll('.excluir-usuario').forEach(function (link) {
    link.addEventListener('click', function (event) {
        if (!window.confirm("Tem certeza que deseja excluir este usuário?")) {
            event.preventDefault();
        }
    });
});