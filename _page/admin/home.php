<div class="col-md-12" style="margin-top: 5px;">
<div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <h4 class="card-header">สินค้าทั้งหมด<?php
                                $product_r_q = $connect->query("SELECT * FROM products");
                                                $product_row = $product_r_q->num_rows; ?></h4>
                                <div class="card-body">
                                <div class="text-right">
                                    <h2 class="font-light m-b-0"></i> <?php echo $product_row; ?></h2>
                                    <span class="text-muted">ชิ้น</span>
                                </div>
                                <span class="text-success"><?php echo $product_row; ?>%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $product_row; ?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </div>
                        </div>
                    </div>
					
                    <div class="col-sm-6">
                        <div class="card">
                            <h4 class="card-header">สั่งซื้อทั้งหมด<?php
                                $row_buyp_all = $connect->query("SELECT * FROM products");
                                                $row_buyp = $row_buyp_all->num_rows; ?></h4>
                                <div class="card-body">
                                <div class="text-right">
                                    <h2 class="font-light m-b-0"></i> <?php echo $row_buyp; ?></h2>
                                    <span class="text-muted">ครั้ง</span>
                                </div>
                                <span class="text-info"><?php echo $row_buyp; ?>%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $row_buyp; ?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                             </div>
                        </div>
                    </div>
					
                </div>
    <br>
    <div class="row">
    <div class="col-sm-12">
    <div class="card">
  <div class="card-header">
    <i class="fa fa-home"></i> หน้าหลัก
  </div>
        <div id="return"></div>
  <div class="card-body">
        <b> NameWebSite : </b><span class="pull-right"> <?php echo $config['name']; ?></span>
        <br><br>
        <b> WebSiteVersion : </b><span class="pull-right"> 1.0.0</span>
        <br><br>
        <b> Topup WalletEmail : </b><span class="pull-right"> <?php echo $config['truewallet_email']; ?></span>
        <br><br>
        <b> NameWebSite : </b><span class="pull-right"> <?php echo $config['name']; ?></span>
        <br><br>
        <b> LicenseKey : </b><span class="pull-right"> HUD-DHVG-IWCSVE-199</span>
        <br><br>
</div>
    <br>
</div>    
</div>
    </div>
</div>
