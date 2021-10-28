<!--==========================
  footer
  ============================-->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <h3>Have a Question?</h3>
        <p>Talk to us now on Skype <span>1FX.us</span> </p>
        <p>Or drop us a line at</p>
        <a href="#">info@1FX.us</a> </div>
      <div class="col-sm-4">
        <h3>Useful Links</h3>
        <ul>
          <li><a href="<?php echo base_url('SiteAssets/'); ?>assets/site/images/1fx-whitepaper.pdf" target="_blank">WHITEPAPER</a></li>
          <li><a href="#faq">FAQ</a></li>
          <li><a href="#team">TEAM</a></li>
        </ul>
        <ul>
          <li><a href="#contactus">CONTACT US</a></li>
          <li><a href="termsandcondition.html" target="_blank">TERMS OF USE</a></li>
          <li><a href="privacypolicy.html" target="_blank">PRIVACY POLICY</a></li>
        </ul>
      </div>
      <div class="col-sm-4">
        <h3>Connect With Us</h3>
        <div class="socail-account">
          <ul>
            <li><a href="https://www.facebook.com/1fxcoin/" target="_blank"><i class="fb-icon"></i></a></li>
            <li><a href="https://www.instagram.com/1fxcoin/" target="_blank"><i class="insta-icon"></i></a></li>
            <li><a href="https://in.pinterest.com/1fxcoin/" target="_blank"><i class="p-icon"></i></a></li>
            <li><a href="https://twitter.com/1fxCoin" target="_blank"><i class="tw-icon"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCOFBv1JPJD_g6O1_2T7yWnQ" target="_blank"><i class="yt-icon"></i></a></li>
            <li><a href="https://www.linkedin.com/company/1fx-coin/" target="_blank"><i class="in-icon"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="copy-right">
          <p>2021 © 1FX.us. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<script>
$(function(){
    $('.selectpicker').selectpicker();
});</script>
<script src="<?php echo base_url('SiteAssets/'); ?>assets/site/js/jquery.min.js"></script>
<script src="<?php echo base_url('SiteAssets/'); ?>assets/site/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('SiteAssets/'); ?>assets/site/js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url('SiteAssets/'); ?>assets/site/js/owlcarousel/owl.carousel.js"></script>
<script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                items: 3,
                margin: 30,
                autoHeight: true
              });

				$('.owl-carousel2').owlCarousel({
                items: 3,
                margin: 30,
                autoHeight: true
              });
            })
</script>
<script type="text/javascript">
    marqueeInit({
        uniqueid: 'mycrawler23',
        style: {
            'padding': '0px',
            'width': '100%',
            'height': '105px'
        },
        inc: 5, //speed - pixel increment for each iteration of this marquee's movement
        mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
        moveatleast: 2,
        neutral: 150,
        savedirection: true
    });  </script>
<script>
$(document).ready(function(){
	//
  (function(e){
		e.fn.countdown = function (t, n){
			function i(){
				eventDate = Date.parse(r.date) / 1e3;
				currentDate = Math.floor(e.now() / 1e3);
				//
				if(eventDate <= currentDate){
					n.call(this);
					clearInterval(interval)
				}
				//
				seconds = eventDate - currentDate;
				days = Math.floor(seconds / 86400);
				seconds -= days * 60 * 60 * 24;
				hours = Math.floor(seconds / 3600);
				seconds -= hours * 60 * 60;
				minutes = Math.floor(seconds / 60);
				seconds -= minutes * 60;
				//
				days == 1 ? thisEl.find(".timeRefDays").text("Days") : thisEl.find(".timeRefDays").text("Days");
				hours == 1 ? thisEl.find(".timeRefHours").text("Hours") : thisEl.find(".timeRefHours").text("Hours");
				minutes == 1 ? thisEl.find(".timeRefMinutes").text("Minutes") : thisEl.find(".timeRefMinutes").text("Minutes");
				seconds == 1 ? thisEl.find(".timeRefSeconds").text("Seconds") : thisEl.find(".timeRefSeconds").text("Seconds");
				//
				if(r["format"] == "on"){
					days = String(days).length >= 2 ? days : "0" + days;
					hours = String(hours).length >= 2 ? hours : "0" + hours;
					minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
					seconds = String(seconds).length >= 2 ? seconds : "0" + seconds
				}
				//
				if(!isNaN(eventDate)){
					thisEl.find(".days").text(days);
					thisEl.find(".hours").text(hours);
					thisEl.find(".minutes").text(minutes);
					thisEl.find(".seconds").text(seconds)
				}
        else{
          errorMessage = "Invalid date. Example: 27 March 2021 17:00:00";
					alert(errorMessage);
					console.log(errorMessage);
					clearInterval(interval)
				}
			}
			//
			var thisEl = e(this);
			var r = {
				date: null,
				format: null
			};
			//
			t && e.extend(r, t);
			i();
			interval = setInterval(i, 1e3)
		}
	})(jQuery);
	//
	$(document).ready(function(){
		function e(){
			var e = new Date;
			e.setDate(e.getDate() + 60);
			dd = e.getDate();
			mm = e.getMonth() + 1;
			y = e.getFullYear();
			futureFormattedDate = mm + "/" + dd + "/" + y;
			return futureFormattedDate
		}
		//
		$("#countdown").countdown({
			date: "1 February 2021 11:05:00", // change date/time here - do not change the format!
			format: "on"
		});
	});
});
</script>
<script>
$("#nav ul li a[href^='#']").on('click', function(e) {
   e.preventDefault();

   // store hash
   var hash = this.hash;

   // animate
   $('html, body').animate({
       scrollTop: $(hash).offset().top
     }, 1000, function(){

       window.location.hash = hash;
     });

});
</script>
<script type="text/javascript">
   $(".jumper").on("click", function( e ) {

    e.preventDefault();
    $('li').removeClass('active');
    $(this).closest('li').addClass('active');

    $("body, html").animate({
        scrollTop: eval($( $(this).attr('href') ).offset().top - 100)
    }, 1000);

});

 </script>
  <script>
	  // var gst = jQuery.noConflict();
jQuery(document).scroll(function() {
    var y = jQuery(document).scrollTop(), //get page y value
        header = jQuery(".fixed-tab"); // your div id
    if(y >= 400)  {
        header.css({position: "fixed", "top" : "0px", "left" : "0", "width" : "100%", "z-index" : "888"});
    } else {
        header.css("position", "static");
    }
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('#subscribe_msz').hide();
  $('#subscribe_msz_err_fname').hide();
  $('#subscribe_msz_err_lname').hide();
  $('#subscribe_msz_err_phone').hide();
  $('#subscribe_msz_err_email').hide();
  $('#subscribe_msz_err_address').hide();
  $('#subscribe_msz_err_city').hide();
  $('#subscribe_msz_err_state').hide();
  $('#subscribe_msz_err_zip').hide();
});
function ValidatePhone(phone) {
  var expr = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
  return expr.test(phone);
};
function ValidateEmail(email) {
  var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  return expr.test(email);
};

function subscribe() {
  var fname = $("#inputName").val();
  var lname = $("#inputLastname").val();
  var phone = $("#inputTel").val();
  var email = $("#inputEmail4").val();
  var address = $("#inputAddress").val();
  var city = $("#inputCity").val();
  var state = $("#inputState").val();
  var zip = $("#inputZip").val();

  if(fname=='')
  {
    $('#subscribe_msz_err_fname').show();
    $('#subscribe_msz_err_fname').delay(5000).fadeOut('slow');
  }
  else if(lname=='')
  {
    $('#subscribe_msz_err_lname').show();
    $('#subscribe_msz_err_lname').delay(5000).fadeOut('slow');
  }
  else if(phone=='')
  {
    $('#subscribe_msz_err_phone').show();
    $('#subscribe_msz_err_phone').delay(5000).fadeOut('slow');
  }
  else if (!ValidatePhone($("#inputTel").val())) {
    $('#subscribe_msz_err_phone').show();
    $('#subscribe_msz_err_phone').delay(5000).fadeOut('slow');
  }
  else if(email=='')
  {
    $('#subscribe_msz_err_email').show();
    $('#subscribe_msz_err_email').delay(5000).fadeOut('slow');
  }
  else if (!ValidateEmail($("#inputEmail4").val())) {
    $('#subscribe_msz_err_email').show();
    $('#subscribe_msz_err_email').delay(5000).fadeOut('slow');
  }
  else if(address=='')
  {
    $('#subscribe_msz_err_address').show();
    $('#subscribe_msz_err_address').delay(5000).fadeOut('slow');
  }
  else if(city=='')
  {
    $('#subscribe_msz_err_city').show();
    $('#subscribe_msz_err_city').delay(5000).fadeOut('slow');
  }
  else if(state=='')
  {
    $('#subscribe_msz_err_state').show();
    $('#subscribe_msz_err_state').delay(5000).fadeOut('slow');
  }
  else if(zip=='')
  {
    $('#subscribe_msz_err_zip').show();
    $('#subscribe_msz_err_zip').delay(5000).fadeOut('slow');
  }
  else{
    jQuery.ajax({
      url: '/pages/subscription',
      data: {fname:fname,lname:lname,phone:phone,email:email,address:address,city:city,state:state,zip:zip},
      type: 'POST',
      success: function(data) {

        $('#subscribe_msz').show();
        $('#subscribe_msz').delay(5000).fadeOut('slow');
        $('#inputName').val('');
        $('#inputLastname').val('');
        $('#inputTel').val('');
        $('#inputEmail4').val('');
        $('#inputAddress').val('');
        $('#inputCity').val('');
        $('#inputState').val('');
        $('#inputZip').val('');

      }
    });
  }

}
</script>
</body>
</html>
