        document.querySelector('form').addEventListener('submit', function (e) {
            let checkboxes = document.querySelectorAll('input[name="valor_vista[]"]');
            let isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            if (!isChecked) {
                alert('Selecciona al menos un campo');
                e.preventDefault();
            }
        });
        // para aparicion de los checkbox de las opciones de las tablas
        let seleccionado = document.querySelectorAll('input[name="valor_tabla"]');
        let salida_opcion_sect = document.getElementById('tablas');
        seleccionado.forEach((radio) => {
            radio.addEventListener("change", function () {
                let accion = radio.value;

                let salida_opcion = `<h2>elije los que datos quieres sacar :</h2>`;
                if (accion == "usuario") {
                    salida_opcion += ` 
                            <input type="checkbox" value="id" id="ID" name="valor_vista[]">
                            <label for="ID">Identificador</label><br>

                            <input type="checkbox" value="nombre" id="Name" name="valor_vista[]">
                            <label for="Name">Nombre</label><br>

                            <input type="checkbox" value="apellidos" id="LastName" name="valor_vista[]">
                            <label for="LastName">Apellido</label><br>

                            <input type="checkbox" value="fecha_registro" id="Date" name="valor_vista[]">
                            <label for="Date">Fecha de Registro</label><br>

                            
                            `;
                } else if (accion == "ventas") {
                    salida_opcion += ` 
                            <input type="checkbox" value="id" id="ID" name="valor_vista[]">
                            <label for="ID">Identificador</label><br>

                            <input type="checkbox" value="cantidad_ventas" id="cant_ventas" name="valor_vista[]">
                            <label for="cant_ventas">Cantidad que Vendio</label><br>

                            <input type="checkbox" value="cantidad_stock" id="cant_stock" name="valor_vista[]">
                            <label for="cant_stock">Cantidad en Stock</label><br>

                            <input type="checkbox" value="categoria" id="category" name="valor_vista[]">
                            <label for="category">Categoria del evento</label><br>
                            
                            `;
                } else if (accion == "ambos") {
                    salida_opcion += ` 
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
                salida_opcion_sect.innerHTML = salida_opcion;
            });
        });
        // Opciones por acción
        let accion_selector = document.getElementById('action');
        let salida_accion_sect = document.getElementById('condicion');
        accion_selector.addEventListener("change", function () {
            let accion = accion_selector.value;
            let salida_accion = '';

            // Despliega condicional para "select"
            if (accion === "select") {
                salida_accion = `<h2>seleccionaste la opcion de poder ver que contiene la tabla</h2>
                <p>buscas un dato en especifico??, si lo dejas en blanco no hay problema</p>
                <label for="condition">Formato <b> dato_elegido = valor </b>, si el valor es texto ponlo entre comillas
                    <input type="text" id="condition" name="condition" placeholder="dato = valor">
                    <br> El dato elegido lo sacas de la <b>parte superior</b>.
                </label>`;
            } else if (accion === "insert") {
                salida_accion = `<h2>Introduce los datos nuevos:</h2>
                <label for="values">El formato de ingreso debe ser : <br>
                    <b>Si no tienes un valor dejalo en blanco o ponlo en "" </b> <br>
                <input type="text" name="values" id="values" placeholder="valor1,valor2,...,valorN"></label>`;
            } else if (accion === "delete") {
                salida_accion = `<h2>Selecciona los datos a eliminar :</h2>
                    <label for="condition">Formato <b> dato_elegido = valor </b>, si el valor es texto ponlo entre comillas
                        <input type="text" id="condition" name="condition" placeholder="dato = valor">
                        <br> El dato elegido lo sacas de la <b>parte superior</b>.
                    </label>`;
            } else if (accion === "update") {
                salida_accion = `<h2>Actualiza un registro:</h2>
                <label for="set"> Aqui pon <b> dato_elegido = nuevo valor </b>
                        <input type="text" id="set" name="set" placeholder="dato = valor">
                </label> <br>
                <label for="condition">Formato <b> dato_elegido = valor </b>, si el valor es texto ponlo entre comillas
                        <input type="text" id="condition" name="condition" placeholder="dato = valor">
                        <br> El dato elegido lo sacas de la <b>parte superior</b>.
                </label>`;
            }
            salida_accion_sect.innerHTML = salida_accion;
        });


