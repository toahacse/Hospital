<?php
if(isset($_POST['value'])) {
    $db=mysqli_connect("localhost","root","","hms");
    $value = $_POST['value'];
    $con = new PDO ("mysql:host=localhost;dbname=hms","root","");
    $select=$con->prepare("SELECT * FROM add_doctor where s_d_s='$value'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    while($p=$select->fetch()){?>
        <select name="d_name" id="d_name">
        <option>Slect Doctor</option>
        <option><?php echo $p['a_d_name']?> </option>
        </select>
        <?php
    }
}
if(isset($_POST['value1'])) {
    $db=mysqli_connect("localhost","root","","hms");
    $value1 = $_POST['value1'];
    $con = new PDO ("mysql:host=localhost;dbname=hms","root","");
    $select=$con->prepare("SELECT * FROM add_doctor where a_d_name='$value1'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    while($p=$select->fetch()){?>
        <select name="s_a_d_name" id="s_a_d_name">
        <option><?php echo $p['a_d_fees']?></option>
        </select>
        <?php
    }
}
?>