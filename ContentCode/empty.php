<h1>Welcome to ClassCrowd</h1>

	
<h3>Hi
		<?php  
			$user = User::getUserById($_COOKIE['id']);
			echo $user->name . "!"; 
		?>
</h3>

<p>In order to start, you have to choose a class in the left sidebar!</p>

	<ul id="empty-list">
		<img id="arrow-left" src="images/arrow-left.png">
		<li><span>On ClassCrowd you are able to view any <span class="special-char">class</span> you wish</span></li>
		<li><span>In order to add/edit content of the <span class="special-char">class</span> you have to belong to it.</span></li>
		<li><span>Obviosly you can only be in one <span class="special-char">class</span> at the same time... :) </span></li>
		<li><span>Your <span class="special-char">class</span> is <b><?php echo $_SESSION['class_name']; ?></b> (also displayed under your name in the sidebar!)</span></li>
		<li><span>In <span class="special-char">class</span> you can view/create <span class="special-char">Subjects</span></span></li>
		<li><span>In <span class="special-char">Subject</span> you can view/create/edit lesson <span class="special-char">Notes</span></span></li>
	</ul>