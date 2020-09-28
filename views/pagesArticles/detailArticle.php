
<?php

if (isset($_GET['id'])) {
 $item = 'Id_articulo';
 $value = $_GET['id'];
 $articles = ArticleController::showArticles($item,$value);
 $date = date("Y-m-d");
 //echo $date;
}
 ?>

<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Inicio</a>
                        <a href="?pagesArticles=detailArticle.php">Productos</a>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <!-- <section class="product-shop spad page-details"> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="img/product-single/product-1.jpg" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="/Canjea/assets/img/Articles/<?php echo $articles['img'] ?>">
                                    <img src="/Canjea/assets/img/Articles/<?php echo $articles['img'] ?>" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span><?php echo $articles['Nombre_Categoria']?></span>
                                    <h3><?php echo $articles['Nombre']?></h3>
                                    <h3><?php echo $articles['correo']?></h3>
                                </div>
                                <div class="pd-desc">
                                    <p><?php echo $articles['Descripcion']?> </p>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="<?php echo $articles['Cantidad']?>">
                                    </div>
                                    <!--Inicio Modal-->
                                    <?php if($_SESSION['user'] == null) { ?>
                                        <a href="" class="primary-btn pd-cart"   data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Ofertar</a>
                                        <div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header"> Inicia Sesion  </div>
                                                <div class="modal-body"> Para poder ofertar o intercambiar , debe iniciar sesión  </div>
                                                <div class="modal-footer"><a href="index.php?pagesUser=loginUser" class="btn btn-warning"> Iniciar Sesión </a>   </div>
                                            </div>
                                            </div>
                                        </div>
                                    <?php }elseif($_SESSION['user']['Correo'] == $articles['correo']){ ?>
                                        <a href="" class="primary-btn pd-cart"   data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Ofertar</a>
                                    <div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h2>No puede Intercambiar</h2> 
                                              
                                            </div>
                                            <div class="modal-body">
                                              <p> No puede intercambiar , a tus mismos articulos</p>
                                                                                           
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn btn-warning"> Historial de Articulos</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    <?php }else{ ?>

                                    <a href="" class="primary-btn pd-cart"   data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Ofertar</a>
                                    <div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                               <h2 class="modal-title" id="exampleModalLabel">Ofertar</h2> 
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="#" method="post">
                                            <div class="modal-body">
                                              <input type="hidden" value="<?php echo $_SESSION['user']['Id_Usuario'] ?> " name="Id_Usuario">
                                              <input type="hidden" value="<?php echo $articles['Id_articulo'] ?> " name="Id_articulo">
                                              <input type="hidden" value="<?php echo $date ?> " name="Fecha_oferta">
                                                <div class="form-group">
                                                  <label for="recipient-name" class="col-form-label">Correo:</label>
                                                  <input type="text" class="form-control" id="recipient-name" name="Correo" value="<?php echo $articles['correo'] ?>" readonly >
                                                </div>
                                                <div class="form-group">
                                                  <label for="message-text" class="col-form-label">Mensaje:</label>
                                                  <textarea class="form-control" id="message-text" name="Mensaje"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                              <button type="submit" class="btn btn-primary">Contactar</button>
                                              <?php 
                                                if(isset($_POST['Id_articulo'])){
                                                    $answer =  OfferController::registerOffer($_POST);
                                                    if ($answer == "ok") {
                                                         OfferController::sendOffer($_POST,$articles,$date,$_SESSION['user']['Correo'],$_SESSION['user']['Nombre'],);
                                                         echo '<script> alert("Se envio la oferta") </script>';
                                                         echo '<script> window.location="index.php"; </script>';
                                                    }
                                                }
                                              ?>
                                             </div>
                                           </form>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- CIERRE MODAL -->
                                    <?php } ?>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>CATEGORÍAS: </span><?php echo $articles['Nombre_Categoria']?></li>
                                </ul>
                                <div class="pd-share">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">Descripcion</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>Descripcion:</h5>
                                                <p><?php echo $articles['Descripcion']?></p>
 -->                                            </div>
                                            <div class="col-lg-5">
                                                <img src="img/product-single/tab-desc.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">$495.00</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+ add to cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock">22 in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight">1,3kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">Xxl</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td><span class="cs-color"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">00012</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>2 Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-2.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>Your Ratind</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages"></textarea>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </section> -->