<?php

session_start();
include("config/config.php");


if(isset($_POST['add_catgory_btn']))
{
    $country=$_POST['country'];
    $province=$_POST['province'];
    $zone=$_POST['zone'];
    $district=$_POST['district'];
    $city=$_POST['city'];
    $status = isset($_POST['status']) ? '1':'0';

    $contact_no=$_POST['contact_no'];
    $property_type=$_POST['property_type'];
    $estimated_price=$_POST['estimated_price'];
    $total_rooms=$_POST['total_rooms'];
    $available_rooms=isset($_POST['available_rooms']) ? '1':'0';
    $bedroom=$_POST['bedroom'];
    $living_room=$_POST['living_room'];
    $kitchen=$_POST['kitchen'];
    $bathroom=$_POST['bathroom'];
    $description=$_POST['description'];
    $living_room=$_POST['living_room'];

    $image=$_FILES['image']['name'];

    $path="../uploads";

    $image_ext = pathinfo($image,PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $cate_query ="INSERT INTO `categories`(`country`, `province`, `zone`, `district`, `city`,`status`, `contact_no`, `property_type`, 
    `estimated_price`, `total_rooms`, `available_rooms`, `bedroom`, `living_room`, `kitchen`, `bathroom`, `description`, `image`) 
    VALUES ('[$country]','[$province]','[$zone]','[$district]','[$city]','[$status]','[$contact_no]','[$property_type]','[$estimated_price]',
    '[$total_rooms]','[$available_rooms]','[$bedroom]','[$living_room]','[$kitchen]','[$bathroom]','[$description]',
    '[$filename]')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)

    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        header("Location: add-room.php");

    }

    else
    {
        header("Location: add-room.php");       

    }   
    

}

else if(isset($_POST['update_category_btn']))
{
    $category_id = $_POST['category_id'];
    $country=$_POST['country'];
    $province=$_POST['province'];
    $zone=$_POST['zone'];
    $district=$_POST['district'];
    $city=$_POST['city'];
    $status=$_POST['status'];
    
    $contact_no=$_POST['contact_no'];
    $property_type=$_POST['property_type'];
    $estimated_price=$_POST['estimated_price'];
    $total_rooms=$_POST['total_rooms'];
    $available_rooms=isset($_POST['available_rooms']) ? '1':'0';
    $bedroom=$_POST['bedroom'];
    $living_room=$_POST['living_room'];
    $kitchen=$_POST['kitchen'];
    $bathroom=$_POST['bathroom'];
    $description=$_POST['description'];
    $living_room=$_POST['living_room'];

    $image=$_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        $update_filename = $new_image;
    }
    else
    {
        $update_filename = $old_image;
    }

    $update_query = "UPDATE `categories` SET `country`='[$country]',`province`='[$province]',`zone`='[$zone]',`district`='[$district]',`city`='[$city]',`contact_no`='[$contact_no]',
    ,`status`='[$status]',`property_type`='[$property_type]',`estimated_price`='[$estimated_price]',`total_rooms`='[$total_rooms]',`available_rooms`='[$available_rooms]',`bedroom`='[$bedroom]',`living_room`='[$living_room]'
    ,`kitchen`='[$kitchen]',`bathroom`='[$bathroom]',`description`='[$description]',`image`='[$update_filename]' WHERE id='category_id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image); 
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        header("Location: edit-category.php?id=$category_id", "Category Updated Successfully");
    }
    else
    {
        redirect("Location: edit-category.php?id=$category_id", "Something Went wrong");
    }

}

else if(isset($_POST['delete_category_btn']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $category_query = "SELECT * FROM categories WHERE id='$category_id' ";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
    
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }
        header("Location: category.php");
    }
    else
    {
        header("Location: categoy.php");
    }
}

else if(isset($_POST['add_home_btn']))
{
    $country=$_POST['country'];
    $city=$_POST['city'];
    $property_type=$_POST['property_type'];
    $total_rooms=$_POST['total_rooms'];
    $living_room=$_POST['living_room'];
    $available_rooms=$_POST['available_rooms'];


    $image=$_FILES['image']['name'];

    $path="../uploads";

    $image_ext = pathinfo($p_photo,PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    if($name != "" && $slug != "" && $description != "")
    {

        $house_query = "INSERT INTO `house`(`country`, `city`, `property_type`, `total_rooms`, `image`, `living_room`, `available_room`)
        VALUES ('[$country]','[$city]','[$property_type]','[$total_rooms]','[$filename]','[$living_room]','[$available_rooms]')";

        $house_query_run = mysqli_query($con, $house_query);

        if($house_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            header("Location: add-home.php", "Product Added Successfully");
        }
        else
        {
            header("Location: add-home.php", "Something went wrong");
        }
    }
    else
    {
        header("Location: add-home.php", "All fields are mandat");
    }

}



?>