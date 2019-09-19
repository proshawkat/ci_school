<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pikaday.css" />
<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<div class="customer-email">
    <table class="table table-hover">
		<thead>
			<tr class="active">
				<th>No.</th>
				<th>Price</th>
				<th>Weight</th>
				<th>Contact Name</th>
				<th>Send Date</th>
				 <th>Activity</th>
			</tr>
        </thead>
		 <tbody>
        <?php
            $no = 1;
        foreach ($customer_data as $vc):?>
        <tr>
            <td><?php echo $no++ . "."; ?></td>
            <td><?php echo $vc->price; ?></td>
            <td><?php echo $vc->weight; ?></td>
            <td><?php echo $vc->contact_name; ?></td>
            <td><?php echo $vc->date; ?></td>
            <td><a class="btn btn-success" href="<?php echo base_url()."customer/view_details/$vc->customer_id"; ?>">View Details</a>
			<a class="btn btn-danger" href="<?php echo base_url()."customer/delete_message/$vc->customer_id"; ?>">Delete</a>
			</td>
        </tr>
        <?php endforeach; ?>
		</tbody>
    </table>
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
</div>