function calcularTotal() {
    let cantidad = document.getElementById("cantidad").value;
    let precio = document.getElementById("precio").value;
    let errorTotal = document.getElementById("error-total");
    errorTotal.innerText = "";

    if (cantidad === "" || precio === "") {
        errorTotal.innerText = "Completa cantidad y precio primero.";
        return;
    }

    cantidad = parseFloat(cantidad);
    precio = parseFloat(precio);
    if (isNaN(cantidad) || isNaN(precio) || cantidad <= 0 || precio <= 0) {
        errorTotal.innerText = "Cantidad y precio deben ser mayores a 0.";
        return;
    }

    let total = cantidad * precio;
    document.getElementById("total").value = total.toFixed(2);
}

function marcarTotalInvalido() {
    let totalInput = document.getElementById("total");
    if (totalInput.value !== "") {
        totalInput.value = "";
    }
    document.getElementById("error-total").innerText =
        "Debes recalcular el total después de cambiar cantidad o precio.";
}

function validarFormulario() {
    let cliente = document.getElementById("cliente").value.trim();
    let producto = document.getElementById("producto").value.trim();
    let cantidad = parseFloat(document.getElementById("cantidad").value);
    let precio = parseFloat(document.getElementById("precio").value);
    let total = document.getElementById("total").value;

    if (cliente === "") {
        alert("El cliente es obligatorio");
        return false;
    }

    if (producto === "") {
        alert("El producto es obligatorio");
        return false;
    }

    if (isNaN(cantidad) || cantidad <= 0) {
        alert("La cantidad debe ser mayor a 0");
        return false;
    }

    if (isNaN(precio) || precio <= 0) {
        alert("El precio debe ser mayor a 0");
        return false;
    }

    if (total === "" || isNaN(parseFloat(total)) || parseFloat(total) <= 0) {
        alert("Primero debes calcular el total");
        return false;
    }

    return true;
}

document.addEventListener("DOMContentLoaded", function () {
    let cantidadInput = document.getElementById("cantidad");
    let precioInput = document.getElementById("precio");

    cantidadInput.addEventListener("input", marcarTotalInvalido);
    cantidadInput.addEventListener("change", marcarTotalInvalido);
    precioInput.addEventListener("input", marcarTotalInvalido);
    precioInput.addEventListener("change", marcarTotalInvalido);
});