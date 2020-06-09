<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Modify Voucher Booking</title>
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
			<?php foreach ($voucher_datas as $voucher_data){?>
				
				<span class="contact100-form-title">
					Modify Voucher Booking
				</span>

				<div class="wrap-input100 validate-input" data-validate="Voucher is required">
					<label class="label-input100" for="voucher">Voucher Number</label>
					<input class="input100" type="text" name="voucher" minlength="19" maxlength="19" read-only value="<?php echo $voucher_data->idvoucher; ?>">
					<input class="input100" type="hidden" name="emailvoucher" read-only value="<?php echo $voucher_data->guest_email; ?>">

					<span class="focus-input100"></span>
					<?php if($voucher_data->status_voucher === '0'){echo '<div class=""><span class="label-input100 text-danger">Voucher is Used</span></div>';} ?>

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
								<option value="<?php echo $idhotel; ?>" <?php if ($voucher_data->fk_idhotels == $idhotel) {
								echo 'selected="selected"';
								} ?>>
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
							<option <?php if ($voucher_data->fk_idtyperoom === '1') {echo 'selected="selected"';} ?> value="1">Superior Room</option>
							<option  <?php if ($voucher_data->fk_idtyperoom === '2') {echo 'selected="selected"';} ?> value="2">Deluxe Room</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<label class="label-input100" for="stayDate">Stay Date</label>
					<input id="stayDate" class="input100 stayDate" type="text" name="stayDate" value="
					<?php 
					
					$getstaydate = strtotime($voucher_data->stay_date);
					echo date("d-m-Y",$getstaydate );  ?>" />
					<span class="focus-input100"></span>
				</div>
				<?php } ?>

				<div class="wrap-input100 validate-input" data-validate="Status is required">
					<label class="label-input100" for="status">Status</label>
					<?php
					if($voucher_data->status_voucher === '1'){
						$status = 'Not Used';
					}else if($voucher_data->status_voucher === '2'){
						$status = 'Booked';
					}else if($voucher_data->status_voucher === '0'){
						$status = 'Used';
					}
					?>
					<input class="input100" type="text" name="" read-only value="<?php echo $status; ?>">
					

					<span class="focus-input100"></span>

				</div>

				<div class="container-contact100-form-btn">
					<button id="submit22" type="submit" class="contact100-form-btn" <?php if($voucher_data->status_voucher === '0'){echo 'disabled';} ?>>
						Redeem
					</button>
				</div>
				<div class="container-contact100-form-btn-success">
					<a href="<?php echo base_url();?>" style="text-decoration: none; color:white;" class="contact100-form-btn-success">Back</a>
					
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
	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/voucher/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/voucher/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/voucher/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/voucher/js/main.js"></script>
	
</body>
</html>
