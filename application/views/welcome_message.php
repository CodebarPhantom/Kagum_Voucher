<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Redemption Voucher Booking</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Voucher Hotel Hebat - KAGUM HOTELS by Eryan Fauzan">
	<meta name="robots" content="noindex"/>
	<meta name="googlebot" content="noindex"/>
	<meta name="robots" content="noindex, nofollow"/>
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/voucher/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/voucher/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/voucher/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/voucher/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/voucher/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/voucher/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/voucher/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/voucher/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/voucher/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/voucher/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/voucher/css/main.css">
<!--===============================================================================================-->

<?php
$minDate = strtotime("+7 Day"); 
$nextWeek = date("d-m-Y", $minDate);
?>



</head>
<body>
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form action="<?php echo base_url()?>voucher/bookingVoucher" method="post" accept-charset="utf-8" class="contact100-form validate-form" id="inputVoucherHotelsData">
				<span class="contact100-form-title">
					Redeem Voucher HEBAT
				</span>

				<div class="wrap-input100 validate-input" data-validate="Voucher is required">
					<label class="label-input100" for="voucher">Voucher Number</label>
					<input id="voucher" class="input100" type="text" name="voucher" minlength="19" maxlength="19" placeholder="Enter your voucher...">
					<span class="focus-input100"></span>
					<div id="msg"></div>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<label class="label-input100" for="email">Email Address</label>
					<input id="emailvoucher" class="input100" type="email" name="emailvoucher" placeholder="Enter your email...">
					<span class="focus-input100"></span>
					<div id="msg2"></div>
				</div>

				<div class="wrap-input100">
					<div class="label-input100">Hotel Name</div>
					<div>
						<select class="js-select2" name="hotelName">
						<option>Please chooses</option>
						<?php
							$hotelData = $this->Voucher_hotels_model->getDataParent('smartreport_hotels', 'idhotels','PARENT', 'ASC');
							for ($p = 0; $p < count($hotelData); ++$p) {
								$idhotel = $hotelData[$p]->idhotels;
								$hotelname = $hotelData[$p]->hotels_name;?>
								<option  value="<?php echo $idhotel; ?>">
									<?php echo $hotelname; ?>
								</option>
						<?php											
							unset($idhotel);
							unset($hotelname);
							}
						?>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100">
					<div class="label-input100">Room Type</div>
					<div>
						<select class="js-select2" name="roomType">
							<option>Please chooses</option>
							<option value="1">Superior Room</option>
							<option value="2">Deluxe Room</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<label class="label-input100" for="stayDate">Stay Date</label>
					<input id="stayDate" class="input100 stayDate" type="text" name="stayDate" value="" />
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button id="submit22" type="submit" class="contact100-form-btn">
						Redeem
					</button>
				</div>			

				<div class="container-contact100-form-btn-warning">
					<span class="contact100-form-subtitle">
						Please click here to change your reservation details
					</span>
					<button type="button" class="contact100-form-btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
						Reservation Details
					</button>
				</div>

				<div class="container-contact100-form-btn-success">
					<span class="contact100-form-subtitle">
						Need help how to book? click here for more information
					</span>
					<button type="button" class="contact100-form-btn-success" data-toggle="modal" data-target="#exampleModalCenter1">
						How to Book
					</button>
				</div>

				<div class="contact100-form-social flex-c-m">
					<a href="https://www.facebook.com/KagumHotels" class="contact100-form-social-item flex-c-m bg1 m-r-5">
						<i class="fa fa-facebook-f" aria-hidden="true"></i>
					</a>

					<a href="http://instagram.com/kagumhotels" class="contact100-form-social-item flex-c-m bg2 m-r-5">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</a>

					<a href="https://www.linkedin.com/company/kagum-hotels/" class="contact100-form-social-item flex-c-m bg3">
						<i class="fa fa-linkedin" aria-hidden="true"></i>
					</a>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m " style="background-image: url('<?php echo base_url();?>assets/voucher/images/bg-01.jpg');">
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Voucher Number</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="<?php echo base_url()?>voucher/search_voucher" method="post" accept-charset="utf-8" class="">				

		<div class="modal-body">
			<div class="container-contactlol">
				<div class="wrap-contact1000">
						<div class="wrap-input100" data-validate="Voucher is required">
							<input  class="input100" type="text" name="idvoucher" minlength="19" maxlength="19" placeholder="Enter your voucher..." required>
							<span class="focus-input100"></span>
						</div>			
				</div>
			</div>
		</div>
		<div class="modal-footer">
			
			<button type="submit" class="btn btn-primary">Search Voucher</button>
		</div>
		</form>
		</div>
	</div>
	</div>

	<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">How To Book</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="<?php echo base_url()?>voucher/search_voucher" method="post" accept-charset="utf-8" class="">				

		<div class="modal-body">
			123
		</div>
		<div class="modal-footer">			
			
		</div>
		</form>
		</div>
	</div>
	</div>

	



<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/voucher/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/voucher/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/voucher/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/voucher/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/voucher/vendor/select2/select2.min.js"></script>
	

<script type="text/javascript">
	

	  $(document).ready(function(){  	
		$('.btn-close').click(function(){
             $(".modal-backdrop").remove();
        });
        $('.stayDate').daterangepicker({ 
            singleDatePicker: true,
            locale: {
				format: 'DD-MM-YYYY'				
			},

			minDate: '<?php echo $nextWeek; ?>',
			maxDate: '31-12-2021'
			
        });

		$("#voucher").on("input", function(e) {
			$('#msg').hide();
			if($('#voucher').val().trim().length >= 19) { 
				setTimeout(function(){
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('voucher/getIdVoucher');?>",
					data: $('#inputVoucherHotelsData').serialize(),
					dataType: "html",
					cache: false,
					
					success: function(msg) {
						$('#msg').show();
						$("#msg").html(msg);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#msg').show();
						$("#msg").html(textStatus + " " + errorThrown);
					}
				});
				}, 1500); 
			}	
			
		});
		$( "#submit22" ).prop( "disabled", true );
		$("#emailvoucher").on("input", function(e) {
			$('#msg2').hide();
			if($('#emailvoucher').val().trim().length >= 12) { 
				setTimeout(function(){
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('voucher/getIdVoucherEmail');?>",
					data: $('#inputVoucherHotelsData').serialize(),
					dataType: "html",
					cache: false,
					
					success: function(msg) {
						$('#msg2').show();
						$("#msg2").html(msg);
						//console.log(msg);
						if(msg === '<span class="label-input100 text-success">Email is valid</span>'){
							$( "#submit22" ).prop( "disabled", false );
						}
						
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#msg2').show();
						$("#msg2").html(textStatus + " " + errorThrown);
					}
				});
				}, 1500); 
			}	
			
		});

		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
		$(".js-select2").each(function(){
			$(this).on('select2:open', function (e){
				$(this).parent().next().addClass('eff-focus-selection');
			});
		});
		$(".js-select2").each(function(){
			$(this).on('select2:close', function (e){
				$(this).parent().next().removeClass('eff-focus-selection');
			});
		});
	});
</script> 

<?php if ($this->session->flashdata('input_success')) {?>   
			<script type="text/javascript">
			$(function(){
				swal({
                title: 'Thank you for choosing to stay with KAGUM Hotels.',
                text: 'We are looking forward to welcoming you!',
            	icon: 'success',
                confirmButtonClass: 'btn btn-primary'
                });
			});
			</script>
<?php }?>

<?php if ($this->session->flashdata('search_notfound')) {?>   
			<script type="text/javascript">
			$(function(){
				swal({
                title: 'Voucher ID Not Found',
                text: 'There is no matching Voucher ID!',
            	icon: 'error',
                confirmButtonClass: 'btn btn-primary'
                });
			});
			</script>
<?php }?>

<?php if ($this->session->flashdata('search_used')) {?>   
			<script type="text/javascript">
			$(function(){
				swal({
                title: 'Voucher ID Used',
                text: 'Voucher ID already used!',
            	icon: 'error',
                confirmButtonClass: 'btn btn-primary'
                });
			});
			</script>
<?php }?>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/voucher/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/voucher/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/voucher/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/voucher/js/main.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
</body>
</html>
