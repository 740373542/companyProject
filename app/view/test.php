<?php 
 require \view("header");
 require \component("comp_test");
?>




<div id="test">
	<!-- <div style="font-size:20px">{{}}</div> -->
	<div class="tm-sidebar">
                <img src="img/menu-top.jpg" alt="Menu top image" class="img-fluid tm-sidebar-image">
                <nav class="tm-main-nav">
                    <ul>
                        <li class="tm-nav-item"><a href="#home" class="tm-nav-item-link">Home</a></li>
                        <li class="tm-nav-item"><a href="#about" class="tm-nav-item-link">About</a></li>
                        <li class="tm-nav-item"><a href="#ideas" class="tm-nav-item-link">Ideas</a></li>
                        <li class="tm-nav-item"><a href="#contact" class="tm-nav-item-link">Contact</a></li>
                    </ul>
                </nav>
            </div>



	<comp_test v-bind:name="ls">
	</comp_test>




	
</div>



<script>


$$.vue({
	el:"#test",

	data:{
		ls:"lh",
	},

	init:function(){
		$$.event.send("AAA")
	},

	methods:{

		test:function(){
		},


	}
})



</script>