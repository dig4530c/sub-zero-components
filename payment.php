<?php 
$page_title = "Sub Zero Components - Payment";
include ('is/header.php'); 

?>

    <!-- stuff -->
    <div class="container  "><!--  container-->
      <div class="row space">
        <div class="row">
      
          <div class="ninecol "> <!--cart col-->
            <div>
              <div id="paypal">
                <span id="paypal_login"></span>
                <script src="https://www.paypalobjects.com/js/external/api.js"></script>
                <script>
                  paypal.use( ["login"], function(login) {
                      login.render ({
                      "appid": "SubzeroComponents",
                      "authend": "sandbox",
                      "scopes": "profile email address phone https://uri.paypal.com/services/paypalattributes",
                      "containerid": "paypal_login",
                      "locale": "en-us",
                      "returnurl": "http://sulley.cah.ucf.edu/~ja762331/dig4530c/test/sub-zero-components-master/confirm.php"
                      });
                  });
                </script>
              </div><!--paypal close-->  
            </div>
          </div>
          <div class="threecol last">
           
          </div>
        </div><!--end row-->
        
        </div>
    </div>
<?php include ('is/footer.php'); ?>