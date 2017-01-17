<?php
// Grab any extra form data!
foreach ($_POST as $key => $val) {
    echo $key . ": " . $val . "\n";
}

/*echo '<pre>';
print_r($_FILES);
echo '</pre>';*/

// Remember to process the uploads!
$f = $_FILES["file"];
$file = $f["name"];
$error = false;
if ($error) {
    //die("Error: " . $error);
} else {
    move_uploaded_file($_FILES["file"]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$file);
    //die("File: " . $file);
}

//TODO Return response in json format
?>
<div data-file="<?php echo $file ?>"></div>
