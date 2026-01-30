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
    <!-- Template Javascript -->
    <script src="template/js/main.js"></script>

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

     
        $(document).ready(function(){
            $("#office_select").blur(function myFunction(){
                var offid = $(this).val(); // this.value
                $.ajax({
                url:"book_calendar.php",
                type:"POST",
                //data: { 'month':$(this).data('month'),'year':$(this).data('year'),'resource_id':resource_id },
                data: { 'month':$('#current_month').data('month'),'year':$('#current_month').data('year'), 'offid':offid},
                success:function(data){
                    $("#calendar").html(data);
					 //document.getElementsByClassName("cotidss")[0].value = offid;
                }
                });
            });
        }); 
    </script>
  <script type="text/javascript">  
   function bookDate(self) {
      var sdate = self.getAttribute("data-sdate");
      document.getElementsByClassName("sdate")[0].value = sdate;
    //$("#book_form").modal("show");
    
  }
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


    </body>
</html>