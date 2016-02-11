<div id="navbar" class="navbar navbar-default">
		<script type="text/javascript">
			try{ace.settings.check('navbar' , 'fixed')}catch(e){}
		</script>

		<div class="navbar-container" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>

			<div class="">
				<a href="#" class="navbar-brand">
					<small>
						<!-- <i class="fa fa-leaf"></i> -->
						Facility
						

					</small>
				</a>
				<!-- <a href="" class="btn btn-danger" style="float:right">ออกจากระบบ</a> -->
				<a href="#" class="navbar-brand" style="float:right">
					<small >
						<?php 

							if($this->Session->read('user_login.user_name') != ""){
								echo 'สวัสดีคุณ '.$this->Session->read('user_login.user_name');
							}
							?>
					</small>
				</a>
				<div class="row">
       			 <div class="col-xs-6 col-md-12">
            <div align = "right">
            <?php 

							if($this->Session->read('user_login.user_name') != ""){
								echo $this->Html->link( 'ออกจากระบบ', array('controller' => 'logins','action' => 'logout' ) ,array('class' => 'btn btn-primary'));
							}
							?>
            </div>
        </div>
        </div>
			</div>	
		</div><!-- /.navbar-container -->
	</div>