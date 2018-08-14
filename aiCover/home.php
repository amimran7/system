<?php
include "include/head.php";	

/*if($_SESSION['type']=="Admin"){
include "include/headAdmin.php";	
}
else{
include "include/headUser.php";	
}*/

?>
 

        <!--========== PAGE LAYOUT ==========-->
        <!-- About -->
        <div id="about">
            <div class="content-lg container">
                <!-- Masonry Grid -->
                <div class="masonry-grid row">
                    <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-1"></div>
                    <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 sm-margin-b-30">
                        <div class="margin-b-60">
                            <h2>The Cover by AI <input type="hidden" value="<?php echo $_SESSION['pk_users']; ?>" class="control-form form"></h2>
                            <p>Selling various items such as Patchwork, Bed Sheets, Kitchenware and Carpets</p>
                        </div>
                        <img class="full-width img-responsive wow fadeInUp" src="img/500x500/owner.jpeg" alt="Portfolio Image" data-wow-duration=".3" data-wow-delay=".2s">
                    </div>
                    <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4">
                        <div class="margin-b-60">
                            <img class="full-width img-responsive wow fadeInUp" src="img/500x500/shawl.jpeg" alt="Portfolio Image" data-wow-duration=".3" data-wow-delay=".3s">
                        </div>
                        <h2>Shawl</h2>
                        <p>Items made of patchwork such as mattress, baby mattress, blanket and bed sheets</p>
                    </div>
                    <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4">
                        <div class="margin-t-60 margin-b-60">
                            <h2>Bawal</h2>
                            <p>Design and items taken directly from the factory through the dropshipper</p>
                        </div>
                        <img class="full-width img-responsive wow fadeInUp" src="img/500x500/bawal1.jpg" alt="Portfolio Image" data-wow-duration=".3" data-wow-delay=".4s">
                    </div>
                </div>
                <!-- End Masonry Grid -->
            </div>
            
            <div class="bg-color-sky-light">
                <div class="content-lg container">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 md-margin-b-60">
                            <div class="margin-t-50 margin-b-30">
                                <h2>What is function of this system ?</h2>
                                <p style="font-size:14px; color:#600"> The function of this system one register product, edit/delete product and display the list of the pruduct. <br> This system  may also register the dropshipper, edit and delete the dropshipper when they quit from the business and display list of the system. <br> It may also manage the order in the same manner of the product. Lastly, it will display the performnace of the business. </p>
                            </div>
                            <a href="#" class="btn-theme btn-theme-sm btn-white-bg text-uppercase">Explore</a>
                        </div>
                        <div class="col-md-5 col-sm-7 col-md-offset-2">
                            <!-- Accordion -->
                            <div class="accordion">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a class="panel-title-child" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Dropshipper
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                The person who register with agent and get the supply from agent
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed panel-title-child" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Order
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                An order is place by dropshipper and agent to order the product
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed panel-title-child" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Report
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                The report will display the profit by month and year.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Accodrion -->
                        </div>
                    </div>
                    <!--// end row -->
                </div>
            </div>
        </div>
        <!-- End About -->

        <!-- Latest Products -->
<?php /*
        <div id="products">
            <div class="content-lg container">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                        <h2>Products</h2>
                        <h5 class="color-heading"> PATCHWORK, BED SHEETS, KITCHENWARE &amp; CARPETS</h5>
                    </div>
                </div>
                <!--// end row -->

                <div class="row">
                    <!-- Latest Products -->
                    <div class="col-sm-4 sm-margin-b-50">
                        <div class="margin-b-20">
                            <img class="img-responsive" src="image/product.PNG" alt="Latest Products Image">
                        </div>
                        <h4><a href="#">Products</a> <span class="text-uppercase margin-l-20">DESIGN</span></h4>
                        <p style="color:#600"><strong>More than one design of patchwork and from factory for each products</strong>.</p>
                        <a class="link" href="#">Read More</a>
                    </div>
                    <!-- End Latest Products -->

                    <!-- Latest Products -->
                    <div class="col-sm-4 sm-margin-b-50">
                        <div class="margin-b-20">
                            <img class="img-responsive" src="image/drop.jpg" alt="Latest Products Image">
                        </div>
                        <h4><a href="#">Dropship</a> <span class="text-uppercase margin-l-20">Management</span></h4>
                        <p style="color:#600"><strong>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</strong></p>
                        <a class="link" href="#">Read More</a>
                    </div>
                    <!-- End Latest Products -->

                    <!-- Latest Products -->
                    <div class="col-sm-4 sm-margin-b-50">
                        <div class="margin-b-20">
                            <img class="img-responsive" src="image/performance.jpg" alt="Latest Products Image">
                        </div>
                        <h4><a href="#">Performance</a> <span class="text-uppercase margin-l-20">REPORT</span></h4>
                        <p style="color:#600"><strong>Report of selling at the end of each year</strong></p>
                        <a class="link" href="#">Read More</a>
                    </div>
                    <!-- End Latest Products -->
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End Latest Products -->*/?>

                   
        <!-- Contact -->
        <div id="contact">
            <!-- Contact List -->
            <div class="section-seperator">
                <div class="content-lg container">
                    <div class="row">
                        <!-- Contact List -->
                        <div class="col-sm-4 sm-margin-b-50">
                            <h3><a href="#">Malaysia</a> <span class="text-uppercase margin-l-20">Johor</span></h3>
                            <p style="color:#600">Pura Kenchana 83000 Batu Pahat Johor</p>
                            <ul class="list-unstyled contact-list">
                                <li><i class="margin-r-10 color-base icon-call-out"></i> 019-5607146</li>
                                <li><i class="margin-r-10 color-base icon-envelope"></i> <a href="https://www.facebook.com/halimatus.saadiah1"> Facebook: Afiqah Izzaty</a></li>
                            </ul>
                        </div>
                        <!-- End Contact List -->

                       
                    </div>
                    <!--// end row -->
                </div>
            </div>
            <!-- End Contact List -->
            
            <!-- End Contact -->
        <!--========== END PAGE LAYOUT ==========-->

        <?php
include "include/footer.php";
?>