<div class="customer-email">
    <table class="table table-bordered" id="myTable">
        <tr class="active">
            <th>No.</th>
            <th>Art No</th>
            <th>Composition</th>
            <th>Quantity</th>
            <th>Picture</th>
            <th>Create by</th>
             <th>Activity</th>
        </tr>
        
        <?php
            $no = 1;
        foreach ($products as $vc):
            
            ?>
        <tr>
            <td><?php echo $no++ . "."; ?></td>
            <td><?php echo $vc->art_no; ?></td>
            <td><?php echo $vc->composition; ?></td>
            <td><?php echo $vc->quantity; ?></td>
            <td><?php echo "<img src='" . base_url() . "assets/images/product/p_{$vc->product_id}.{$vc->picture}' width='150' height='100' />"; ?></td>
            <td><?php 
                $admin = $this->db->get_where("admin", array($vc->category_id="admin_id"))->row_array();
                echo $admin['name'];
            ?></td>
            <td>
                <a class="btn btn-success" href="<?php echo base_url()."product/edit_product/$vc->product_id"; ?>">Edit</a>
                <a class="btn btn-danger" href="<?php echo base_url()."product/delete_product/$vc->product_id"; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>