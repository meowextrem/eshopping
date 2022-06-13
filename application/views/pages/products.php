<?php $this->load->view('main_head_view') ?>  

    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Products</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Products</p>
            </div>
        </div>
    </div>

    <!-- Shop Start -->

    <!-- Products Start -->
        <div class="container-fluid pt-5">
            
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
                        
                    <?php } ?>
                    

                <?php } ?>

                
                
                
            </div>
        </div>

<?php $this->load->view('main_footer_view') ?>;