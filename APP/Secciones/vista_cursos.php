<?php include ('../Templates/Cabecera.php');?>
<?php include ('../Secciones/Cursos.php');?>


<!-- Contenedor para el formulario de cursos -->
<div class="cold-md-5">
    <form action="" method="post">
        <div class="card">
            <div class="card-header">Cursos</div>
            <div class="card-body">
                
                <!-- Campo para ingresar el ID del curso -->
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input 
                            type="text"
                            class="form-control"
                            name="id"
                            id="id"
                            value="<?php echo $id; ?>"
                            aria-describedby="helpId" 
                            placeholder="ID" />
                </div>
                
                <!-- Campo para ingresar el nombre del curso -->
                <div class="mb-3">
                    <label for="nombre_curso" class="form-label">Nombre</label>
                    <input 
                            type="text"
                            class="form-control"
                            name="nombre_curso"
                            id="nombre_curso"
                            value="<?php echo $nombre_curso; ?>"
                            aria-describedby="helpId" 
                            placeholder="Nombre del curso">
                </div>  
                
                <!-- Grupo de botones para agregar, editar o borrar un curso -->
                <div class="btn-group" role="group" aria-label="submin group name">
                    <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="editar" class="btn btn-warning">Editar</button>
                    <button type="submit" name="accion" value="borrar" class="btn btn-danger">Borrar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Contenedor para la tabla de cursos -->
<div class="cold-md-7"> 
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                <!-- Iteramos sobre la lista de cursos y mostramos cada curso en una fila -->
                <?php foreach($listaCursos as $curso){?>
                <tr>
                    <td> <?php  echo $curso ['id'];?></td>
                    <td> <?php  echo $curso ['nombre_curso'];?> </td>
                    <td>
                        <!-- Formulario para seleccionar un curso -->
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo $curso ['id'];?>" />
                            <input type="hidden" name="nombre_curso" id="nombre_curso" value="<?php echo $curso ['nombre_curso'];?>" />
                            <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">
                        </form>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<?php include ('../Templates/Pie.php');?>