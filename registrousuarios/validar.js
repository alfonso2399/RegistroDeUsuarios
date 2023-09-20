function validar(){
    var nombre, apellidos, correo, usuario, clave, telefono;
    var expresion;
    nombre = document.getElementById("nombre").value;
    apellidos = document.getElementById("apellidos").value;
    correo = document.getElementById("correo").value;
    usuario = document.getElementById("usuario").value;
    clave = document.getElementById("clave").value;
    telefono = document.getElementById("telefono").value;

    expresion = "/\w+@w+\.[a-zA-Z]{2,6}/";

    if(nombre === "" || apellidos === "" || correo === "" || usuario === "" || clave === "" || telefono === ""){
        alert("Por favor ingresar todos los campo");
        return false;
    }
    
    if(nombre.lenght>10){
        alert("Por favor no execeder del limite del campo nombre");
        return false;
    }

    if(apellidos.lenght>10)
    {
        alert("Por favor no execeder del limite del campo apellido");
        return false;
    }

    if(correo.lenght>40)
    {
        alert("Por favor no execeder del limite del campo correo");
        return false;
    }

    if(!expresion.test(correo)){
        alert("No contine elementos necesesario para el correo");
        return false;
    }

    if(usuario.lenght>20){
        alert("Por favor no execeder del limite del campo usuario");
        return false;
    }

    if(clave.lenght>20)
    {   
        alert("Por favor no execeder del limite del campo clave");
        return false;
    }

    if(telefono.lenght>10){
        alert("Por favor no execeder del limite del campo telefono");
        return false;
    }

    else if(isNaN(telefono)){
        alert("no contiene numeros");
        return false;
    }
}
