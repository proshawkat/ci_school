<div class="customer-email">
    <div class="cutomer-product">
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-7">
            <?php foreach ($singleData as $vp): ?>
                <table class="table table-condensed">
                    <?php echo "<img src='" . base_url() . "assets/customer_upload/c_{$vp->customer_id}.{$vp->picture}' width='150' height='100' />"; ?>
                    <tr><td class="danger">Price</td><td class="success"><?php echo $vp->price; ?></td></tr>
                    <tr><td class="success">Weight</td><td class="info"><?php echo $vp->weight; ?></td></tr>
                    <tr><td>Art NO</td><td><?php echo $vp->art_no; ?></td></tr>
                    <tr><td>Price</td><td><?php echo $vp->company_name; ?></td></tr>
                    <tr><td>Contact Name</td><td><?php echo $vp->contact_name; ?></td></tr>
                    <tr><td>Email</td><td><?php echo $vp->email; ?></td></tr>
                    <tr><td>Phone</td><td><?php echo $vp->phone; ?></td></tr>
                    <tr><td>Company Website</td><td><?php echo $vp->company_website; ?></td></tr>
                    <tr><td>Post Date</td><td><?php echo $vp->date; ?></td></tr>
                </table>
            <?php endforeach; ?>
			<a  class="btn btn-danger go_back" href="<?php echo base_url()."Customer/index"; ?>">Go Back</a>
        </div>
        <div class="col-md-3">&nbsp;</div>
    </div>
</div>