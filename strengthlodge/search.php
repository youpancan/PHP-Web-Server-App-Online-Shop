<?php 
ob_start();
$page="Search";
include_once('dbconn.php');
include_once('header.php');
$search=$_REQUEST['search'];
if($search=="" or $search==" " or $search=="   "){
  header('location:index.php');
}
$remove[]="'";
$remove[]='"';
$search=str_replace($remove,"",$search);
// For pagination 
  // Define number of elements per page
  if(isset($_REQUEST['showpage'])){
    $results_per_page=$_REQUEST['showpage'];
  }else{
  $results_per_page=5;
}
  //Find out $page 
  if(!isset($_REQUEST['page'])){
    $thispage=1;
  }
  else{
    $thispage=$_REQUEST['page'];
  }
  //Query
  $startnum=($thispage-1)*$results_per_page;
$sqlsearch="select * from tblproduct where producttitle like '%".$search."%' or productdescription like '%".$search."%' limit ".$startnum.",".$results_per_page;
$resultsearch=mysqli_query($conn,$sqlsearch) or die(mysqli_error($conn));
  // Find out number of elements in the database
  $sqltotal="select * from tblproduct where producttitle like '%".$search."%' or productdescription like '%".$search."%'";
  $resulttotal=mysqli_query($conn,$sqltotal) or die(mysqli_error($conn));
  $number_of_elements=mysqli_num_rows($resulttotal);

  //Number of total pages available
  $number_of_pages=ceil($number_of_elements/$results_per_page);

?> 
 <!-- BREADCRUMB -->
  <div id="breadcrumb">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active"><?php echo $search; ?></li>
      </ul>
    </div>
  </div>
    <!-- /BREADCRUMB -->

  <!-- section -->
  <div class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- ASIDE -->
        <div id="aside" class="col-md-3">
        


          <!-- aside widget -->
          <div class="aside">
            <h3 class="aside-title">Filter by Categories</h3>
            <ul class="list-links">
                  <?php 
                    $sqlcategory="select * from tblcategory";
                    $resultcategory=mysqli_query($conn,$sqlcategory) or die(mysqli_error($conn));
                    while($rowcategory=mysqli_fetch_assoc($resultcategory)){
                      echo '
                    <div class="panel-heading">
                      <a data-toggle="collapse" href="#'.$rowcategory['id'].'"><h4 class="panel-title"><span class="fa fa-caret-right"> 
                         '.$rowcategory['catname'].'</span>
                      </h4>
                      </a>
                    </div>
                    <div id="'.$rowcategory['id'].'" class="panel-collapse collapse">
                      <ul class="list-group">';
                      $sqlsubcategory="select * from tblsubcategory where catid=".$rowcategory['id'];
                      $resultsubcategory=mysqli_query($conn,$sqlsubcategory) or die(mysqli_error($resultsubcategory));
                      while($rowsubcategory=mysqli_fetch_assoc($resultsubcategory)){
                        $sqlproductcount="select count(*) from tblproduct where pscid=".$rowsubcategory['id'];
                        $resultproductcount=mysqli_query($conn,$sqlproductcount) or die(mysqli_error($conn));
                        $rowproductcount=mysqli_fetch_row($resultproductcount);
                        echo '<a href="shop.php?category='.$rowsubcategory['id'].'"><li class="list-group-item">';
                        if($rowproductcount['0']==0){
                            echo '<span class="label label-warning">'.$rowproductcount['0'].'</span> ';
                            }elseif($rowproductcount['0']<=5){
                            echo '<span class="label label-primary">'.$rowproductcount['0'].'</span> ';
                            }elseif($rowproductcount['0']>5){
                            echo '<span class="label label-success">'.$rowproductcount['0'].'</span> ';
                            }
                        echo $rowsubcategory['subcatname'].'</li></a>';
                      }
                echo '</div>';
                    }
                  ?>    
            </ul>
          </div>
          <!-- /aside widget -->



        </div>
        <!-- /ASIDE -->

        <!-- MAIN -->
        <div id="main" class="col-md-9">
          <!-- store top filter -->
          <div class="store-filter clearfix">
            <div class="pull-right">
              <div class="page-filter">
                <span class="text-uppercase">Show:</span>
                <form action="#" method="post">
                <select class="input" id="showpage" name="showpage" onchange="this.form.submit()">
                    <option value="6" <?php if($results_per_page==6){echo 'selected'; }?>>6</option>
                      <option value="9" <?php if($results_per_page==9){echo 'selected'; }?>>9</option>
                      <option value="12" <?php if($results_per_page==12){echo 'selected'; }?>>12</option>
                    </select>
                  </form>
              </div>

            </div>
          </div>
          <!-- /store top filter -->

          <!-- STORE -->
          <div id="store">
            <!-- row -->
            <div class="row">
              <!-- Product Single -->
            <?php
while($rowsearch=mysqli_fetch_assoc($resultsearch)){
            echo'<div class="col-md-4 col-sm-6 col-xs-6">
                    <!-- Product Single -->
              <div class="product product-single">
                <div class="product-thumb">
                  <a href="product-page.php?product='.$rowsearch['id'].'"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button></a>
                  <img src="img/products/'.$rowsearch['productprimaryimage'].'" alt="'.$rowsearch['producttitle'].'"></a>
                </div>
                <div class="product-body">
                <h3 class="product-price"><i class="fas fa-rupee-sign"></i>'.$rowsearch['productofferprice'].'<del class="product-old-price"> <i class="fas fa-rupee-sign"></i>'.$rowsearch['productprice'].'</del></h3>
                  <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                  </div>
                  <h2 class="product-name"><a href="product-page.php?product='.$rowsearch['id'].'">'.$rowsearch['producttitle'].' </a></h2>
                </div>
              </div>
              <!-- /Product Single -->
              </div>';
            }?></div>
            <!-- /row -->
          </div>
          <!-- /STORE -->

          <!-- store bottom filter -->
          
        </div>
        <!-- /MAIN -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /section -->

  
<?php
include_once('footer.php');
?>
</body>
</html>