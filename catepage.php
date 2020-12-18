<?php 
require_once('header.php');
if(!isset($_GET['id'])){
	echo "<script>alert('id is not select plz select it');
	window.location.href='index.php';</script>";

}
?>

<?php
if(isset($_GET['id'])){
    $m=$_GET['id'];
    require_once('class/product.php');
    require_once('class/dbcon.php');
    $obj= new DB();
    $obj2=new Product();
   $back= $obj2->cat_dyn($m,$obj->conn);
  foreach($back as $val){
      echo $val['html'];
  }
  $back2=$obj2->cont_dyn($m,$obj->conn);


?>
	<div class="content">
					
					<div class="tab-prices">
						<div class="container">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs" id="abc">
								<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
									<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
									</ul>
							
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
									<?php	foreach($back2 as $value){
                                            $abc=json_decode($value['description'], true);  ?>
										<div class="linux-prices">
											<div class="col-md-3 linux-price">
											
												<div class="linux-top">
												<h4><?php echo $value['prod_name']?></h4>
												</div>
												<div class="linux-bottom">
													<h5><?php echo $value['mon_price']?> <span class="month">per month</span></h5>
													<h6>Single Domain</h6>
													<ul>
													<li><strong><?php echo $abc['web_space']?></strong> Disk Space</li>
													<li><strong><?php echo $abc['band_width']?></strong> Data Transfer</li>
													<li><strong><?php echo $abc['mail']?></strong> Email Accounts</li>
													<li><strong><?php echo $abc['free_domain']?> </strong>  Global CDN</li>
													<li><strong>High Performance</strong>  Servers</li>
													<li><strong>location</strong> : <img src="images/india.png"></li>
													</ul>
												</div>
												<a class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm<?php $value['prod_name']?>">Buy-Now</a></td>
												<!-- <a href="cartpage.php?id=<?php echo $value['prod_parent_id'] ?>">buy now</a> -->
												<div class="modal fade" id="modalLoginForm<?php $val['prod_name']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
													aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
														<div class="modal-header text-center">
															<h4 class="modal-title w-100 font-weight-bold">Price-Select</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form method="POST">
														<div class="modal-footer d-flex justify-content-center">
														
													   <a href="cartpage.php?id=<?php echo $value['prod_parent_id'] ?>&&action=mon&&action2=<?php echo $value['prod_id'] ?>"  class="btn btn-default" >Monthly</a>
													   <a href="cartpage.php?id=<?php echo $value['prod_parent_id'] ?>&&action=ann&&action2=<?php echo $value['prod_id'] ?>"  class="btn btn-default" >Annually</a>
													
														</div>
														</form>
														</div>
														</div>
														</div>
                                          
										
									<?php }} ?>
									<div class="clearfix"></div>
										</div>

										
									</div>
								</div>
							</div>
						</div>
					</div>

				<div class="clients">
					<div class="container">
						<h3>Some of our satisfied clients include...</h3>
						<ul>
							<li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
							<li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
							<li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
							<li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
							<li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
							<li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
						</ul>
					</div>
				</div>

					<div class="whatdo">
						<div class="container">
							<h3><?php echo $value['prod_name']?>-Features</h3>
                        
							<div class="what-grids">
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="what-grids">
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-move" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

				</div>

<?php 
require_once('footer.php');

?>