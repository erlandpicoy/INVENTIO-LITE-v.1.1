<?php
	$users = CategoryData::getAll();
?>

<div class="row">
	<div class="col-md-12">
    <h1>Nueva Marca</h1>
    <br>

    <form  action="index.php?view=addcategory" method="POST">

      <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Marca*</label>
        <select class="form-control js-example-basic-single" id="select_name" style="width:300px" name="select_name">
          <?php foreach($users as $user){
          ?>  
            <option value="<?php echo $user->name; ?>"><?php echo $user->name; ?></option>		 
          <?php 
            }
          ?>       
        </select>
      </div>
      
      <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Categoria*</label>
        <select class="form-control js-example-basic-single" id="select_categoria" style="width:300px" name="select_categoria">
          <?php foreach($users as $user){
          ?>  
            <option value="<?php echo $user->categoria; ?>"><?php echo $user->categoria; ?></option>		 
          <?php 
            }
          ?>       
        </select>
      </div>
      
      <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Sub-Categoria*</label>
        <select class="form-control js-example-basic-single" id="select_subcategoria" style="width:300px" name="select_subcategoria">
          <?php foreach($users as $user){
          ?>  
            <option value="<?php echo $user->subcategoria; ?>"><?php echo $user->subcategoria; ?></option>		 
          <?php 
            }
          ?>       
        </select>
      </div>

      <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">Agregar Marca</button>
          </div>
      </div> 
      <!-- <input type="submit" name="Trazi" value="Treazi" class="btn btn-default btn-primary" onclick="return validate()"> -->
    </form>

<!--     
    <div>
      <h2>Continentes</h2>
      <select class="js-example-basic-single" name="continentes" id="continentes">
        <option value="0">Seleccione</option>
      </select>
    </div>

    <div>
      <h2>Países</h2>
      <select name="paises" id="paises">
        <option value="0">Seleccione</option>
      </select>
    </div>

     
      
      -->

      <script>
        $(function(){
          alert( 'funciona script' );

        // Lista de Continentes
        $.post( 'continentes.php' ).done( function(respuesta)
        {
          $( '#continentes' ).html( respuesta );
        });

        // lista de Paises	
        $('#continentes').change(function()
        {
          var el_continente = $(this).val();
          
          // Lista de Paises
          $.post( 'paises.php', { continente: el_continente} ).done( function( respuesta )
          {
            $( '#paises' ).html( respuesta );
          });
        });
        
        // Lista de Ciudades
        $( '#paises' ).change( function()
        {
          var pais = $(this).children('option:selected').html();
          alert( 'Lista de Ciudades de ' + pais );
        });

      })
      </script>

      <script>
        alert( 'funciona select' );

        $(document).ready(function() {
        $('.js-example-basic-single').select2();
      });         
      </script>

      <script>  
            var consulta;
                                                                              
            //hacemos focus al campo de búsqueda
            $("#busqueda").focus();
                                                                                                        
            //comprobamos si se pulsa una tecla
            $("#busqueda").keyup(function(e){
                                        
                  //obtenemos el texto introducido en el campo de búsqueda
                  consulta = $("#busqueda").val();
                                                                              
                  //hace la búsqueda
                                                                                      
                  $.ajax({
                        type: "POST",
                        url: "buscar.php",
                        data: "b="+consulta,
                        dataType: "html",
                        beforeSend: function(){
                              //imagen de carga
                              $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                        },
                        error: function(){
                              alert("error petición ajax");
                        },
                        success: function(data){                                                    
                              $("#resultado").empty();
                              $("#resultado").append(data);
                                                                
                        }
                  });
                                                                                      
                                                                              
            });
                                                                      
    });
      </script>

</form>
	</div>
</div>