<?php 
    require_once('../php/connect.php');

    $strExcelFileName="photo_contest.xls";
    header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
    header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
    header("Pragma:no-cache");

    $sql = " SELECT * FROM photo ";
    $result = $conn->query($sql);

?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 </head>
 
 
 <body>
 
    <strong class="text-center">PHOTO CENTEST</strong><br>
    <br>
    <!-- table -->
    <table id="dataTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Description</th>
                <th>Vote</th>
                <th>Status</th>
                <th>Owner ( id : name )</th>
                <th>Post_at</th>
            </tr>
        </thead>
        <tbody>
        <?php 
                while ($row = $result->fetch_assoc()) {
                    ?>
            <tr>
                <td><?=$row['img_id']; ?></td>
                <td><?=$row['image']; ?></td>
                <td><?=$row['img_name']; ?></td>
                <td><?=$row['description']; ?></td>
                <td><?=$row['vote']; ?></td>
                <td>
                    <?php 
                        if ($row['status']==0) {
                    ?>
                            <button class="text-danger" href="process/downstat.php?img_id=<?=$row['img_id']; ?>">ON</button>
                    <?php
                        } else {
                    ?>
                            <button class="text-success" href="process/upstat.php?img_id=<?=$row['img_id']; ?>">OFF</button>
                    <?php
                        }
                    ?>
                </td>
                <td><?=$row['mem_id']; ?> : <?=$row['name']; ?></td>
                <td><?=$row['posted_at']; ?></td>
            </tr>
        <?php
                }
            
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Description</th>
                <th>Vote</th>
                <th>Status</th>
                <th>Owner ( id : name )</th>
                <th>Post_at</th>
            </tr>
        </tfoot>
    </table>

    <script>
        window.onbeforeunload = function(){return false;};
        setTimeout(function(){window.close();}, 10000);
    </script>
 </body>
 </html>