<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pikaday.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<div class="customer-email">
    <table class="table table-hover" id="myTable">
        <tr class="active">
            <th>No.</th>
            <th>Category</th>
            <th>Activity</th>
        </tr>

        <?php
        $no = 1;
        foreach ($category as $vc):
            ?>
            <tr>
                <td><?php echo $no++ . "."; ?></td>
                <td><?php echo $vc->category_name; ?></td>
                <td><a class="btn btn-success" href="<?php echo base_url()."product/edit_category/{$vc->category_id}"; ?>">Edit</a>
                <a class="btn btn-danger" href="<?php echo base_url()."product/delete_category/{$vc->category_id}"; ?>">Delete</a></td>
            </tr>
<?php endforeach; ?>
    </table>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</div>