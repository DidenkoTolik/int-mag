<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright &copy; 2016-<?php echo date("Y"); ?></p>
                <p class="pull-right">Інтернет магазин</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->



<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.scrollUp.min.js"></script>
<script src="/assets/js/price-range.js"></script>
<script src="/assets/js/main.js"></script>

<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>

</body>
</html>