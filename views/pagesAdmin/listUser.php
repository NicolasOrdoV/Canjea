<?php 
$users = UserController::findUser(null,null);?>
<table class="table" id="myTable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo</th>
      <th scope="col">Direccion</th>
      <th scope="col">Fecha Nacimiento</th>
      <th scope="col">Estado</th>
      <th scope="col">Barrio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user ) { ?>
        <tr>
      <td><?php echo $user['Id_Usuario'] ?></td>
      <td><?php echo $user['Nombre'] ?></td>
      <td><?php echo $user['Apellido'] ?></td>
      <td><?php echo $user['Correo'] ?></td>
      <td><?php echo $user['Direccion'] ?></td>
      <td><?php echo $user['FechaNacimiento'] ?></td>
      <td><?php echo $user['Estado'] ?></td>
      <td><?php echo $user['street'] ?></td>
      <td>
      <?php if ($user['Estado'] == 'Activo') { ?>
           <form action="#" method="post">
           <input type="hidden" name="Id_Usuario" value="<?php echo $user['Id_Usuario'] ?>">
           <button class="btn btn-danger" type="submit"><i class="fas fa-user-slash"></i></button>
            <?php
                $active = new UserController();
                $active -> updateStatusActive();
            ?>
           </form>
        <?php }elseif ($user['Estado'] == 'Inactivo') { ?>
            <form method="post">
           <input type="hidden" name="Id_Usuario1" value="<?php echo $user['Id_Usuario'] ?>">
           <button class="btn btn-primary" type="submit"><i class="fas fa-user"></i></button>
            <?php  $Inactive = new UserController();
                    $Inactive->updateStatusInactive();?>
           </form>            
           <?php  } ?>
      </td>
    </tr>
   <?php } ?>
    
  </tbody>
</table>
