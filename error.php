<?php 
    require_once 'bones/a_assets.php';  
?>  <div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<style type="text/css">
    html,body {
        height: 100%;
    }
    body {
        background: #fff;
        overflow: hidden;
    }

</style>

<script type="text/javascript" src="assets/assets/widgets/wow/wow.js"></script>
<script type="text/javascript">
    /* WOW animations */

    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
</script>

<img src="img/bg.jpg" class="login-img wow fadeIn" alt="">

<div class="center-vertical">
    <div class="center-content row">

        <div class="col-md-6 center-margin">
            <div class="server-message wow bounceInDown inverse">
                <h1>Error 404</h1>
                <h2>Page not found</h2>
                <p>The page you are looking for has been moved or no longer exists.</p> 
                <a href="index.php?1" style="color:blue;">Back to home</a>
            </div>
        </div>

    </div>
</div>
<?php require_once "bones/a_footer.php"; ?>
