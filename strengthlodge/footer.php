<!DOCTYPE html>
<html>
<body>
<!-- FOOTER -->
<br><br>
	<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Strength Lodge</h3>
            <p>We're a young start-up that work for your needs in fitness and well-being. We deliver at honest prices.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul class="footer-links">
              <li><i class="fas fa-angle-double-right"></i><a href="about.php">About Us</a></li>
              <li><i class="fas fa-angle-double-right"></i><a href="contact.php">Contact us</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Strength Lodge  <br>
              Montreal, Quebec, Canada<br>
              <strong style="color: white">Phone:</strong> +1 514-663-2222<br>
              <strong style="color: white">Email:</strong> info@strengthlodge.com<br>
            </p>


          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Subscribe now to our weekly Newsletter and stay tuned.</p>
            <form action="" method="post" >
              <input type="email" name="email"><input type="submit" name="subscribe" value="Subscribe">
              <?php
              include_once 'Newsletter.Class.php';
              include_once 'dbconnection.php';
                // To Handle Subscription

                      
                    if(isset($_REQUEST['subscribe'])){
                        try{
                            
      
                                $Newsletter = new Newsletter();
                                
                                $email=$_POST['email'];
                                
                                $Newsletter->setEmail($email);
                                
                                $result = $Newsletter->create($connection);
                                
                                if($result == true)
                                {
                                    
                                    echo "Subscribed to newsletter";
                                }
                            
                            
                        }
                        catch (PDOException $e)
                        {
                            echo "Error : ".$e->getMessage();
                        }
                       
                    }
              ?>
            </form>
          </div>

        </div>
      </div>
    </div>

  <div class="container">
  	<div class="row">
  			  <div class="col-md-8 col-md-offset-2 text-center">
  					<!-- footer copyright -->
  					<div class="footer-copyright">
      						<p style="line-height: 0px;color: white;font-family: helvetica "><i class="far fa-copyright"></i>&nbspCopyright 2021 </p>
      			</div>
  					<!-- /footer copyright -->
  				</div>
  		</div>
    </div>
  </footer>
  <!-- #footer -->

	<a id="return-to-top" title="Go to top"><i class="fas fa-angle-up"></i></a>
  
  <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  <script src="js/jquery-ui.min.js"></script> 
  <script src="js/fotorama.js"></script>
  <script src="js/jquery.magnific-popup.js"></script>  
  <script src="js/custom.js"></script>
</body>
</html>