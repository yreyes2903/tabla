

function agregardatos(nombre,apellido,email,edad){

 cadena={"nombre":nombre,"apellido":apellido,"email":email,"edad":edad }
//Otra forma de implementar el metodo ajax
  $.ajax({
  method: "POST",
  url: "php/agregarDatos.php",
  data: cadena,
}).done(function(r) {
  $('#tabla').load('componentes/tabla.php');
  alertify.success("agregado con exito :)");
}).fail(function() {
  alertify.error("Fallo el servidor :(");
})//.always(function() {
  //alert("Siempre se ejecuta")
//});
}

function agregaform(datos) {

  $('#idpersona').val(datos['id']);
  $('#nombreu').val(datos['nombre']);
  $('#apellidou').val(datos['apellido']);
  $('#emailu').val(datos['email']);
  $('#edadu').val(datos['edad']);

}

function actualizaDatos() {

  id=$('#idpersona').val();
  nombre=$('#nombreu').val();
  apellido=$('#apellidou').val();
  email=$('#emailu').val();
  edad=$('#edadu').val();
  cadena={"id":id,"nombre":nombre,"apellido":apellido,"email":email,"edad":edad };

  $.ajax({
      type: "POST",
      url: "php/actualizaDatos.php",
      data: cadena,
      success:function(r){
          if(r==1){
              $('#tabla').load('componentes/tabla.php');
              alertify.success("Actualizado con exito :)");
              } else {
                 alertify.error("Fallo el servidor :(");
              }
            }
          });
        }

function preguntaSiNo(id) {
  alertify.confirm('Eliminar Datos','¿Esta seguro que desea eliminar este registro?',
             function(){eliminarDatos(id)},
              function(){alertify.error('cancelar')});

}

function eliminarDatos(id){
  cadena="id=" + id;

  $.ajax({
    type: "POST",
    url: "php/eliminarDatos.php",
    data: cadena,
    success:function(r){
      if(r==1){
        $('#tabla').load('componentes/tabla.php');
        alertify.success("Eliminado con exito :)");
      } else {
        alertify.error("Fallo el servidor :(");
      }
    }
  });
}
