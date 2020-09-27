 <?php  
      include "database.php";  
      // insert data student table  
      $id = $_POST['edit_id'];  
      $name = $_POST['name'];  
      //$password = md5($_POST['password']);
      $password = $_POST['password'];
      $email = $_POST['email'];  
      $query = "UPDATE users SET name='{$name}',email='{$email}', password='{$password}' WHERE id='{$id}'";  
      if ($con->query($query)) {  
           echo 1;  
      }else{  
           echo 0;  
      }  
 ?>