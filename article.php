<!DOCTYPE html>
<html>
<title>Exam</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.js"></script>
<body>

<!-- <form method="post"> -->
    <h1> Simple Bulletin Board </h1>
    <label >Article Title :</label><br>
    <input type="text"name="title" id="title"></input> <br> 
    <label>Article Content  :</lable> <br>
    <input type= "text" name="content" id="content"></input>
    <br>
    <br>
    <button  name="add" id="add">Submit</button>

<!-- </form> -->
    <br>
    <br>
    <table border="2" style="border-collapse:collapse;">
      <thead>
        <tr>
             <th>id</th>
             <th>Title </th>
             <th>Content</th>
             <th>Action</th>
        </tr>
       </thead>
       <tbody>  
        <?php 

        if(isset($ret) && !empty($ret)) {?>
                <?php foreach ($ret as $key => $val) {?>
                     <tr>
                         <td><?php echo $val['id']  ?></td>
                         <td><?php echo $val['title']  ?></td>
                          <td><?php echo $val['content']  ?></td>
                          <td>
                            <a href="update.php" >edit</a>
                            <button id = "edit" data-id="<?php echo $val['id'] ?>">delete</button>
                          </td>
                     </tr>
          
                <?php }?>
        <?php }?>
      </tbody>
    </table>
</body>

</html>

<script>
$(document).ready(function()
{   
    $('#add').click(function(){
            var title = $('#title').val();
            var content = $('#content').val();

            var data = {
                title : title,
                content : content,
            };

            $.ajax({
            type: "POST",
            url: "add_article.php",
            data: data,
            success: function () {
                alert('Successfully Save!');window.location='index.php';
            }
        });

    });

    $('#edit').click(function(e){

        var ID = $(this).attr('data-id');
        var data = {
            id : ID
        };
        
         $.ajax({
            type: "POST",
            url: "delete.php",
            data: data,
            success: function () {
                alert('Successfully delete!');window.location='index.php';
            }
         });
     });


});
</script>