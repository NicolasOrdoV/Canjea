<?php 
$categories = Categories::showCategories();?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre Categoria</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categories as $categorie ) { ?>
        <tr>
      <td><?php echo $categorie['Id_categoria'] ?></td>
      <td><?php echo $categorie['Nombre_Categoria'] ?></td>
      <td><?php echo $categorie['Estado'] ?></td>
      <td>
      <?php if ($categorie['Estado'] == 'Activo') { ?>
           <form action="#" method="post">
           <input type="hidden" name="Id_categoria" value="<?php echo $categorie['Id_categoria'] ?>">
           <button class="btn btn-danger" type="submit">Inhabilitar</button>
            <?php
              $active = new  Categories();
              $active->updateStatusInactive();
            ?>
           </form>
        <?php }elseif ($categorie['Estado'] == 'Inactivo') { ?>
            <form method="post">
           <input type="hidden" name="Id_categoria1" value="<?php echo $categorie['Id_categoria'] ?>">
           <button class="btn btn-primary" type="submit">Habilitar</button>
            <?php  $Inactive = new Categories();
                   $Inactive->updateStatusActive();?>
           </form>            
           <?php  } ?>
      </td>
    </tr>
   <?php } ?>
    
  </tbody>
</table>
