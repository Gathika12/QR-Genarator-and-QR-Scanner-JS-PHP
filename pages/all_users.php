 <?php include_once('inc/header.php'); ?>
 <?php include_once('config/config.php'); ?>
 <div class="conatainer-fluid" >
    <div class="container">
 <h3 class="text-center text-white">All Users</h3>
  <a href="pages/add_new_user.php" class="btn btn-info mb-2 pull-right">Add New</a>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Sno<?php $sno='1'; ?></th>
        <th>Student ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Profile Image</th>
        <th>Action</th>
        <th>G-QR</th>
      </tr>
    </thead>
   
      
  <tbody>
    <?php 
$get_all_users = "SELECT * FROM user";
$res = mysqli_query($conn,$get_all_users);
if(mysqli_num_rows($res)>0){
  while($rs = mysqli_fetch_assoc($res)){
    //echo $rs['id'];
    ?>
    <tr>
        <td><?php echo $sno++;?></td>
        <td><?php echo $rs['stuid']; ?></td>
        <td><?php echo $rs['first_name']; ?></td>
        <td><?php echo $rs['last_name'];?></td>
        <td> <?php echo $rs['email'];?></td>
        <td> <?php echo $rs['profile_picture'];?></td>
        <td><a href="#">View</a></td>
        <td>
          <a href="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo $rs['id'];?>" onclick="createQR(<?php echo $rs['id'];?>)">Generate</a>
        </td>
      </tr>

    <?php

  }

}
else{
  ?>
  <tr>
    <td colspan="6" style="text-align: center;">No Data Found</td>
  </tr>
<?php
}


    ?>
      
     
    </tbody>
  </table>
   <?php include_once('inc/footer.php'); ?>

   <script>

    fun createQR(qrValue){
      qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${0011}`;
    qrImg.addEventListener("load", () => {
        wrapper.classList.add("active");
        generateBtn.innerText = "Generate QR Code";
    });
    }

    qrInput.addEventListener("keyup", () => {
    if(!qrInput.value.trim()) {
        wrapper.classList.remove("active");
        preValue = "";
    }
});

  </script>