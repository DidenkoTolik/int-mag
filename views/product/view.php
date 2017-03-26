<?php include ROOT. '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                        <?php foreach($categories as $categoryItem):?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="/category/<?php echo $categoryItem['id']; ?>">
                                      <?php echo $categoryItem['name']?>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <?php endforeach;?>

                    </div><!--/category-products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="/assets/images/p-d/1.jpg" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="/assets/images/p-d/new.jpg" class="newarrival" alt="" />
                                <h2><?php echo $product['name'];?></h2>
                                <p><?php echo $product['code'];?></p>
                                        <span>
                                            <span><?php echo $product['price'];?></span>
                                            <label>Кількість:</label>
                                            <input type="text" value="3" />
                                            <button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В кошик
                                            </button>
                                        </span>
                                <p><b>Наявність:</b> На складі</p>
                                <p><b>Стан:</b> Нове</p>
                                <p><b>Виробник:</b></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Про товар</h5>
                            <p><?php echo $product['description'];?></p>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>


<br/>
<br/>
<?php include ROOT. '/views/layouts/footer.php'; ?>

