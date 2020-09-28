<?php 
$users=UserController::findUser(null,null);
$Offers=OfferController::listOffer(null,null);
$Citations=CitationController::listCitation();
$Total_users=count($users);
$Total_offers=count($Offers);
$Total_citations=count($Citations);
var_dump($Total_citations);
?>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-secondary">
                <strong class="card-title text-light">Usuarios totales del sistema</strong>
            </div>
            <div class="card-body text-white bg-warning">
                <p class="card-text text-light ">
                    <h1 class="text-center text-light" > <?php echo $Total_users ?> </h1>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-secondary">
                <strong class="card-title text-light">Ofertas</strong>
            </div>
            <div class="card-body text-white bg-warning">
                <p class="card-text text-light">
                    <h1 class="text-center text-light"><?php echo $Total_offers ?></h1>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-secondary">
                <strong class="card-title text-light">Citaciones</strong>
            </div>
            <div class="card-body text-white bg-warning">
                <p class="card-text text-light"><h1 class="text-center text-light"><?php echo $Total_citations ?></h1>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-4">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Id_Usuario</th>
                                                <th>Nombre</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $user) { ?>
                                                <tr class="spacer"></tr>
                                                <tr class="tr-shadow">
                                                    <td><?php echo $user['Id_Usuario']?></td>
                                                    <td>
                                                        <span class="block-email"><?php echo $user['Nombre']?></span>
                                                    </td>
                                                </tr>
                                                
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>


</div>