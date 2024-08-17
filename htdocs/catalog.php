<!DOCTYPE html>
<html lang="en">
<?php
include('header.php')
?>
<link rel="stylesheet" href="static/CSS/catalog.css">
<section class="catalog">
  <div class="close_panel" onclick="closeFilters()">
    <div></div>
    <div></div>
  </div>
  <div class="search_panel">

    <div class="flex_search_filter">
      <div class="arrow arrow_up" onclick="changeArrow(0)">
        <div></div>
        <div></div>
      </div>
      <p>Processor</p>
      <div class="div_for_hide">
        <div class="input"><input type="checkbox" key="processor" value="intel Xeon e5 2420" onclick="reviewSelectedFilters()"> Intel Xeon E5-2420</div>
        <div class="input"><input type="checkbox" key="processor" value="Intel Xeon E5-2450 v2" onclick="reviewSelectedFilters()"> Intel Xeon E5-2450v2</div>
        <div class="input"><input type="checkbox" key="processor" value="intel Xeon e5 2620" onclick="reviewSelectedFilters()"> Intel Xeon E5-2620</div>
        <div class="input"><input type="checkbox" key="processor" value="intel Xeon e5 2650" onclick="reviewSelectedFilters()"> Intel Xeon E5-2650</div>
        <div class="input"><input type="checkbox" key="processor" value="intel Xeon e5 2670" onclick="reviewSelectedFilters()"> Intel Xeon E5-2670</div>
        <div class="input"><input type="checkbox" key="processor" value="intel Xeon e5 2680" onclick="reviewSelectedFilters()"> Intel Xeon E5-2680</div>
        <div class="input"><input type="checkbox" key="processor" value="intel Xeon e5 2689" onclick="reviewSelectedFilters()"> Intel Xeon E5-2689</div>
        <div class="input"><input type="checkbox" key="processor" value="intel Xeon e5 2690" onclick="reviewSelectedFilters()"> Intel Xeon E5-2690</div>
      </div>
    </div>

    <div class="flex_search_filter">
      <div class="arrow arrow_up" onclick="changeArrow(1)">
        <div></div>
        <div></div>
      </div>
      <p>Frequency</p>
      <div class="div_for_hide">
        <div class="input"><input type="checkbox" key="frequency" value=1.9 onclick="reviewSelectedFilters()"> 1.9 GHz
        </div>
        <div class="input"><input type="checkbox" key="frequency" value=2.0 onclick="reviewSelectedFilters()"> 2.0 GHz
        </div>
        <div class="input"><input type="checkbox" key="frequency" value=2.1 onclick="reviewSelectedFilters()"> 2.1 GHz
        </div>
        <div class="input"><input type="checkbox" key="frequency" value=2.2 onclick="reviewSelectedFilters()"> 2.2 GHz
        </div>
        <div class="input"><input type="checkbox" key="frequency" value=2.3 onclick="reviewSelectedFilters()"> 2.3 GHz
        </div>
        <div class="input"><input type="checkbox" key="frequency" value=2.4 onclick="reviewSelectedFilters()"> 2.4 GHz
        </div>
        <div class="input"><input type="checkbox" key="frequency" value=2.5 onclick="reviewSelectedFilters()"> 2.5 GHz
        </div>
        <div class="input"><input type="checkbox" key="frequency" value=2.6 onclick="reviewSelectedFilters()"> 2.6 GHz
        </div>
      </div>
    </div>

    <div class="flex_search_filter">
      <div class="arrow arrow_up" onclick="changeArrow(2)">
        <div></div>
        <div></div>
      </div>
      <p>Socket</p>
      <div class="div_for_hide">
        <div class="input"><input type="checkbox" key="socket" value="LGA 2011" onclick="reviewSelectedFilters()"> LGA
          2011</div>
        <div class="input"><input type="checkbox" key="socket" value="LGA 1356" onclick="reviewSelectedFilters()"> LGA
          1356</div>

      </div>
    </div>

    <div class="flex_search_filter">
      <div class="arrow arrow_up" onclick="changeArrow(3)">
        <div></div>
        <div></div>
      </div>
      <p>Cores quantity</p>
      <div class="div_for_hide">
        <div class="input"><input type="checkbox" key="cores" value=4 onclick="reviewSelectedFilters()"> 4</div>
        <div class="input"><input type="checkbox" key="cores" value=6 onclick="reviewSelectedFilters()"> 6</div>
        <div class="input"><input type="checkbox" key="cores" value=8 onclick="reviewSelectedFilters()"> 8</div>
      </div>
    </div>

    <div class="flex_search_filter">
      <div class="arrow arrow_up" onclick="changeArrow(4)">
        <div></div>
        <div></div>
      </div>
      <p>Threads quantity</p>
      <div class="div_for_hide">
        <div class="input"><input type="checkbox" key="threads" value=4 onclick="reviewSelectedFilters()"> 4</div>
        <div class="input"><input type="checkbox" key="threads" value=6 onclick="reviewSelectedFilters()"> 6</div>
        <div class="input"><input type="checkbox" key="threads" value=8 onclick="reviewSelectedFilters()"> 8</div>
        <div class="input"><input type="checkbox" key="threads" value=12 onclick="reviewSelectedFilters()"> 12</div>
        <div class="input"><input type="checkbox" key="threads" value=16 onclick="reviewSelectedFilters()"> 16</div>
      </div>
    </div>

    <div class="flex_search_filter">
      <div class="arrow arrow_up" onclick="changeArrow(5)">
        <div></div>
        <div></div>
      </div>
      <p>RAM</p>
      <div class="div_for_hide">
        <div class="input"><input type="checkbox" key="ram_size" value=8 onclick="reviewSelectedFilters()"> 8 GB</div>
        <div class="input"><input type="checkbox" key="ram_size" value=12 onclick="reviewSelectedFilters()"> 12 GB</div>
        <div class="input"><input type="checkbox" key="ram_size" value=16 onclick="reviewSelectedFilters()"> 16 GB</div>
      </div>

      <div class="flex_search_filter">
        <div class="arrow arrow_up" onclick="changeArrow(6)">
          <div></div>
          <div></div>
        </div>
        <p>RAM type</p>
        <div class="div_for_hide">
          <div class="input"><input type="checkbox" key="ram_type" value="DDR3" onclick="reviewSelectedFilters()"> DDR3
          </div>
          <div class="input"><input type="checkbox" key="ram_type" value="DDR4" onclick="reviewSelectedFilters()"> DDR4
          </div>
        </div>
      </div>
    </div>
    <div style="height: 50px;"></div>
  </div>

  <!-- new section ------------------------------------------------------------------------------------------->
  <div class="products">
    <div class="wrapper_products">
      <div class="filters_basket">
        <p class="filters" onclick="showFilters()">Filters</p>
        <p class="basket" onclick="showBasket()" value="closed">Cart</p>
      </div>

      <h1 class="empty">Cart</h1>
      <p class="empty">Cart is empty</p>

    </div>
    <button class="trade_button" type="submit" onclick="reserveOrder()">Make an order</button>
    </form>
    <h2 class=personal_num style="display:none"></h2>
    <p class="trade_text">Order is registered. You can come to our store and receive your order within 2 days</p>
    <?php
    
    include('../settings.php');
    try {
      $connection = mysqli_connect($HOST, $USER, $PASSWORD, $DB_NAME);
    } catch (Throwable) {
      echo json_encode(array('status'=>'error'));
    }
    $sql_request = "SELECT * FROM products";



    /* if filters are exists, build sql request */
    if (count($_GET) != 0) {

      $sql_request = "SELECT * FROM products WHERE on_sale = 1 ";

      foreach($_GET as $key=>$value){
          
          $sql_request .= '(';
          $list= explode(',', $value);

          if (count($list) > 1){
              foreach($list as $item){
                  $sql_request .= "$key='$item' OR ";
              }
              $sql_request = substr($sql_request, 0, -3);
              $sql_request .= ') AND ';
          }
          else{
              $item = $list[0];
              $sql_request .= "$key='$item') AND ";
          }
          
      }
      $sql_request = substr($sql_request, 0, -4);
    }else{
      $sql_request = "SELECT * FROM products WHERE on_sale = 1 ";
    }

    try {
        $result = mysqli_query($connection, $sql_request);
    } catch (Throwable $e) {
      echo json_encode(array('status'=>'error'));    }

    if (mysqli_num_rows($result) != 0) {

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

        echo
        "<div class='product' value='$product_id'>
                <img src='static/IMG/products/$img_src'>
                <div class='right_side'>
                    <p>Processor $processor $frequency" . "GHz $cores cores $threads threads, RAM $ram_type 
                    $ram_size GB, socket: $socket</p>
                    <div class='footer'>
                        <div class='price'>price: <span> $price $</span></div>
                        <button onclick='addToBasket($product_id)'>Add to cart</button>
                    </div>
                </div>
            </div>";
      }
    } 
    else {
      echo "<div style='text-align:center'>Nothing find. Try to change filters</div>";
    }
  ?>
  </div>
  <a href="" class="apply_filters">Accept</a>
</section>

<?php
  include('footer.php');
?>
</body>
<script src="static/JS/catalog.js"></script>
</body>

</html>