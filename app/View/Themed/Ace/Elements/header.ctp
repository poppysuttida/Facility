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

			<div class="navbar-header pull-left">
				<a href="#" class="navbar-brand">
					<small>
						<i class="fa fa-leaf"></i>
						Facility
						<?php echo 'สวัสดีคุณ '.$this->Session->read('user_login.user_name'); ?>
					</small>
				</a>
			</div>	
		</div><!-- /.navbar-container -->
	</div>