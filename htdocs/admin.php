<?php
session_start();
if (!isset($_SESSION['admin'])){
    header('Location:/login.php');
    exit();
}
else{
  if ($_SESSION['admin'] == 1){}
  else{
    header('Location:/login.php');
    exit();
  }
}

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">
  <title>Admin-panel</title>

    <?php
      include('header.php');
    ?>
    <link rel="stylesheet" href="static/CSS/catalog.css">

        <div style="min-height:100vh">

          <div style="height: 100px"></div>
          <div style="display:flex; justify-content: center;margin-bottom: 30px;">
            <button onclick="showProducts()">Products</button>
            <button onclick="showOrders()" style="color:black;background-color:white">Orders</button>
            <button onclick="showReservedBoards()">Reserved</button>
          </div>
          <section class="products" style="display:none">
            <div class="add_item">
              <form action="" enctype="multipart/form-data" method="post" id="form">
                <h1>Add new board</h1>
                <div class="input"> Picture: <input type="file" name="img" style="padding-left: 150px" accept="image/jpg" required></div>
                <div class="input"> Processor: <input type="text" name="processor" required></div>
                <div class="input"> Frequency: <input type="text" name="frequency" pattern="^[0-9]*\.[0-9]+$" required></div>
                <div class="input"> Socket: <input type="text" name="socket" required></div>
                <div class="input"> Cores quantity: <input type="text" name="cores" pattern="^\d+$" required></div>
                <div class="input"> Threads quantity: <input type="text" name="threads" pattern="^\d+$" required></div>
                <div class="input"> RAM size: <input type="text" name="ram_size" pattern="^\d+$" required></div>
                <div class="input"> RAM type: <input type="text" name="ram_type"></div>
                <div class="input"> Price: <input type="text" name="price" pattern="^\d+$" required></div>
                <div class="input"> Quantity: <input type="text" name="quantity" pattern="^\d+$" required></div>
                <button type="submit">Add</button>
            </form>
            <button class="clear" onclick="clear_form()">Clear</button>
            </div>

            <?php
              include('../settings.php');

              $connection = mysqli_connect($HOST, $USER, $PASSWORD, $DB_NAME);
              $query = ("SELECT product_id, 
                  img_src, 
                  processor, 
                  frequency, 
                  socket, 
                  cores, 
                  threads, 
                  ram_size, 
                  ram_type, 
                  price, 
                  quantity,
                  on_sale 
                  FROM products 
                  ORDER BY on_sale DESC, product_id");
              $result = mysqli_query($connection, $query);

              foreach ($result as $row) {

                $product_id = $row['product_id'];
                $img_src = $row['img_src'];
                $processor = $row['processor'];
                $frequency = $row['frequency'];
                $cores = $row['cores'];
                $threads = $row['threads'];
                $ram_type = $row['ram_type'];
                $ram_size = $row['ram_size'];
                $socket = $row['socket'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $on_sale = $row['on_sale'];
                
              
                $style = '';
                $checked = '';
                if ($on_sale == 0){
                  $style = 'opacity:0.4';
                  $checked = 'checked="true"';
                };

                echo 
                "<div class='product $product_id' style='$style'>
                    <img src='static/IMG/products/$img_src'>
                    <div class='right_side'>
                        <p>Processor $processor $frequency" . "GHz $cores cores $threads threads, RAM $ram_type $ram_size GB, socket: $socket</p>
                        <div class='footer'>
                            <div class='price'>Price: <input type='text' name='price' value='$price'><span>$</span></div>
                            <div class='quantity'><input type='text' name='quantity' value='$quantity'> psc.</div>
                            <button class='accept' onclick='changeBoard($product_id)'>
                              <div></div>
                              <div></div>
                            </button>
                            <div>
                              <label for='checkbox' style='padding-right: 10px;'>Delete:</label>
                              <input style='scale: 2;' type='checkbox' name='del' $checked>
                            </div>
                        </div>
                    </div>
                  </div>";
              };
            ?>
          </section>

          <section class="orders">
            <?php
              $connection = mysqli_connect($HOST, $USER, $PASSWORD, $DB_NAME);
              $query = ('SELECT email, 
                    name, 
                    tel, 
                    problem, 
                    date, 
                    status, 
                    order_id
                    FROM orders 
                    REVERSE LIMIT 30');
              $result = mysqli_query($connection, $query);

              foreach ($result as $row) {

                $email = $row['email'];
                $name = $row['name'];
                $tel = $row['tel'];
                $problem = $row['problem'];
                $date = $row['date'];
                $status = $row['status'];
                $order_id = $row['order_id'];              
              
                if ($status == 0){
                  $style = '';

                  $options =
                  "<option value=''>Change status</option>
                  <option value='1'>Closed</option>
                  <option value='2'>Viewed</option>
                  <option value='3'>In work</option>";

                }elseif ($status == 1){
                  $style= 'background:#8bf78b';

                  $options=
                  "<option value='1'>Closed</option>
                  <option value='2'>Viewed</option>
                  <option value='3'>In work</option>";

                }elseif ($status == 2){
                  $style = 'opacity:0.4';

                  $options =
                  "<option value='2'>Viewed</option>
                  <option value='1'>Closed</option>
                  <option value='3'>In work</option>";

                }elseif ($status == 3){
                  $style = 'background:#f1f184';

                  $options =
                  "<option value='3'>In work</option>
                  <option value='1'>Closed</option>
                  <option value='2'>Viewed</option>";
                };
                
                echo
                  "<div class='order $order_id' style='$style'>
                    <div class='left_side'>
                      <button class='accept' onclick='changeOrderStatus( $order_id )'><div></div><div></div></button>
                      Status:
                      <select name='order_status'>
                        $options
                      </select>
                      <div><b>DATE:</b> <b>$date</b></div>
                      <div><b>NAME:</b> $name</div>
                      <div><b>EMAIL:</b> $email</div>
                      <div><b>NUMBER:</b> $tel</div>
                    </div>
                    <div style='padding-top: 15px;'><b>PROBLEM:</b> $problem</div>
                  </div>";
              };
            ?>
          </section>

          <section class="reserved_boards" style="display:none">

            <div>

            <?php
            $connection = mysqli_connect($HOST, $USER, $PASSWORD, $DB_NAME);
            $query = ("SELECT personal_num, 
                  date, 
                  status, 
                  img_src, 
                  processor, 
                  frequency, 
                  socket, 
                  cores, 
                  threads, 
                  ram_size, 
                  ram_type, 
                  price, 
                  quantity, 
                  on_sale
                  FROM combined_reservations 
                  ORDER BY date DESC");
            $result = mysqli_query($connection, $query);

            $result = mysqli_fetch_all($result, 1);
            $index = -1;

            foreach ($result as $row) {

              $personal_num = $row['personal_num'];
              $date = $row['date'];
              $status = $row['status'];
              $img_src = $row['img_src'];
              $processor = $row['processor'];
              $frequency = $row['frequency'];
              $socket = $row['socket'];     
              $cores = $row['cores'];
              $threads = $row['threads'];
              $ram_size = $row['ram_size'];
              $ram_type = $row['ram_type'];
              $price = $row['price'];
              $quantity = $row['quantity'];
              $on_sale = $row['on_sale'];         
              $index += 1;

              if ($on_sale == 0)
                $on_sale = 'opacity:0.4';
              else
                $on_sale = '';

              if ($status == 0){
                $style = '';

                $options =
                  "<option value=''>Change status</option>
                  <option value='1'>Closed</option>
                  <option value='2'>Rejected</option>";

              }elseif ($status == 1){
                $style = 'background:#8bf78b';

                $options =
                  "<option value='1'>Closed</option>
                  <option value='2'>Rejected</option>";

              }elseif ($status == 2){
                $style = 'background:#f36666';

                $options =
                "<option value='2'>Rejected</option>
                <option value='1'>Closed</option>";

              }
              if ($index == 0 or $result[$index-1]['personal_num'] != $result[$index]['personal_num']){

                echo
                "</div>
                <div class='big_wrapper $personal_num' style='$style'>
                  Status:
                  <select class='reserve_status' name='reserve_status'>
                  $options
                  </select>
                    <button class='accept' onclick='changeReservedStatus($personal_num)'><div></div><div></div></button><br>
                    <b>Reservation date: </b>$date<br>
                    <b>Personal_num: </b>$personal_num";

              };
              echo 
              "<div class='product' style='$on_sale'>
                <img src='static/IMG/products/$img_src'>
                <div class='right_side'>
                    <p>Processor $processor $frequency" . "GHz $cores cores $threads threads, RAM $ram_type $ram_size GB, socket: $socket</p>
                    <div class='footer'>
                        <div class='price'>Price: $price<span>$</span></div>
                    </div>
                </div>
              </div> <!-- big_wrapper end -->";
            }
            ?>
            </div>
          </section>

        <?php include('footer.php'); ?>
        </body>
        <style>

            .products{
              padding-top: 10px;
              margin: 0 auto;
            }

            .add_item{
                width: 400px;
                margin: 0 auto;
                padding: 40px 20px 20px 20px;
                font-family: montserrat;
                font-size: 18px;
                text-align: center;
                border: 2px solid black;
                position: relative;
            }

            .add_item div{
                margin-top: 30px;
                display: flex;
                justify-content: space-between;
            }

            .add_item .error{
              margin: 0 auto;
              color: red;
              text-align: center;
              display:block;
              font-weight: 600;
            }

            .add_item input{
                font-family: montserrat;
                font-size: 18px;
            }

            button{
                margin: 40px 0 0 0;
                font-family: montserrat;
                font-weight: 600;
                font-size: 20px;
                color: white;
                background-color: black;
                border: 1px solid;
                border-radius: 30px;
                width: 200px;
                height: 50px;
                transition: 0.3s;
                cursor: pointer;
            }

            .add_item button{
                margin: 40px 0 0 0;
                font-family: montserrat;
                font-weight: 600;
                font-size: 20px;
                color: white;
                background-color: black;
                border: 1px solid;
                border-radius: 30px;
                width: 200px;
                height: 50px;
                transition: 0.3s;
                cursor: pointer;
            }

            .add_item .clear{
              width: 100px;
              background-color: black;
              color: white;
            }

            .add_item .clear:hover{
              background-color: white;
              color: black;
              transition: 0.3;
            }

            button:hover{
                background-color: white;
                color: black;
            }

            .button_save{
              width: 200px;
              margin: 0 auto 30px auto;
              height: 60px;
            }

            .button_save button{
              padding: 0;
            }
            /*** Products section **************************************/
            
            .right_side{
                width: 80%;
                margin-right:30px;
            }

            
            input[type=text]{
                width: 100px;
            }

            .product button{
              background-color: black;
              border-radius: 10px;
              width: 40px;
              height: 40px;
              cursor: pointer;
            }

            .product img{
              z-index:10;
              border-radius:  20px 0 0 20px;
            }
            .product button:hover div{
              background-color: black;
            }

            .accept div{
              position: relative;
              top: 10px;
              right: -5px;
              background-color: white;
              width: 15px;
              height: 3px;
              transform: rotate(60deg);
            }

            .accept div:last-child{
              background-color: white;
              transform: rotate(-60deg);
              left: 10px;
              width: 25px;
              top: 1px;
            }

            /* Reservation SECTION ********/
            .orders{
              display:block;
            }

            .order{
              max-width: 620px;
              margin: 20px auto;
              border: 2px solid;
              border-radius: 20px;
              padding: 10px;
              font-family: montserrat;
            }
            
            .order .accept{
              float: right;
              width: 40px;
              height: 40px;
              border-radius: 10px;
            }

            .order .left_side div{
              max-width: 400px;
              display: flex;
              justify-content: space-between;
            }



            /* reservaions_section */
            .big_wrapper{
              font-family:montserrat;
              width: 800px;
              border: 3px solid black;
              border-radius: 20px;
              margin: 20px auto;
              padding: 20px;
            }

            .big_wrapper select{
              font-size: 16px;
            }

            .big_wrapper .accept{
              width:45px;
              height: 45px;
              padding-left: 3px;
              margin-left: 5px;
              margin-top: 0px;
            }

            .big_wrapper .accept:hover div{
              background-color: black;
            }

        </style>
<script src="static/JS/jquery-3.7.1.js"></script>
<script src="static/JS/632412admin.js"></script>
</html>
