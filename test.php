<?php
//คำสั่ง connect db เขียนเพิ่มเองนะ

    $strExcelFileName="Member-All.xls";
    header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
    header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
    header("Pragma:no-cache");

    $sql=mysql_query("select * from tb_member");
    $num=mysql_num_rows($sql);
?>


<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<body>

    <strong>รายงานสมาชิก วันที่ <?php echo date("d/m/Y");?> ทั้งหมด <?php echo number_format($num);?> ท่าน</strong><br>
    <br>
    <div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
        <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
            <tr>
                <td width="94" height="30" align="center" valign="middle" ><strong>รหัสสมาชิก</strong></td>
                <td width="200" align="center" valign="middle" ><strong>ชื่อผู้ใช้งาน</strong></td>
                <td width="181" align="center" valign="middle" ><strong>ชื่อ-นามสกุล</strong></td>
                <td width="181" align="center" valign="middle" ><strong>เบอร์โทรศัทพ์</strong></td>
                <td width="181" align="center" valign="middle" ><strong>ที่อยู่</strong></td>
                <td width="185" align="center" valign="middle" ><strong>อีเมล์</strong></td>
            </tr>
            <?php
                if($num>0){
                    while($row=mysql_fetch_array($sql)){
            ?>
            <tr>
                <td height="25" align="center" valign="middle" ><?php echo"US".$row['id_member'];?></td>
                <td align="center" valign="middle" ><?php echo strip($row['username']);?></td>
                <td align="center" valign="middle"><?php echo strip($row['name']);?></td>
                <td align="center" valign="middle"><?php echo strip($row['mobile']);?></td>
                <td align="center" valign="middle"><?php echo strip($row['address']);?></td>
                <td align="center" valign="middle"><?php echo strip($row['email']);?></td>
            </tr>
        <?php
                    }
                }
        ?>
        </table>
    </div>

    <script>
        window.onbeforeunload = function(){return false;};
        setTimeout(function(){window.close();}, 10000);
    </script>
</body>
</html>

,

<?php
    /*******EDIT LINES 3-8*******/
    $DB_Server = "localhost"; //MySQL Server    
    $DB_Username = "username"; //MySQL Username     
    $DB_Password = "password";             //MySQL Password     
    $DB_DBName = "databasename";         //MySQL Database Name  
    $DB_TBLName = "tablename"; //MySQL Table Name   
    $filename = "excelfilename";         //File Name

    /*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    

    //create MySQL connection   
    $sql = "Select * from $DB_TBLName";
    $Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
    //select database   
    $Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
    //execute query 
    $result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());   

    $file_ending = "xls";
    //header info for browser
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=$filename.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");
    /*******Start of Formatting for Excel*******/   
    //define separator (defines columns in excel & tabs in word)
    $sep = "\t"; //tabbed character
    //start of printing column names as names of MySQL fields
    for ($i = 0; $i < mysql_num_fields($result); $i++) {
        echo mysql_field_name($result,$i) . "\t";
    }
    print("\n");    
    //end of printing column names  
    //start while loop to get data

    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }   
?>