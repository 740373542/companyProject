<template id="vue_page_index">

            <div class="tm-main-content">
                <section id="home" class="tm-content-box tm-banner" style="height:200px;">
                    <div class="tm-banner-inner">
                        <h1 class="tm-banner-title" style="">三包干脆面</h1>
                            
                    </div>                    
                </section>

                <section>
       
                    <div id="about" class="tm-content-box">
                        
                        <ul class="boxes gallery-container">
                            <li class="box box-bg" v-for="v in ls">
                                <div class="tm-section-title tm-section-title-box tm-box-bg-title">
                                	<div style="width:2.66rem;height:2.66rem;border-radius:100%;box-shadow:0 0 5px #CDCDCD;display:flex;justify-content:center;align-items:center">

                                			<img :src="v.bg_img" style="width:100%;height:100%;border-radius:100%">
                               
                                	</div>
                                </div>
                                <img src="img/white-bg.jpg" alt="Image" class="img-fluid">
                            </li>
                           <!--  <li class="box">
                                <a href="img/idea-large-01.jpg"><img src="img/idea-01.jpg" alt="Image" class="img-fluid"></a>
                            </li>
                            <li class="box box-bg">
                                <h2 class="tm-section-title tm-section-title-box tm-box-bg-title">Develop</h2>
                                <img src="img/white-bg.jpg" alt="Image" class="img-fluid">
                            </li>
                            <li class="box">
                                <a href="img/idea-large-02.jpg"><img src="img/idea-02.jpg" alt="Image" class="img-fluid"></a>
                            </li>
                            <li class="box box-bg">
                                <h2 class="tm-section-title tm-section-title-box tm-box-bg-title">Design</h2>
                                <img src="img/white-bg.jpg" alt="Image" class="img-fluid">
                            </li>
                            <li class="box">
                                <a href="img/idea-large-03.jpg"><img src="img/idea-03.jpg" alt="Image" class="img-fluid"></a>
                            </li>
                            <li class="box box-bg">
                                <h2 class="tm-section-title tm-section-title-box tm-box-bg-title">Support</h2>
                                <img src="img/white-bg.jpg" alt="Image" class="img-fluid">
                            </li>
                            <li class="box">
                                <a href="img/idea-large-04.jpg"><img src="img/idea-04.jpg" alt="Image" class="img-fluid"></a>
                            </li>
                            <li class="box box-bg">
                                <h2 class="tm-section-title tm-section-title-box tm-box-bg-title">Think</h2>
                                <img src="img/white-bg.jpg" alt="Image" class="img-fluid">
                            </li> -->
                        </ul>

                    </div>
                    
                </section>

                <!-- slider -->
                <section id="ideas">
                    <div id="tmCarousel" class="carousel slide tm-content-box" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#tmCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#tmCarousel" data-slide-to="1" class=""></li>
                            <li data-target="#tmCarousel" data-slide-to="2" class=""></li>
                        </ol>

                        <div class="carousel-inner" role="listbox">
                        
                            <div class="carousel-item active">
                                <div class="carousel-content">
                                    <div class="flex-item">
                                        <h2 class="tm-section-title">Our Ideas</h2>
                                        <p class="tm-section-description carousel-description">Suspendisse fermentum auctor turpis quis volutpat. Ut sed nibh non purus porta lacinia. Donec et euismod elit. Aenean vitae quam leo. Pellentesque interdum metus sed massa rutrum.</p>
                                    </div>
                                </div>                               
                            </div>

                            <div class="carousel-item">
                                <div class="carousel-content">
                                    <div class="flex-item">
                                        <h2 class="tm-section-title">Our Clients</h2>
                                        <p class="tm-section-description carousel-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel nisi pharetra nibh varius pharetra ac sagittis nisi. Etiam pharetra vestibulum hendrerit. Pellentesque interdum metus sed massa rutrum.</p>
                                    </div>
                                </div>                                
                            </div>

                            <div class="carousel-item">
                                <div class="carousel-content">
                                    <div class="flex-item">
                                        <h2 class="tm-section-title">Our Projects</h2>
                                        <p class="tm-section-description carousel-description">Donec ex libero, fringilla vitae purus sit amet, rhoncus pharetra lorem. Pellentesque id sem id lacus ultricies vehicula. Aliquam rutrum mi non. Pellentesque interdum metus sed massa rutrum.</p>
                                    </div>
                                </div>                                
                            </div>

                        </div>
                        
                    </div>                    
                </section>
                
                <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

                <section class="tm-content-box">
                    <img src="img/contact.jpg" alt="Contact image" class="img-fluid">

                    <div id="contact" class="pad">
                        <h2 class="tm-section-title">Contact Us</h2>
                        <form action="#contact" method="get" class="contact-form">

                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group-2-col-left">
                                <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name"  required/>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group-2-col-right">
                                <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email"  required/>
                            </div>
                            <div class="form-group">
                                <input type="text" id="contact_subject" name="contact_subject" class="form-control" placeholder="Subject"  required/>
                            </div>
                            <div class="form-group">
                                <textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Message" required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>

                        </form>      
                    </div>
                    
                </section>  

                <footer class="tm-footer">
   					
                </footer>

            </div>




</template>

<script type="text/javascript">
	$$.component.index = $$.child({
		el:"#vue_page_index",
		data:{
			// users:users,
			ls:[],
		},

		init:function(){
			var self = this
			self.ls = users
		},

	})
</script>






