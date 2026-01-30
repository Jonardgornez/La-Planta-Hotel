 <!-- Back to Top -->
     <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
  <!-- JavaScript Libraries -->
    <script src="template/js/jquery.min.js"></script>
    <script src="template/js/bootstrap.bundle.min.js"></script>
    <script src="template/lib/wow/wow.min.js"></script>
    <script src="template/lib/easing/easing.min.js"></script>
    <script src="template/lib/waypoints/waypoints.min.js"></script>
    <script src="template/lib/counterup/counterup.min.js"></script>
    <script src="template/lib/lightbox/js/lightbox.min.js"></script>
    <script src="template/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Template Javascript -->
    <script src="template/js/main.js"></script>
    
<script>
$(document).ready(function(){
   
	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_ratings.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"submit_ratings.php",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data) {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row">';

                        html += '<div class="col-sm-1 hidden-xs d-none d-sm-block"><div class="img-thumbnail bg-light text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+''+data.review_data[count].user_name.charAt(1)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="cards">';

                        html += '<div class="card-headers"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-bodys">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>
<script type="text/javascript">   
    $("#link2").click(function(){
    if( $("#termsCheckbox").is(':checked') ){
      
    }else {
      event.preventDefault();
    }
    console.log("link2");

  });
</script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
 <script>
        $.ajax({
            url:"book_calendar.php",
            type:"POST",
            data: { 'month':'<?=date('m');?>','year':'<?=date('Y');?>'},
            success:function(data){
                $("#calendar").html(data);
            }
        });
      

        $(document).on('click','.changemonth',function(){
            var offid =$("#office_select").val();
            $.ajax({
                url:"book_calendar.php",
                type:"POST",
                data: {'month':$(this).data('month'),'year':$(this).data('year'),'offid':offid},
                success:function(data){
                    $("#calendar").html(data);
                }
            });
        });

        $(document).on('change','#office_select',function(){
            var offid =$(this).val();
            var price =$(this).find(':selected').data("price")
            $.ajax({
                url:"book_calendar.php",
                type:"POST",
                //data: { 'month':$(this).data('month'),'year':$(this).data('year'),'resource_id':resource_id },
                data: { 'month':$('#current_month').data('month'),'year':$('#current_month').data('year'), 'offid':offid},
                success:function(data){
                    $("#calendar").html(data);
					 document.getElementsByClassName("cotidss")[0].value = offid;
					 document.getElementsByClassName("cot_price")[0].value = price;
                }
            });
        });
    </script>
  <script type="text/javascript">  
   function bookDate(self) {
      var sdate = self.getAttribute("data-sdate");
      document.getElementsByClassName("sdate")[0].value = sdate;
    //$("#book_form").modal("show");
    
  }
   $(document).on('keyup','#payment',function(){
		var price =Number.parseFloat($("#cotprice").val());
		var payment =Number.parseFloat($("#payment").val());
		var TotalBalance=0;
		var PartialPayment='Partial Payment';
		var FullPayment='Full Payment';
		$('#disabled').prop('disabled', true);
		if(payment>price){
			alert("Payment not greater than cottage price");
			$('#disabled').prop('disabled', true);
		}else if(payment>=price){
			TotalBalance =price - payment;
			document.getElementById("balance").value = TotalBalance;
			$('#disabled').prop('disabled', false);
			document.getElementById("PAYMENT_STATUS").value = FullPayment;
		}else if(payment<price){
			TotalBalance =price - payment;
			document.getElementById("balance").value = TotalBalance;
			$('#disabled').prop('disabled', false);
			document.getElementById("PAYMENT_STATUS").value = PartialPayment;
		}
	});
</script>

<script type="text/javascript">
 // Bootstrap 4 Validation
 $(".book_submit").submit(function () {
    var form = $(this);
    if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }else{
      //$("#LoadingImage").show();
            $.ajax({
                url:"book_process.php",
                type:"POST",
                data:  new FormData(this),
        contentType: false,
        	    cache: false,
    			processData: false,
          beforeSend : function(){
            //$('#LoadingImage').show();
          },
                success:function(data){
                    $("#success_message").html(data);
                    $('input[type="text"], input[type="file"], input[type="date"], input[type="email"], input[type="radio"], select').val('');
                  },
                error: function(data){
                    console.log("error");
                    console.log(data);
                  }
            });
			// to prevent refreshing the whole page page
			return false;
        
    }
    form.addClass("was-validated");
  });
</script>
<script>
     $('select').select2({
        theme: 'bootstrap4',
    });
</script>

    </body>
</html>