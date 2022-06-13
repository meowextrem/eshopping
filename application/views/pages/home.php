<?php $this->load->view('main_head_view') ?>



<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php if(empty($all_latest_products)) { ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-120" src="<?php echo base_url(); ?>assets/shoppingui/img/index.png"alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Products Coming Soon!</h6>
                        
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <?php foreach($all_latest_products as $latest_product) { ?>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-120" src="<?php echo HOST_API_IMAGE_FOLDER_URL.$latest_product['image']?>" alt="" >
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $latest_product['thename']; ?></h6>
                            <div class="d-flex justify-content-center">
                                <h6>$<?php echo $latest_product['price']; ?></h6><h6 class="text-muted ml-2"><del>$<?php echo $latest_product['price']; ?></del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a class="btn btn-sm text-dark p-0"></a>
                            <a href="<?php echo site_url().'add_to_cart/'.$latest_product['id']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>

            <?php } ?>

        <?php } ?>
        
    </div>
</div>
<!-- Products End -->


<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">All Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">

        <?php if(empty($all_featured_products)) { ?>

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-120" src="<?php echo base_url(); ?>assets/shoppingui/img/index.png"alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">Products Coming Soon!</h6>
                        
                    </div>
                </div>
            </div>

        <?php } else { ?>

            <?php $count = 0; ?>
            <?php while ($count < 3) { ?>
                <?php foreach($all_featured_products as $featured_product) { ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-120" src="<?php echo HOST_API_IMAGE_FOLDER_URL.$featured_product['image']?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo $featured_product['thename']; ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$<?php echo $featured_product['price']; ?></h6><h6 class="text-muted ml-2"><del>$<?php echo $featured_product['price']; ?></del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a class="btn btn-sm text-dark p-0"></a>
                                <a href="<?php echo site_url().'add_to_cart/'.$featured_product['id']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                <?php $count++; ?>
                <?php } ?>
            <?php } ?>
            

        <?php } ?>

        
        
        
    </div>
</div>

<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-6 pb-4" style="left: 25%;">
            <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">10% off the all order</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Browse all the products</h1>
                    <a href="<?php echo site_url().'products'?>" class="btn btn-outline-primary py-md-2 px-md-3">Click Here</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- Products End -->

<?php $this->load->view('main_footer_view') ?>;