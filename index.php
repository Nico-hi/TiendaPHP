<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda PHP</title>
</head>

<body>
    <h2>Hombre tengo una BBDD que te quiero mostrar...</h2>
    <p>sabes cual es el problema??? tu me tienes que decir que queieres ver...</p>
    <form action="./search.php" method="post" autocomplete="off">
        <label for="action"> elije una de las 4 opciones para hacer :
            <select name="action" id="action" required>
                <option value="" >seleciona una opcion</option>
                <option value="select" >visualizar los datos</option>
                <option value="insert" >insertar un dato</option>
                <option value="delete" >eliminar un dato</option>
                <option value="update" >actualizar un dato</option>
            </select>
        </label>
        <br>
        <section>
            <h2>selecciona una tabla</h2>

            <input type="radio" value="usuario" id="usuario" name="valor_tabla" required>
            <label for="usuario">tabla de usuarios</label>
            <br>
            <input type="radio" value="ventas" id="ventas" name="valor_tabla" required>
            <label for="ventas">tabla de ventas</label>
            <br>
            <input type="radio" value="ambos" id="ambos" name="valor_tabla" required>
            <label for="ambos">ambas tablas</label>
        </section>

        <section>
            <section id="tablas">
            </section>
        </section>

        <section>
            <section id="condicion"></section>
        </section>

        <input type="submit">
    </form>
            <script defer>
                document.querySelector('form').addEventListener('submit', function(e) {
                    let checkboxes = document.querySelectorAll('input[name="valor_vista[]"]');
                    let isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                    if (!isChecked) {
                        alert('Selecciona al menos un campo');
                        e.preventDefault();
                    }
                });
                // para aparicion de los checkbox de las opciones de las tablas
                let seleccionado = document.querySelectorAll('input[name="valor_tabla"]');
                let salida_opcion_sect=document.getElementById('tablas');
                seleccionado.forEach((radio) => {
                    radio.addEventListener("change", function () {
                        let accion=radio.value;
                        
                        let salida_opcion=`<h2>elije los que datos quieres sacar :</h2>`;
                        if(accion == "usuario"){
                            salida_opcion+=` 
                            <input type="checkbox" value="id" id="ID" name="valor_vista[]">
                            <label for="ID">Identificador</label><br>

                            <input type="checkbox" value="nombre" id="Name" name="valor_vista[]">
                            <label for="Name">Nombre</label><br>

                            <input type="checkbox" value="apellidos" id="LastName" name="valor_vista[]">
                            <label for="LastName">Apellido</label><br>

                            <input type="checkbox" value="fecha_registro" id="Date" name="valor_vista[]">
                            <label for="Date">Fecha de Registro</label><br>

                            
                            `;
                        }else if(accion == "ventas"){
                            salida_opcion+=` 
                            <input type="checkbox" value="id" id="ID" name="valor_vista[]">
                            <label for="ID">Identificador</label><br>

                            <input type="checkbox" value="cantidad_ventas" id="cant_ventas" name="valor_vista[]">
                            <label for="cant_ventas">Cantidad que Vendio</label><br>

                            <input type="checkbox" value="cantidad_stock" id="cant_stock" name="valor_vista[]">
                            <label for="cant_stock">Cantidad en Stock</label><br>

                            <input type="checkbox" value="categoria" id="category" name="valor_vista[]">
                            <label for="category">Categoria del evento</label><br>
                            
                            `;
                        }else if(accion == "ambos"){
                            salida_opcion+=` 
                            <input type="checkbox" value="id" id="ID" name="valor_vista[]">
                            <label for="ID">Identificador</label><br>

                            <input type="checkbox" value="nombre" id="Name" name="valor_vista[]">
                            <label for="Name">Nombre</label><br>

                            <input type="checkbox" value="apellidos" id="LastName" name="valor_vista[]">
                            <label for="LastName">Apellido</label><br>

                            <input type="checkbox" value="fecha_registro" id="Date" name="valor_vista[]">
                            <label for="Date">Fecha de Registro</label><br>

                            <input type="checkbox" value="cantidad_ventas" id="cant_ventas" name="valor_vista[]">
                            <label for="cant_ventas">Cantidad que Vendio</label><br>

                            <input type="checkbox" value="cantidad_stock" id="cant_stock" name="valor_vista[]">
                            <label for="cant_stock">Cantidad en Stock</label><br>

                            <input type="checkbox" value="categoria" id="category" name="valor_vista[]">
                            <label for="category">Categoria del evento</label><br>
                            `;
                        }
                        salida_opcion_sect.innerHTML=salida_opcion;
                    });
                });

                let accion_selector = document.getElementById('action');
                let salida_accion_sect=document.getElementById('condicion');
                accion_selector.addEventListener("change", function() {
                    let accion= accion_selector.value;
                    let salida_accion=`<h2>seleccionaste la opcion de `;
    
                    if(accion==="select"){
                        salida_accion+=`poder ver que contiene la tabla</h2> <br> 
                        <p>buscas un dato en especifico??, si lo dejas en blanco no hay problema</p>
                        <label for="condition"> 
                        <input type="input" id="condition" name="condition">
                        </label>

                        `;
    
                    }else if(accion==="insert"){
                        salida_accion+=``;
                    
                    }else if(accion==="delete"){
                        salida_accion+=``;
                    
                    }else if(accion==="update"){
                        salida_accion+=``;
                    
                    }
                    salida_accion_sect.innerHTML=salida_accion;
                });
                


            </script>

</body>

</html>