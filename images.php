<?php

//change this variable to be the title of the new page
$title = 'List of Images';

//include the header - all pages use the same header
include 'includes/header.php';

?>

<!--  Page content goes here   -->
<div class="container">

    <?php
    
    //connect to DB
    require_once('dbconfig.php');
    
    //go get all the users
    $sql = "SELECT * FROM images";
    $result = $conn->query($sql);
    
    //developer function to view result
    //var_dump($result);
           
    echo 'Currently we have ' . $result->num_rows . ' images in our portfolio...';
    
    ?>
    
    <table class="table table-striped table-bordered">
       <thead>
           <tr>
               <th>Image</th>
               <th>Description</th>
               <th>Date Uploaded</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
       
     
    <?php
       
    //loop thru all results and create a table row for each
    while($row = $result->fetch_assoc()){
        echo '<tr>';
echo '<td><img src="' . $row['file_path'] . '"></td>';
        echo '<td>' . $row['description'] . '</td>';
        echo '<td>' . $row['date_uploaded'] . '</td>';
echo '<td><a href="javascript:confirmDelete('.$row['image_id'].',&apos;'.$row['file_path'].'&apos;);">delete</a></td>';
        echo '</tr>';
    }
    
    $conn->close();
    
    ?>
        </tbody>
    </table>
    
</div><!-- end of class=container -->


<script>
    
function confirmDelete(id,filePath){
    var yes = confirm('Are you sure?');
    if(yes == true){
        window.location = 'deleteImage.php?imageID='+id+'&filePath='+filePath;
    }
};
</script>


<?php

//include the footer - all pages use the same footer
include 'includes/footer.php';

?>
