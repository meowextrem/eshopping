<?php $this->load->view('main_head_view') ?>  

    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>

    <!-- Shop Start -->

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <?php if ($this->cart->total_items()) { ?>
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php
                            $i = 0;
                            foreach ($cart_contents as $cart_items) {
                                $i++;
                                ?>
                                <tr>
                                    <td class="align-middle"><img src="<?php echo HOST_API_IMAGE_FOLDER_URL.$cart_items['options']['product_image'] ?>" alt="" style="width: 50px;"> <?php echo $cart_items['name'] ?></td>
                                    <td class="align-middle">$ <?php echo $cart_items['price'] ?></td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <input type="text" class="form-control form-control-sm bg-secondary text-center" value="<?php echo $cart_items['qty'] ?>">
                                        </div>
                                    </td>
                                    <td class="align-middle">$ <?php echo $this->cart->format_number($cart_items['subtotal']) ?></td>
                                    <td class="align-middle">
                                        <form action="<?php echo base_url('remove_to_cart'); ?>" method="post">
                                            <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>"/>
                                            <input type="submit" class="btn btn-sm btn-primary" name="submit" value="X"/>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                <?php } else {
                    echo "<h1>Your Cart is Empty</h1>";
                }
                ?>    
                
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$ <?php echo $this->cart->format_number($this->cart->total()) ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">FREE</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">DISCOUNT (10%)</h6>
                            <h6 class="font-weight-medium">$ <?php
                                $total = $this->cart->total();
                                $tax = ($total * 10) / 100;
                                echo $this->cart->format_number($tax);
                                ?>    
                            </h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$ <?php echo $this->cart->format_number($this->cart->total() - $tax); ?></h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

<?php $this->load->view('main_footer_view') ?>;