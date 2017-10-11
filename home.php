<?php
  include('header.php');
  include('get_counts.php');
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li class="active"><i class="fa fa-home"></i> Home</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                  <div class="panel-body">Total Customers - <?php echo $result['customer_count']; ?></div>
                </section>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                  <div class="panel-body">Total Insurance - 20</div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                  <div class="panel-body">Renewed Insurance - 05</div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                  <div class="panel-body">Upcoming Renewable - 12</div>
                </section>
            </div>
        </div> -->
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php
  include('footer.php');
?>
