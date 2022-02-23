<?= $this->extend($layout) ?>
<?= $this->section('pageStyles') ?>
<link href="/vendors/css-tricks/responsive-table-demo/dist/style.css" rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('pageScripts') ?>

<script type="text/javascript">
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>

<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div class="container-fluid px-4">
<?php
$message = session()->get('message') ?? NULL;
$error = session()->get('error') ?? NULL;


?>

         <?php if ($message) { ?>
           
            <div class="alert alert-success alert-dismissible fade show  mt-3  position-fixed d-flex" style="z-index:2000; width:96%; left: 2%;" role="alert">
              <p><?= $message ?></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              </button>
            </div>
        <?php } ?>
           <?php if ($error) { ?>
           
            <div class="alert alert-danger alert-dismissible fade show  mt-3  position-fixed d-flex" style="z-index:2000; width:96%; left: 2%;" role="alert">
              <p><?= $error ?></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              </button>
            </div>
        <?php } ?>
         
	<h1 class="mt-4">Rates</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item">Admin</li>
		<li class="breadcrumb-item active">Rates</li>
	</ol>

	<div class="row mb-3">
		<div class="col-md-8 themed-grid-col">
			<div class="pb-3">
				<form action="/admin/pages/rates" method="post">
        			<?php foreach ($rates->seasons as $season) { ?>
        			<h3><?= $season->name ?> Rates</h3>
					<table class="table mb-4">
		  				<thead>
		    					<tr>
		      						<th scope="col text-muted"></th>
		      						<?php foreach ($rates->types as $type) { ?>
		      							<th scope="col"><?= $type->name ?></th>
		      						<?php } ?>
		    					</tr>
		  				</thead>
  						<tbody>
						 	<?php foreach ($rates->length as $_length) { ?>
							    	<tr>
							      		<th scope="row"><?= $_length->name ?></th>
							      		<?php foreach ($rates->types as $type) { ?>
							      		<?php $rate = $rates->rates[$season->id][$_length->id][$type->id] ?>
							      			<td data-label="<?= $type->name ?>">
							      				<div class="input-group mb-3">
											  	<span class="input-group-text">$</span>
											  	<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="rates[<?= $rate->id ?>]" value="<?= $rate->price ?? NULL ?>" placeholder="N/A">
											  	<span class="input-group-text">.00</span>
											</div>
										</td>
							      		<?php } ?>
							    	</tr>
						    	<?php } ?>
						</tbody>
					</table>
				<?php } ?>
				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				  <button type="reset" class="btn btn-outline-primary me-md-2">Reset</button>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</div>
				</form>
		        </div>
		        
		        <div class="row">
		          <div class="col-md-6 themed-grid-col"><!-- Available Space --></div>
		          <div class="col-md-6 themed-grid-col"><!-- Available Space --></div>
		        </div>
		        
		</div>
		<div class="col-md-4 themed-grid-col">
		
		<div class="card">
  <h5 class="card-header">Info</h5>
  <div class="card-body">
    <h5 class="card-title">Tips for updating rates.</h5>
    <p class="card-text">
    	<ul>
    		<li>Rates must be entered as whole numbers.
    		<li>Entering a rate of 0 will cause "N/A" to be displayed.
    </p>

  </div>
</div>
		</div>
	</div>
    
    
</div>
<?= $this->endSection() ?>