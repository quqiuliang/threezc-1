<header>
	<div>
	导航
	</div>
	<?php 
	if ($this -> session -> userdata('logged_in') ) {
		echo '欢迎';
		echo $this -> session -> userdata('nickname');
		echo '<a href="/signin/logout">登出</a>';
	} else {
		echo '<a href="/signin">登录</a>';
	}
	?>
</header>