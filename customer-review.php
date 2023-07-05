<?php include "header1.php";
 ?>

  <!-- review section -->
  <section class="cart_section layout_padding">
            <!--start container-->
		<div class="container" id="main">
            <h2 class="header">Customers review</h2>
            <hr class="divider">
            <section class="panel">
                <div class="review-container">
                    
                <div id="review-area"></div>

                <!-- textarea -->
                <div class="comment-area mt-2">
                    <a href="javascript:;" class="" id="comment-icon" title="comment"><i class="fa-pull-right fa-4x  fa fa-paper-plane-o" style="color: #0171a5;"></i><span class="pull-right mt-4">click here to review...</span></a>
                    <form action="" method="POST" id="comment-form" style="display:none;">
                        
                        <div class="form-group">
                                <textarea  name="comment" id="comment" class="input form-control input-group" placeholder="write your review here..."></textarea>                                           
                                <label for="message" id="comment_info" class="text-danger" style="display: none;"></label>
                        </div>
                        
                        <div class="form-group pull-right">
                                <button class="btn btn-default" type="button" name="send-comment" id="send-comment"><i class="fa fa-paper-plane-o"></i> Send</button>
                        </div>
                        
                    </form>
                </div>
                </div>
            </section>
          
        <!--end container-->
    </div>
  </section>
  <!-- end review section -->
  	
		

  <?php include("footer.php"); ?>

  <script>
  let cartcount =  (()=>{
	$.ajax({	
		url: 'process.php',
		type: 'POST',
		data: 'page=get_cartcount',
		success: function(result){
			$('#cartcount').html(result);
		}
	});
});cartcount();
 // display review
  function fetchReview(){
    $.ajax({	
      url: 'process.php',
      type: 'POST',
      data: 'page=fetch_customer_review',
      success: function(result){
        $('#review-area').html(result);
      }
    });

  }fetchReview();



$('#comment-icon').click(()=>{
    fetchReview();
    $('#comment-form').show(3000);
    $('#comment-icon').hide(3000);
});


//edit question

	$("#send-comment").click(()=>{
		var valid = true;

		const comment = $("#comment").val();
		
        const regAlphabet = /^[A-Za-z0-z ?', ]+$/;
        

        if (comment.trim() == "") {
            $("#comment_info").html('comment is required!').show().fadeIn().fadeOut(5000);
            $("#comment").addClass("error-field");
            valid = false;

        }
        else if (!regAlphabet.test(comment)) {
            $("#comment_info").html('use symbol not alloed!').show().fadeIn().fadeOut(5000);
            $("#comment").addClass("error-field");
            valid = false;

        }
       
        if (valid == false) {
            $(".error-field").css({
                'border-width': '1px',
                'border-style': 'solid',
                'border-color': 'red'
            }).first().focus();
            valid = false;
        
        } else {
                  
            $.ajax({
                url: "process.php",
                type: "POST",
                data: 'page=customer_review' + '&comment=' + comment,
                success: function(result) {
                    $('#comment-form').hide(3000);
                     $('#comment-icon').show(3000);
                    if (result == 'failed') {
                        swal({
                            title: 'failed',
                            text: 'failed to submit review, please try again!',
                            icon: 'error'

                        });

                        } else if (result == 'success') {
                        swal({
                            title: 'success',
                            text: 'review successfully sent!',
                            icon: 'success'

                        });


                        }
                        fetchReview();
                }
            });
        }
     
    });	

    
  </script>