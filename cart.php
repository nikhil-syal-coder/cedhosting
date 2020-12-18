<?php 
require_once('header.php');
if(isset($_SESSION['cart'])){
if(count($_SESSION['cart'])==0){
    echo '<center><h2>The Card Is Empty</h2></center>';
}
}
?>

<div class="table-responsive">
              <table class="table align-items-center table-flush" id="myTable">
                <thead class="thead-light">
                  <tr>
                   
                    <th scope="col" class="sort" data-sort="name">Category-Name</th>
                    <th scope="col" class="sort" data-sort="name">Product-Name</th>
                    <th scope="col" class="sort" data-sort="budget">Product-Price</th>
                    <th scope="col" class="sort" data-sort="status">Package</th>
                    <th scope="col" class="sort" data-sort="completion">Action</th>
                  
                  </tr>
                </thead>
                <tbody class="list">
                  <tr>
                 <?php if(isset($_SESSION['cart'])){ foreach($_SESSION['cart'] as $key=>$val){
                     $val3='';
                     $name=$val['parent_id'];
                     $back2=$obj2->prod_name($name,$obj->conn);
                     foreach((array)$back2 as $val2){
                      $val3=$val2['prod_name'];
                      }
                 ?>
                    <td class="budget">

                       <?php echo $val3 ?>
                    </td>
                    <td class="budget">

                        <?php echo $val['name'] ?>
                    </td> 
                    <td class="budget">

                        <?php echo $val['price'] ?>
                    </td>
                    <td class="budget">

                        <?php echo $val['Package'] ?>
                    </td> 
                   
                    <td class="budget">
                        <a href="delete.php?id=<?php echo $key ?>" onClick="javascript: return confirm('Please confirm deletion');"
                class="a1">Delete</a>
                       
                   </td>
                  </tr>
               
                 <?php } }?>
                 </tbody>
              </table>
            </div>
            <div class="container">
          <center><h2 class="h2"><a class="chk" href="">Check-Out</a><h2></center>
            </div>
            <style>
                .a1{
                    border:1px solid red;
                    padding:10px;
                }
                .chk{
                  color:green;
                   }
                .h2{
                    padding:25px;
                }   
            </style>
<?php 
require_once('footer.php')
?>