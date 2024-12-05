function agregarTiempoCiber() {
    const computadora = document.getElementById('computadora').value;
    const ip = document.getElementById('ip').value;
    const usuario = document.getElementById('usuario').value;
    const tiempo = document.getElementById('tiempo').value;
    const precio = document.getElementById('precio').value;

    fetch('agregar_producto_ciber.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            computadora: computadora,
            ip: ip,
            usuario: usuario,
            tiempo: tiempo,
            precio: precio
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Tiempo agregado correctamente');
        } else {
            alert('Error al agregar tiempo');
        }
    });
}
