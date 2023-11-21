<?php
require_once('db_credentials.php');
require_once('database.php');
$db = db_connect();


if(!isset($_GET['id'])) {
  header("Location:  index.php");
}
$id = $_GET['id'];

$page_title = 'Edit Blog'; 
  // Handle form values sent by new.php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  //access the employee information
  $author = $_POST['author']; 
  $category= $_POST['category'] ;
  $content= $_POST['content'] ;
  //update the table with new information
  $sql="UPDATE shortblogs set author = '$author' , category= '$category' , content= '$content' where id = '$id' ";
  $result = mysqli_query($db, $sql);
  //redirect to show page
    header("Location: show.php?id=  $id");
  }
  // display the employee information
  else {
$sql = "SELECT * FROM shortblogs WHERE id= '$id' ";
    
$result_set = mysqli_query($db, $sql);
    
$result = mysqli_fetch_assoc($result_set);
  }

?>

<?php include 'headerEm.php' ?>;

<div id="content">

  <a class="back-link" href="index.php"> Back to List</a>

  <div class="page edit">
    <h1>Edit Blog
    </h1>
    <!-- form will post to the same page -->
    <form form action="<?php echo 'edit.php?id=' . $result['id']; ?>"  method="post">
      <dl>
        <dt> ID</dt>
        <dd><input type="text" name="id" value="<?php echo $result['id']; ?>" /></dd>
        </dd>
      </dl>
      <dl>
        <dt>Author</dt>
        <dd><input type="text" name="author" value="<?php echo $result['author']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Category</dt>
        <dd><input type="text" name="category" value="<?php echo $result['category']; ?>" /></dd>

        </dd>
      </dl>
      <dl>
        <dt>Content</dt>
        
        <dd><input type="text" name="content" value="<?php echo $result['content']; ?>" /></dd>

        </dd>
      </dl>
      
      <div id="operations">
        <input type="submit" value="Edit Blog" />
      </div>
    </form>

  </div>

</div>

<?php include 'footerEm.php'; ?>