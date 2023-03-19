<?php  include("partials/menu.php"); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br>
        <?php

        //Check update button is clicked or not

        if (isset($_POST['submit'])) {
            $id = $_POST['order_id'];
           
           
            $status = $_POST['status'];
            
            $customer_name = $_POST['customer_name'];
            $customer_mobile= $_POST['customer_mobile'];
            $customer_email= $_POST['customer_email'];
            $customer_address= $_POST['customer_address'];

            $sql2 = "UPDATE tbl_order SET

                
                status ='$status',

                customer_name= '$customer_name',
                customer_mobile= '$customer_mobile',
                customer_email= '$customer_email',
                customer_address= '$customer_address'
                WHERE order_id=$id

            ";
            $res2 = mysqli_query($conn, $sql2);
            
            if ($res2==true) {

                //Query executed and order updated
                $_SESSION['update'] = "<div class= 'success'>Order updated Successfully</div>";

                //Redirect Page to Manage order
                header("location:".SITE.'admin/manage-order.php');
            } else {
                $_SESSION['update'] = "<div class= 'error'>Failed to update order</div>";

                //Redirect Page to Manage order
                header("location:".SITE.'admin/manage-order.php');
            }
        }
        
        
        ?>
        <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        //Get all the details based on id

        $sql = "SELECT * FROM tbl_order WHERE order_id = $id";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count==1) {
            $row = mysqli_fetch_assoc($res);
            $status = $row['status'];
            $customer_name= $row['customer_name'];
            $customer_mobile = $row['customer_mobile'];
            $customer_email= $row['customer_email'];
            $customer_address= $row['customer_address'];
            
        } else {
            header('Location:'.SITE.'admin/manage-order.php');
        }
    } else {
        header('Location:'.SITE.'admin/manage-order.php');
    }


?>
        <!--update order from start-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="add-table" align="center" width="30%">




                <tr>
                    <td>Status: </td>
                    <td>
                        <select name="status">
                            <option <?php if ($status =="Ordered") {
    echo "selected";
} ?> value="Ordered">Ordered</option>

                            <option <?php if ($status =="On Delivery") {
    echo "selected";
} ?> value="On Delivery">On Delivery</option>

                            <option <?php if ($status =="Delivered") {
    echo "selected";
} ?> value="Delivered">Delivered</option>

                            <option <?php if ($status=="Cancelled") {
    echo "selected";
} ?> value="Cancelled">Cancelled</option>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td><input type="text" name="customer_name" value="<?php echo $customer_name;?>"></td>
                </tr>

                <tr>
                    <td>Customer Email: </td>
                    <td><input type="text" name="customer_mobile" value="<?php echo $customer_mobile; ?>"></td>
                </tr>

                <tr>
                    <td>Customer Mobile: </td>
                    <td><input type="text" name="customer_email" value="<?php echo $customer_email; ?>"></td>
                </tr>

                <tr>
                    <td>Customer Address: </td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>




                <tr>
                    <td colspan="2" align="center">
                        <input type="hidden" name="order_id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Order" class="btn2">

                    </td>
                </tr>



            </table>
        </form>





        <!--from ends-->
    </div>
</div>

<?php include("partials/footer.php"); ?>
