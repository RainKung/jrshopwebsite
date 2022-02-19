<div class="col-sm-4">
                <div class="card">
                    <div class="card-header">แก้ไขข้อมูลเบื้องต้น</div>
                    <div class="card-body">
                        <form method="post" action="">
                            <input type="hidden"name="edit_title">
                            <div class="form-group">
                                <input type="text" class="form-control" name="title_name" placeholder="ชื่อเว็บช็อป" value="<?php echo $config['title'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="www" placeholder="เช่น http://localhost/amc" value="<?php echo $config['www'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="description" placeholder="รายละเอียดเว็บไซต์" value="<?php echo $config['description'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="icon" placeholder="ลิ้ง Icon" value="<?php echo $config['icon'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="background" placeholder="ลิ้ง Background" value="<?php echo $config['background'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="announce" placeholder="announce" value="<?php echo $config['announce'] ?>">
                            </div>							
                            <div class="form-group">
                                <input type="text" class="form-control" name="page_id" placeholder="page_id" value="<?php echo $config['page_id'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="logged" placeholder="logged" value="<?php echo $config['logged'] ?>">
                            </div>							
                            <button class="btn btn-success btn-block">อัพเดทข้อมูล</button>
                        </form>
                    </div>
                </div>
                    <p></p>
                <div class="card">
                    <div class="card-header">แก้ไขข้อมูล ติดต่อ</div>
                    <div class="card-body">

                        <form method="post" action="">
                            <input type="hidden" name="edit_fanpage">
                            <div class="form-group">
                                <input type="text" class="form-control" name="pageurl" placeholder="FanPage_Url" value="<?php echo $website['pageurl'] ?>">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="page" id="page">
					<option <?php if($website['page'] == "true"){echo "selected";} ?> value="true">เปิดใช้งานได้</option>
					<option <?php if($website['page'] == "false"){echo "selected";} ?> value="false">ปิดใช้งาน</option>
				</select>
                            </div>
                            <button class="btn btn-success btn-block">อัพเดทข้อมูล</button>
                        </form>
                    </div>
                </div>
                    <p></p>
                    <div class="card">
                    <div class="card-header">เพิ่ม ข่าวสาร</div>
                    <div class="card-body">

                        <form method="post" action="">
                            <input type="hidden" name="insert_news">
                            <div class="form-group">
                                <input type="text" class="form-control" name="news" placeholder="ข่าสาร">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="date" placeholder="เวลา">
                            </div>
                            <button class="btn btn-success btn-block">เพิ่มข้อมูล</button>
                        </form>
                        
                        <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th>ข่าวสาร</th>
                                                <th>ตัวเลือก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                $i =0 ;
                                $news_q = $connect->query("SELECT * FROM news");
                               while($news = $news_q->fetch_assoc())
                               {
                                   $i++; ?>
                                            <tr>
                                                <td><?php echo $news['info']; ?></td>
                                                <td><a href="?page=admin&menu=website&news_delete=true&news_id=<?php echo $news['id']; ?>" class="btn btn-danger">ลบ</a></td>
                                            </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                </div>
                </div> <!--End col-sm-3-->
                <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">แก้ไขข้อมูล Vidio</div>
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                <iframe width="848.5" class="embed-responsive-item" height="500" src="https://www.youtube.com/embed/<?php echo $website['videourl']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <hr>
                    <form method="post" action="">
                        <input type="hidden" name="edit_video">
                <div class="input-group" style="margin:10px;">
                  <span class="input-group-addon">https://www.youtube.com/embed/</span>
                  <input type="text" class="form-control" style="text-align:center;" name="videourl" value="<?php echo $website['videourl']; ?>">
                </div>
                        <div class="form-group">
                                <select class="form-control" name="video" id="video">
					<option <?php if($website['video'] == "true"){echo "selected";} ?> value="true">เปิดใช้งานได้</option>
					<option <?php if($website['video'] == "false"){echo "selected";} ?> value="false">ปิดใช้งาน</option>
				</select>
                            </div>
                        <button type="submit" class="btn btn-block btn-success">อัพเดทข้อมูล</button>
                    </form>
                        </div>
                    </div>
                    <p></p>
                    <div class="card">
                    <div class="card-header">เปิด - ปิด ระบบเติมเงิน</div>
                    <div class="card-body">
                        <form method="post">
                            <div class="alert alert-danger">ไม่แนะนำให้ปิดนะ #ทำไว้ทดสอบ</div>
                       <div class="form-group">
                           <label>ระบบเติมเงิน TrueWallet</label>
                                <select class="form-control" name="truewallet" id="truewallet">
					<option <?php if($website['truewallet'] == "true"){echo "selected";} ?> value="true">เปิดใช้งานได้</option>
					<option <?php if($website['truewallet'] == "false"){echo "selected";} ?> value="false">ปิดใช้งาน</option>
				</select>
                            </div>
                        <div class="form-group">
                           <label>ระบบเติมเงิน TrueMoney</label>
                                <select class="form-control" name="truemoney" id="truemoney">
					<option <?php if($website['truemoney'] == "true"){echo "selected";} ?> value="true">เปิดใช้งานได้</option>
					<option <?php if($website['truemoney'] == "false"){echo "selected";} ?> value="false">ปิดใช้งาน</option>
				</select>
                            </div>
                            <input type="hidden" name="edit_topup">
                            <button type="submit" class="btn btn-success btn-block">แก้ไขระบบ</button>
                    </form>
                        </div>
                    </div><p></p>
                    <div class="card">
                    <div class="card-header">เปิด - ปิด ระบบรับ Point ฟรี</div>
                    <div class="card-body">
                        <form method="post">
                        <div class="form-group">
                                <select class="form-control" name="pointfree" id="pointfree">
					<option <?php if($website['pointfree'] == "true"){echo "selected";} ?> value="true">เปิดใช้งานได้</option>
					<option <?php if($website['pointfree'] == "false"){echo "selected";} ?> value="false">ปิดใช้งาน</option>
				</select>
                            </div>
                            <input type="hidden" name="edit_pointfree">
                            <button type="submit" class="btn btn-success btn-block">แก้ไขระบบ</button>
                    </form>
                        </div>
                    </div><p></p>
                    <div class="card">
                    <div class="card-header">เปิด - ปิด ระบบสุ่มไอดี</div>
                    <div class="card-body">
                        <form method="post">
                        <div class="form-group">
						<label>แถบเมนูสุ่มไอดี</label>
                        <select class="form-control" name="random" id="random">
					          <option <?php if($website['random'] == "true"){echo "selected";} ?> value="true">เปิดใช้งานได้</option>
					          <option <?php if($website['random'] == "false"){echo "selected";} ?> value="false">ปิดใช้งาน</option>
				        </select>
                        </div>						
                        <div class="form-group">
						<label>ระบบสุ่มไอดี</label>
                        <select class="form-control" name="random2" id="random2">
					          <option <?php if($website['random2'] == "true"){echo "selected";} ?> value="true">เปิดใช้งานได้</option>
					          <option <?php if($website['random2'] == "false"){echo "selected";} ?> value="false">ปิดใช้งาน</option>
				        </select>
                        </div>
                        <input type="hidden" name="edit_random">
                        <button type="submit" class="btn btn-success btn-block">แก้ไขระบบ</button>
                    </form>
                        </div>
                    </div>					
					
                </div><!--End col-sm-6-->