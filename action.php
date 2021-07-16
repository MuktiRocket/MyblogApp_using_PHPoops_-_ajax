<?php
include_once("function.php");
include_once("session.php");
require_once("db.php");
require_once("util.php");
require_once("user.php");
$reg = new user;
$db = new Database;
$util = new util;

//handle register new user ajax request

if (isset($_POST['register'])) {


    $username = $util->testInput($_POST['username']);
    $email = $util->testInput($_POST['email']);
    $password = $util->testInput($_POST['password']);
    if ($reg->insertUser($username, $email, $password)) {
        echo $util->showMessage('success', 'User updated successfully!!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}



if (isset($_POST['login'])) {


    $username = $util->testInput($_POST['username']);
    $password = $util->testInput($_POST['password']);
    if ($reg->loginUser($username, $password)) {
        echo $util->showMessage('success', 'User updated successfully!!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}



//handle add new user ajax request
if (isset($_POST['add'])) {
    $blogsubject = $util->testInput($_POST['blogsubject']);
    $blogcontent = $util->testInput($_POST['blogcontent']);
    $image = $_FILES["image"];
    if (!is_dir('xyz')) {
        mkdir('xyz');
    }
    if ($image && $image['tmp_name']) {
        $imagepath = "xyz/" . randomstring(5) .  $image['name'];
        move_uploaded_file($image['tmp_name'], $imagepath);
    }



    if ($db->insert($blogsubject, $blogcontent, $imagepath, $_SESSION['id'])) {
        echo $util->showMessage('success', 'User updated successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}


//handle fetch all user ajax request



if (isset($_GET['read'])) {
    $users = $db->read();
    $output = '';
    if (isset($_SESSION)) {
        if ($users) {
            $username = $db->userDetails($_SESSION['id']);
            foreach ($users as $row) {

                if ($row['username'] == $username) {
                    $output .= '<tr>
                                    <td>' . $row['id'] . '</td>
                                    <td> <img src="' . $row['image'] . '" class="image"></td>
                                    <td>' . $row['username'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['blogsubject'] . '</td>
                                    <td>' . $row['blogcontent'] . '</td>
                                    <td>' . $row['created_at'] . '</td>
                                    <td>
                                    <a href="#" id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editblogModal">Edit</a>
                                    <a href="#" id="' . $row['id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                                    </td>
                                 </tr>';
                } else {
                    $output .= '<tr>
                                    <td>' . $row['id'] . '</td>
                                    <td> <img src="' . $row['image'] . '" class="image"></td>
                                    <td>' . $row['username'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['blogsubject'] . '</td>
                                    <td>' . $row['blogcontent'] . '</td>
                                    <td>' . $row['created_at'] . '</td>
                                    <td> <button id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editblogModal" disabled>Edit</button>
                                    <button id="' . $row['id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink" disabled>Delete</button>
                                    <td>
                                </tr>';
                }
            }
            echo $output;
        } else {
            echo '<tr>
                <td colspan="6">No Users Found in the Database!</td>
              </tr>';
        }
    }
}


// handling edit user ajax request

if (isset($_GET['edit'])) {
    $id = $_GET['id'];
    $users = $db->readOne($id);
    echo json_encode($users);
}

//handle update user ajax request

if (isset($_POST['update'])) {
    $id = $util->testInput($_POST['id']);
    $blogsubject = $util->testInput($_POST['blogsubject']);
    $blogcontent = $util->testInput($_POST['blogcontent']);
    $image = $_FILES["image"];
    if ($image) {
        if (!is_dir('xyz')) {
            mkdir('xyz');
        }
        if ($image && $image['tmp_name']) {
            $imagepath = "xyz/" . randomstring(5) .  $image['name'];
            move_uploaded_file($image['tmp_name'], $imagepath);
            if ($db->updateWithImage($id, $blogsubject, $blogcontent, $imagepath)) {
                echo $util->showMessage('success', 'User updated successfully!');
            } else {
                echo $util->showMessage('danger', 'Something went wrong!');
            }
        }
    }

    if ($db->update($id, $blogsubject, $blogcontent)) {
        echo $util->showMessage('success', 'User updated successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}

//handle delete user ajax request

if (isset($_GET['delete'])) {
    $id = $_GET['id'];

    if ($db->delete($id)) {
        echo $util->showMessage('success', 'User deleted successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}
