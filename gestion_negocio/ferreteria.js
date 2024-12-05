function agregarProductoFerreteria() {
    const nombre = document.getElementById('nombreFerreteria').value;
    const familia = document.getElementById('familiaFerreteria').value;
    const tamano = document.getElementById('tamanoFerreteria').value;
    const precio = document.getElementById('precioFerreteria').value;
    const departamentos = Array.from(document.querySelectorAll('input[name="departamentos[]"]:checked')).map(el => el.value);

    console.log({ nombre, familia, tamano, precio, departamentos }); // Depuración

    fetch('agregar_producto_ferreteria.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            nombre: nombre,
            familia: familia,
            tamano: tamano,
            precio: precio,
            departamentos: departamentos // Envía el array de departamentos
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Producto agregado correctamente');
        } else {
            alert('Error al agregar producto: ' + data.error);
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
    });
}
