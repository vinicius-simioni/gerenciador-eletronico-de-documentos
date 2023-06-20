function confirmRedirect(route) {
    if (confirm('Tem certeza que deseja excluir?')) {
        window.location.href = route;
    }
}