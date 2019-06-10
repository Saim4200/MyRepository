<?php

include'../database/tutordb.php';
if ($dbsuccess)
{
    
    if(isset($_POST['field']) && isset($_POST['value'])){
        
        $field=mysqli_real_escape_string($dbConnected,$_POST['field']);
        $value=mysqli_real_escape_string($dbConnected,$_POST['value']);
        
        switch($field){
            case 'addr':
                $query = "UPDATE teacherinfopersonal SET address ='".$value."' WHERE id='".$_SESSION['id']."'";
                $result = $value;
                break;
            case 'area':
                $query = "UPDATE teacherinfopersonal SET area ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"select areaname from area where id='".$value."'"));
                $result = $fetch['areaname'];
                break;
            case 'pnum':
                $query = "UPDATE teacherinfopersonal SET pnum ='".$value."' WHERE id='".$_SESSION['id']."'";
                $result = $value;
                break;
            case 'wnum':
                $query = "UPDATE teacherinfopersonal SET wnum ='".$value."' WHERE id='".$_SESSION['id']."'";
                $result = $value;
                break;
            case 'gen':
                $query = "UPDATE teacherinfopersonal SET gender ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"select gender from gender where gid='".$value."'"));
                $result = $fetch['gender'];
                break;
            case 'inst':
                $query = "UPDATE teacherinfoprofessional SET institute ='".$value."' WHERE ID='".$_SESSION['id']."'";
                $result = $value;
                break;
            case 'qualif':
                $query = "UPDATE teacherinfoprofessional SET qualification ='".$value."' WHERE ID='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"select * from qualification where qid='".$value."'"));
                $result = $fetch['qualificationname'];
                break;
            case 'spec':
                $query = "UPDATE teacherinfoprofessional SET majorsub ='".$value."' WHERE ID='".$_SESSION['id']."'";
                $result = $value;
                break;
            case 'inter':
                $query = "UPDATE teacherinfoprofessional SET intersub ='".$value."' WHERE ID='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"select * from intergroup where intid='".$value."'"));
                $result = $fetch['intergroupname'];
                break;
            case 'loc':
                $query = "UPDATE teacherinfoprofessional SET location ='".$value."' WHERE ID='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT locationname from locatoin where lid='".$value."'"));
                $result = $fetch['locationname'];
                break;
            case 'sub1':
                $query = "UPDATE teachersubjects SET sub1 ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT subjectname from subjects where sid='".$value."'"));
                $result = $fetch['subjectname'];
                break;
            case 'sub2':
                $query = "UPDATE teachersubjects SET sub2 ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT subjectname from subjects where sid='".$value."'"));
                $result = $fetch['subjectname'];
                break;
            case 'sub3':
                $query = "UPDATE teachersubjects SET sub3 ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT subjectname from subjects where sid='".$value."'"));
                $result = $fetch['subjectname'];
                break;
            case 'sub4':
                $query = "UPDATE teachersubjects SET sub4 ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT subjectname from subjects where sid='".$value."'"));
                $result = $fetch['subjectname'];
                break;
            case 'va1':
                $query = "UPDATE teacherareas SET varea1 ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT areaname from area where id='".$value."'"));
                $result = $fetch['areaname'];
                break;
            case 'va2':
                $query = "UPDATE teacherareas SET varea2 ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT areaname from area where id='".$value."'"));
                $result = $fetch['areaname'];
                break;
            case 'va3':
                $query = "UPDATE teacherareas SET varea3 ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT areaname from area where id='".$value."'"));
                $result = $fetch['areaname'];
                break;
            case 'va4':
                $query = "UPDATE teacherareas SET varea4 ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT areaname from area where id='".$value."'"));
                $result = $fetch['areaname'];
                break;
            case 'va5':
                $query = "UPDATE teacherareas SET varea5 ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT areaname from area where id='".$value."'"));
                $result = $fetch['areaname'];
                break;
            case 'va6':
                $query = "UPDATE teacherareas SET varea6 ='".$value."' WHERE id='".$_SESSION['id']."'";
                $fetch=mysqli_fetch_array(mysqli_query($dbConnected,"SELECT areaname from area where id='".$value."'"));
                $result = $fetch['areaname'];
                break;
            case 'pass':
                $old = mysqli_real_escape_string($dbConnected,$_POST['oldpass']);
                $confirm = mysqli_real_escape_string($dbConnected,$_POST['cpass']);
                if($value==$confirm){
                    $fetchpass=mysqli_query($dbConnected,"select pass from data where id='".$_SESSION['id']."'");
                    $row=mysqli_fetch_array($fetchpass);
                    if(password_verify($old, $row['pass'])){
                        $pass=password_hash($value, PASSWORD_DEFAULT);
                        $query = "UPDATE data SET pass ='".$pass."' WHERE id='".$_SESSION['id']."'";
                        $result = 'Password updated successfully!';
                    } else {
                        $result = 'Incorrect Old Password';
                        echo $result;
                        exit();
                    }
                } else {
                        $result = 'Passwords do not match';
                        echo $result;
                        exit();
                }
                break;

        }
        
        $update_value = mysqli_query($dbConnected, $query);
        
        if ($update_value){
                echo $result;
        }
        else{
             echo 'ERROR_1';
        }
    }
    else{
         echo 'ERROR_1';
    }

}
else{
     echo 'ERROR_1';
}

