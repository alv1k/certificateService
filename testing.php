<form action="testing.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="2017154">
    <input type="file" name="filename">
    <input type="submit" value="Отправить файл">
</form>
<?php 
    print_r($_FILES['filename']);

?>