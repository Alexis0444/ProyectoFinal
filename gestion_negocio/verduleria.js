function agregarProductoVerduleria() {
    const nombre = document.getElementById('nombreFruta').value;
    const familia = document.getElementById('familiaFruta').value;
    const tipo = document.getElementById('tipoFruta').value;
    const precio = document.getElementById('precioFruta').value;
    const organico = document.getElementById('organico').checked ? 1 : 0;
    const importado = document.getElementById('importado').checked ? 1 : 0;
    const nacional = document.getElementById('nacional').checked ? 1 : 0;

    fetch('agregar_producto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            nombre: nombre,
            familia: familia,
            tipo: tipo,
            precio: precio,
            organico: organico,
            importado: importado,
            nacional: nacional
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Producto agregado correctamente');
        } else {
            alert('Error al agregar producto');
        }
    });
}
