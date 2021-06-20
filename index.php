<?php include("server.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    table,td,th{
        border-collapse:collapse;
        border:1px solid green;
        padding:5px
    }
    </style>
    <script>
    function save(){
        var a=new XMLHttpRequest();
        a.onreadystatechange=function(){
            if(a.readystate==4 && a.status==200){
                alert(a.response.Text);
            }
        }
        var name=document.getElementById("name").value;
        var city=document.getElementBiId("city").value;
        var val="name="+name+"&city="+city;
        var url="server.php"
        a.open("POST",url,true);
        a.setRequestHeader("content-type"," application/x-www-form-urlencoded");
        a.setRequestHeader("content-length",val.length);
        a.setrequestHeader("connection","close");
        a.send(val);
    }
    </script>
</head>
<body>
    
    <form action="server.php" method="post">
    <input type="hidden" name="id"  value="<?php echo $id;?>">
    <label>Name</label>
    <input type="text" name="name" id="name" value="<?php echo $name;?>">
    <label>City</label>
    <input type="text" name="city" id="city" value="<?php echo $city;?>">
    <?php if($action==1): ?>
    <button name="save" onclick="save()">Save</button>
    <?php else: ?>
    <button name="update">Update</button>
    <?php endif?>
    </form>
    <table align="center">
    <tr>
    <th>Name</th>
    <th>City</th>
    <th colspan="2px">Modify</th>
    </tr>
    <?php while($row=mysqli_fetch_array($result)){ ?>
    <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['address'];?></td>
    <td><button><a href="index.php?edit=<?php echo $row["id"];?>">Edit</a></button></td>
    <td><button><a href="index.php?delete=<?php echo $row["id"];?>">Delete</a></button></td>
    </tr>
    <?php } ?>
    </table>
    <?php if(isset($_SESSION["msg"])){
    echo $_SESSION["msg"];
    } ?>
</body>
</html>