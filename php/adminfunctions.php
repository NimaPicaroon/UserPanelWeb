<?php 
$string = "none";
require_once 'database.php';
include 'config.php';

    if ($esx_legacy) {
        $identifier = $_GET['identifier'];
        $SQL = $pdo -> prepare("SELECT * FROM users WHERE identifier = '$identifier'");
        $SQL -> execute();
        $row = $SQL -> fetch();
        $ide = $row['identifier'];
    
        $inventory = $pdo -> query("SELECT * FROM `user_inventory` WHERE identifier='$identifier' ORDER BY `count` ASC");
        $vehicle = $pdo -> query("SELECT * FROM `owned_vehicles` WHERE owner='$identifier' ORDER BY `stored` ASC");
        $fines = $pdo -> query("SELECT * FROM `billing` WHERE identifier='$identifier' ORDER BY `amount` ASC");
    
    
        $ranking = $pdo -> query("SELECT * FROM `$framework`");
        $rowrank = $ranking -> fetch();

        if ($moneyjson2) {
            $jsonmoney2 = $row['accounts'];
            $moneyjson2 = json_decode($jsonmoney2);
        }
    
        if ($moneyjson) {
            $jsonmoney = $row['money'];
            $moneyjson = json_decode($jsonmoney);
        }
    }
    
    if ($esx_v1final) {
        $identifier = $_GET['identifier'];
        $SQL = $pdo -> prepare("SELECT * FROM users WHERE identifier = '$identifier'");
        $SQL -> execute();
        $userid = $_SESSION['ID'];
        $row = $SQL -> fetch();
        $ide = $row['identifier'];
    
        $inventory = $pdo -> query("SELECT * FROM `user_inventory` WHERE identifier='$ide' ORDER BY `count` ASC");
        $vehicle = $pdo -> query("SELECT * FROM `owned_vehicles` WHERE owner='$ide' ORDER BY `stored` ASC");
        $fines = $pdo -> query("SELECT * FROM `billing` WHERE identifier='$ide' ORDER BY `amount` ASC");
    
    
        $ranking = $pdo -> query("SELECT * FROM `$framework`");
        $rowrank = $ranking -> fetch();
    
        $jsonchar = $row['charinfo'];
        $charjson = json_decode($jsonchar);
    
        if ($moneyjson2) {
            $jsonmoney2 = $row['accounts'];
            $moneyjson2 = json_decode($jsonmoney2);
        }
    
        if ($moneyjson) {
            $jsonmoney = $row['money'];
            $moneyjson = json_decode($jsonmoney);
        }
    }
    
    if ($esx_v1) {
        $identifier = $_GET['identifier'];
        $SQL = $pdo -> prepare("SELECT * FROM users WHERE identifier = '$identifier'");
        $SQL -> execute();
        $row = $SQL -> fetch();
        $ide = $row['identifier'];
    
        $inventory = $pdo -> query("SELECT * FROM `user_inventory` WHERE identifier='$ide' ORDER BY `count` ASC");
        $vehicle = $pdo -> query("SELECT * FROM `owned_vehicles` WHERE owner='$ide' ORDER BY `stored` ASC");
        $fines = $pdo -> query("SELECT * FROM `billing` WHERE identifier='$ide' ORDER BY `amount` ASC");
    
    
        $ranking = $pdo -> query("SELECT * FROM `$framework`");
        $rowrank = $ranking -> fetch();
    
        if ($moneyjson2) {
            $jsonmoney2 = $row['accounts'];
            $moneyjson2 = json_decode($jsonmoney2);
        }
    
        if ($moneyjson) {
            $jsonmoney = $row['money'];
            $moneyjson = json_decode($jsonmoney);
        }
    }
    
    if ($qbcore) {
        $identifier = $_GET['identifier'];
        $SQL = $pdo -> prepare("SELECT * FROM players WHERE citizenid = '$identifier'");
        $SQL -> execute();
        $row = $SQL -> fetch();
        $ide = $row['citizenid'];
    
        $inventory = $pdo -> query("SELECT inventory FROM `players` WHERE citizenid='$identifier'");
        $vehicle = $pdo -> query("SELECT * FROM `player_vehicles` WHERE citizenid='$identifier' ORDER BY `plate` ASC");
        $fines = $pdo -> query("SELECT * FROM `billing` WHERE identifier='$identifier' ORDER BY `amount` ASC");
    
        $ranking = $pdo -> query("SELECT * FROM `$framework`");
        $rowrank = $ranking -> fetch();
    
        $jsonchar = $row['charinfo'];
        $charjson = json_decode($jsonchar);
    
        if ($moneyjson2) {
            $jsonmoney2 = $row['accounts'];
            $moneyjson2 = json_decode($jsonmoney2);
        }
    
        if ($moneyjson) {
            $jsonmoney = $row['money'];
            $moneyjson = json_decode($jsonmoney);
        }
    
        $jsonjob = $row['job'];
        $jobjson = json_decode($jsonjob);
    }


?>

<?php 

class adminPlayer
{
    public function LoggedIn()
    {
        @session_start();
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }
}

class adminStadistics {

}

class adminData
{
    public function getAdmin($pdo)
    {
      global $row;
        if ($esx_legacy) {
            if ($row['group'] == 'superadmin' or 'admin') {
                return true;
            } else {
                return false;
            }
        }

        if ($esx_v1final) {
            if ($row['group'] == 'superadmin') {
                return true;
            } else {
                return false;
            }
        }

        if ($esx_v1) {
            if ($row['group'] == 'superadmin') {
                return true;
            } else {
                return false;
            }
        }

        if ($qbcore) {
            error_reporting(E_ERROR | E_PARSE);
            $Perms = $pdo -> prepare("SELECT * FROM permissions WHERE license = :license");
            $Perms -> execute(array(':license' => $row['license']));
            $permrow = $Perms -> fetch();
            if ($permrow['permission'] == 'admin') {
                return true;
            } else {
                return false;
            }
        }
    }
}

class AdminProfile
{
    public function getIcName($pdo)
    {
        require('config.php');
        global $row;

        if ($esx_legacy) {
            $icname = $row['firstname']." ".$row['lastname'];
    
            if ($icname == " ") {
                return "Unknown";
            } else {
                return $icname;
            }
        }

        if ($esx_v1final) {
            global $charjson;
            $icname = $charjson->{'firstname'}." ".$charjson->{'lastname'};
    
            if ($icname == " ") {
                return "Unknown";
            } else {
                return $icname;
            }
        }

        if ($esx_v1) {
            $icname = $row['firstname']." ".$row['lastname'];

            if ($icname == " ") {
                return "Unknown";
            } else {
                return $icname;
            }
        }

        if ($qbcore) {
            global $charjson;
            $icname = $charjson->{'firstname'}." ".$charjson->{'lastname'};
    
            if ($icname == " ") {
                return "Unknown";
            } else {
                return $icname;
            }
        }
    }

    public function getName($pdo)
    {
        require('config.php');
        global $row;

        if ($esx_legacy) {
            return $row['name'];
        }

        if ($esx_v1final) {
            global $charjson;
            return $charjson->{'firstname'};
        }

        if ($esx_v1) {
            return $row['firstname'];
        }

        if ($qbcore) {
            global $charjson;
            return $charjson->{'firstname'};
        }
    }

    public function getIdentifier($pdo)
    {
        require('config.php');
        global $row;
   
        if ($esx_legacy) {
            return $row['identifier'];
        }

        if ($esx_v1final) {
            return $row['identifier'];
        }
    
        if ($esx_v1) {
            return $row['identifier'];
        }

        if ($qbcore) {
            return $row['citizenid'];
        }
    }

    public function getTotalCash($pdo)
    {
        require('config.php');
        global $row;
  
        if ($simplemoney) {
            return $row['money'];
        } 
        if ($moneyjson) {
            return $moneyjson->{'cash'};
        }
        if ($moneyjson2) {
            return $moneyjson2->{'money'};
        }
    }

    public function getTotalBank($pdo)
    {
        require('config.php');
        global $row;
  
        if ($simplemoney) {
            return $row['bank'];
        } 
        if ($moneyjson) {
            return $moneyjson->{'bank'};
        }
        if ($moneyjson2) {
            return $moneyjson2->{'bank'};
        }
    }

    public function getTotalMoney($pdo)
    {
        require('config.php');
        global $row;
  
        if ($simplemoney) {
            return $row['money'] + $row['bank'];
        } 
        if ($moneyjson) {
            return $moneyjson->{'bank'} + $moneyjson->{'cash'};
        }
        if ($moneyjson2) {
            return $moneyjson->{'bank'} + $moneyjson->{'money'};
        }
    }

    public function getBirthday($pdo)
    {
        require('config.php');
        global $row;
  
        if ($esx_legacy) {
            $birth =  $row['dateofbirth'];

            if ($birth == "") {
                return "Unknown";
            } else {
                return $birth;
            }
        }

        if ($esx_v1final) {
            $birth = $row['dateofbirth'];

            if ($birth == "") {
                return "Unknown";
            } else {
                return $birth;
            }
        }

        if ($esx_v1) {
            $birth = $row['dateofbirth'];

            if ($birth == "") {
                return "Unknown";
            } else {
                return $birth;
            }
        }

        if ($qbcore) {
            global $charjson;
            $birth = $charjson->{'birthdate'};

            if ($birth == "") {
                return "Unknown";
            } else {
                return $birth;
            }
        }
    }

    public function getSex($pdo)
    {
        require('config.php');
        global $row;
  
        if ($esx_legacy) {
            if ($row['sex'] == "m") {
                return "Male";
            } else {
                return "Female";
            }
        }

        if ($esx_v1final) {
            if ($row['sex'] == "m") {
                return "Male";
            } else {
                return "Female";
            }
        }

        if ($esx_v1) {
            if ($row['sex'] == "m") {
                return "Male";
            } else {
                return "Female";
            }
        }

        if ($qbcore) {
            global $charjson;
            if ($charjson->{'gender'} == "0") {
                return "Male";
            } else {
                return "Female";
            }
        }
    }

    public function getPureSex($pdo)
    {
        require('config.php');
        global $row;
  
        if ($esx_legacy) {
           return $row['sex'];
        }

        if ($esx_v1final) {
            return $row['sex'];
        }

        if ($esx_v1) {
            return $row['sex'];
        }

        if ($qbcore) {
            global $charjson;
            return $charjson->{'gender'};
        }
    }

    public function getHeight($pdo)
    {
        require('config.php');
        global $row;
  
        if ($esx_legacy) {
            $height = $row['height'];

            if ($height == "") {
                return "Unknown";
            } else {
                return $height;
            }
        }

        if ($esx_v1final) {
            $height = $row['height'];

            if ($height == "") {
                return "Unknown";
            } else {
                return $height;
            }
        }

        if ($esx_v1) {
            $height = $row['height'];

            if ($height == "") {
                return "Unknown";
            } else {
                return $height;
            }
        }
    }

    public function getPhoneNumber($pdo)
    {
        require('config.php');
        global $row;
  
        if ($esx_legacy) {
            $phone = $row['phone_number'];

            if ($phone == "") {
                return "Unknown";
            } else {
                return $phone;
            }
        }
    
        if ($esx_v1final) {
            $phone = $row['phone_number'];

            if ($phone == "") {
                return "Unknown";
            } else {
                return $phone;
            }
        }

        if ($esx_v1) {
            $phone = $row['phone_number'];

            if ($phone == "") {
                return "Unknown";
            } else {
                return $phone;
            }
        }

        if ($qbcore) {
            global $charjson;
            $phone = $charjson->{'phone'};

            if ($phone == "") {
                return "Unknown";
            } else {
                return $phone;
            }
        }
    }


    public function getSteamId($pdo)
    {
        require('config.php');
        global $row;
  
        if ($esx_legacy) {
            return $row['identifier'];
        }
    
        if ($esx_v1final) {
            return $row['identifier'];
        }

        if ($esx_v1) {
            return $row['identifier'];
        }

        if ($qbcore) {
            return $row['citizenid'];
        }
    }

    public function getPet($pdo)
    {
        require('config.php');
        global $row;

        if ($petwidget) {
            if ($esx_legacy) {
                $pet = $row['pet'];

                if ($pet == "") {
                    return "Unknown";
                } else {
                    return $pet;
                }
            }
        }

        if ($petwidget) {
            if ($esx_v1final) {
                $pet = $row['pet'];

                if ($pet == "") {
                    return "Unknown";
                } else {
                    return $pet;
                }
            }
        }

        if ($petwidget) {
            if ($qbcore) {
                return "Unknown";
            }
        }
    }

    public function getBattlePass($pdo)
    {
        require('config.php');
        global $row;

        if ($battlepass) {
            if ($esx_legacy) {
                $xp = $row['xp'];

                if ($xp == "") {
                    return "Unknown";
                } else {
                    return $xp;
                }
            }

            if ($esx_v1final) {
                $xp = $row['xp'];

                if ($xp == "") {
                    return "Unknown";
                } else {
                    return $xp;
                }
            }

            if ($esx_v1) {
                $xp = $row['xp'];

                if ($xp == "") {
                    return "Unknown";
                } else {
                    return $xp;
                }
            }

            if ($qbcore) {
                return "Unknown";
            }
        }
    }

    public function getGroup($pdo)
    {
        require('config.php');
        global $row;

        if ($esx_legacy) {
            return $row['group'];
        }

        if ($esx_v1final) {
            return $row['group'];
        }

        if ($esx_v1) {
            return $row['group'];
        }

        if ($qbcore) {
            $Perms = $pdo -> prepare("SELECT * FROM permissions WHERE license = :license");
            $Perms -> execute(array(':license' => $row['license']));
            $permrow = $Perms -> fetch();
            if($permrow['permission'] = " "){
                return "Unknown";
            } else {
                return $permrow['permission'];
            }
        }
    }

    public function getJob($pdo)
    {
        require('config.php');
        global $row;

        if ($esx_legacy) {
            $SQL = $pdo -> prepare("SELECT * FROM `jobs` WHERE `name` = :job");
            $SQL -> execute(array(':job' => $row['job']));
            $row = $SQL -> fetch();
            return $row['label'];
        }

        if ($esx_v1final) {
            $SQL = $pdo -> prepare("SELECT * FROM `jobs` WHERE `name` = :job");
            $SQL -> execute(array(':job' => $row['job']));
            $row = $SQL -> fetch();
            return $row['label'];
        }

        if ($esx_v1) {
            $SQL = $pdo -> prepare("SELECT * FROM `jobs` WHERE `name` = :job");
            $SQL -> execute(array(':job' => $row['job']));
            $row = $SQL -> fetch();
            return $row['label'];
        }

        if ($qbcore) {
            return $jobjson->{'label'};
        }
    }

    public function getJobgrade($pdo)
    {
        require('config.php');
        global $row;

        if ($esx_legacy) {
            $SQL = $pdo -> prepare("SELECT * FROM `job_grades` WHERE `job_name` = :job AND `grade` = :grade");
            $SQL -> execute(array(':job' => $row['job'], ':grade' => $row['job_grade']));
            $row = $SQL -> fetch();
            return $row['label'];
        }

        if ($esx_v1final) {
            $SQL = $pdo -> prepare("SELECT * FROM `job_grades` WHERE `job_name` = :job AND `grade` = :grade");
            $SQL -> execute(array(':job' => $row['job'], ':grade' => $row['job_grade']));
            $row = $SQL -> fetch();
            return $row['label'];
        }

        if ($esx_v1) {
            $SQL = $pdo -> prepare("SELECT * FROM `job_grades` WHERE `job_name` = :job AND `grade` = :grade");
            $SQL -> execute(array(':job' => $row['job'], ':grade' => $row['job_grade']));
            $row = $SQL -> fetch();
            return $row['label'];
        }

        if ($qbcore) {
            return $jobjson->{'grade'}->{'name'};
        }
    }

    public function getAdminPhoto($pdo)
    {
        require('config.php');
        global $row;

        if ($esx_legacy) {
            return $row["profile_image"];
        }

        if ($esx_v1final) {
            return $row["profile_image"];
        }

        if ($esx_v1) {
            return $row["profile_image"];
        }

        if ($qbcore) {
            return $row["profile_image"];
        }
    }

  
    public function getPhoto($pdo)
    {
        require('php/adminid.php');
        global $row;
        if ($esx_legacy) {
            return $row['profile_image'];
        }

        if ($esx_v1final) {
            return $row['profile_image'];
        }

        if ($esx_v1) {
            return $row['profile_image'];
        }

        if ($qbcore) {
            return $row['profile_image'];
        }
    }

    public function getCharInfo($pdo)
    {
        require('config.php');
        global $row;
  
        if ($qbcore) {
            return $row["charinfo"];
        }
    }

    public function getMoneyInfo($pdo)
    {
        require('config.php');
        global $row;
  
        if ($qbcore) {
            return $row["money"];
        }
    }
}


class AdminActions
{
    public function doCk($pdo)
    {
        require('config.php');
        global $row;
    
        if ($esx_legacy) {
            $ide = $row['identifier'];
            $CK = "DELETE FROM users WHERE identifier = '$ide';
        DELETE FROM user_inventory WHERE identifier ='$ide';
        DELETE FROM owned_vehicles WHERE identifier = '$ide';
        DELETE FROM billing WHERE identifier = '$ide';
        ";
            $SQL = $pdo -> prepare($CK);
            $SQL -> execute();
        }

        if ($esx_v1final) {
            $ide = $row['identifier'];
            $CK = "DELETE FROM users WHERE identifier = '$ide';
        DELETE FROM user_inventory WHERE identifier ='$ide';
        DELETE FROM owned_vehicles WHERE identifier = '$ide';
        DELETE FROM billing WHERE identifier = '$ide';
        ";
            $SQL = $pdo -> prepare($CK);
            $SQL -> execute();
        }

        if ($esx_v1) {
            $ide = $row['identifier'];
            $CK = "DELETE FROM users WHERE identifier = '$ide';
        DELETE FROM user_inventory WHERE identifier ='$ide';
        DELETE FROM owned_vehicles WHERE identifier = '$ide';
        DELETE FROM billing WHERE identifier = '$ide';
        ";
            $SQL = $pdo -> prepare($CK);
            $SQL -> execute();
        }
    
        if ($qbcore) {
            $citizen = $row['citizenid'];
            $CK = "DELETE FROM players WHERE citizenid = '$citizen';
      DELETE FROM player_vehicles WHERE citizenid ='$citizen';
      DELETE FROM player_houses WHERE citizenid = '$citizen';
      ";
            $SQL = $pdo -> prepare($CK);
            $SQL -> execute();
        }
    }


    public function doTp($pdo)
    {
        require('config.php');
        global $row;
     
        if ($esx_legacy) {
            $ide = $row['identifier'];
            $SQL = $pdo -> prepare("UPDATE users SET position = '$teleport' WHERE `identifier` = '$ide'");
            $SQL -> execute();
        }

        if ($esx_v1final) {
            $ide = $row['identifier'];
            $SQL = $pdo -> prepare("UPDATE users SET position = '$teleport' WHERE `identifier` = '$ide'");
            $SQL -> execute();
        }

        if ($esx_v1) {
            $ide = $row['identifier'];
            $SQL = $pdo -> prepare("UPDATE users SET position = '$teleport' WHERE `identifier` = '$ide'");
            $SQL -> execute();
        }

        if ($qbcore) {
            $citizen = $row['citizenid'];
            $SQL = $pdo -> prepare("UPDATE players SET position = '$teleport' WHERE `citizenid` = '$citizen'");
            $SQL -> execute();
        }
    }
}



?>