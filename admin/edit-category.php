<?php include('include/header.php');
include('../functions/myfunctions.php');
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $category=getByID("categories", $id);

                    if(mysqli_num_rows($category) > 0)
                    {
                        $data = mysqli_fetch_array($category);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Rooms</h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="category_id"  value="<?= $data['id'] ?>">
                                                <label for="country">Country:</label>
                                                <select class="form-control" name="country" value="<?= $data['country'] ?>" required="required">
                                                        <option value="">--Select Country--</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Nepal">Gujrat</option>
                                                </select>                        
                                            </div>
                                            <div class="col-md-6">
                                                <label for="province">Province/State:</label>
                                                <select class="form-control" name="province" value="<?= $data['province'] ?>" required="required">
                                                        <option value="">--Select Province/State--</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Nepal">Gujrat</option>
                                                </select>                        
                                            </div>
                                            <div class="col-md-6">
                                                <label for="zone">Zone:</label>
                                                <select class="form-control" name="zone" value="<?= $data['zone'] ?>" required="required">
                                                        <option value="">--Select Zone--</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Nepal">Gujrat</option>
                                                </select>                        
                                            </div>
                                            <div class="col-md-6">
                                            <label for="district">District:</label>
                                                <select class="form-control" name="district" value="<?= $data['district'] ?>" required="required">
                                                    %{--Mechi--}%
                                                    <option value="">--Select District--</option>
                                                    <option value="Taplejung">Taplejung</option>
                                                    <option value="Panchthar">Panchthar</option>
                                                    <option value="Ilam">Ilam</option>
                                                    <option value="Jhapa">Jhapa</option>
                                                    %{--Koshi--}%
                                                    <option value="Morang">Morang</option>
                                                    <option value="Sunsari">Sunsari</option>
                                                    <option value="Dhankutta">Dhankutta</option>
                                                    <option value="Sankhuwasabha">Sankhuwasabha</option>
                                                    <option value="Bhojpur">Bhojpur</option>
                                                    <option value="Terhathum">Terhathum</option>
                                                    %{--Sagarmatha--}%
                                                    <option value="Okhaldunga">Okhaldunga</option>
                                                    <option value="Khotang">Khotang</option>
                                                    <option value="Solukhumbu">Solukhumbu</option>
                                                    <option value="Udaypur">Udaypur</option>
                                                    <option value="Saptari">Saptari</option>
                                                    <option value="Siraha">Siraha</option>
                                                    %{--Janakpur--}%
                                                    <option value="Dhanusa">Dhanusa</option>
                                                    <option value="Mahottari">Mahottari</option>
                                                    <option value="Sarlahi">Sarlahi</option>
                                                    <option value="Sindhuli">Sindhuli</option>
                                                    <option value="Ramechhap">Ramechhap</option>
                                                    <option value="Dolkha">Dolkha</option>
                                                    %{--Bagmati--}%
                                                    <option value="Sindhupalchauk">Sindhupalchauk</option>
                                                    <option value="Kavreplanchauk">Kavreplanchauk</option>
                                                    <option value="Lalitpur">Lalitpur</option>
                                                    <option value="Bhaktapur">Bhaktapur</option>
                                                    <option value="Kathmandu">Kathmandu</option>
                                                    <option value="Nuwakot">Nuwakot</option>
                                                    <option value="Rasuwa">Rasuwa</option>
                                                    <option value="Dhading">Dhading</option>
                                                    %{--Narayani--}%
                                                    <option value="Makwanpur">Makwanpur</option>
                                                    <option value="Rauthat">Rauthat</option>
                                                    <option value="Bara">Bara</option>
                                                    <option value="Parsa">Parsa</option>
                                                    <option value="Chitwan">Chitwan</option>
                                                </select>                        
                                            </div>
                                            <div class="col-md-6">
                                                <label for="city">City:</label>
                                                <input type="text" class="form-control" id="city" value="<?= $data['city'] ?>" placeholder="Enter City" name="city">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="contact_no">Contact No.:</label>
                                                <input type="text" class="form-control" id="contact_no" value="<?= $data['contact_no'] ?>" placeholder="Enter Contact No." name="contact_no">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="property_type">Property Type:</label>
                                                <select class="form-control" name="property_type">
                                                    <option value="">--Select Property Type--</option>
                                                    <option value="Full House Rent">Full House Rent</option>
                                                    <option value="Flat Rent">Flat Rent</option>
                                                    <option value="Room Rent">Room Rent</option>
                                                </select>                        
                                            </div>
                                            <div class="col-md-6">
                                                <label for="estimated_price">Estimated Price:</label>
                                                <input type="estimated_price" class="form-control" id="estimated_price" value="<?= $data['estimated_price'] ?>" placeholder="Enter Estimated Price" name="estimated_price">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="total_rooms">Total No. of Rooms:</label>
                                                <input type="number" class="form-control" id="total_rooms" value="<?= $data['total_rooms'] ?>" placeholder="Enter Total No. of Rooms" name="total_rooms">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="available_rooms">Available No. of Rooms:</label>
                                                <input type="number" class="form-control" id="available_rooms" value="<?= $data['available_rooms'] ?>" placeholder="Enter Total No. of Rooms" name="total_rooms">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="bedroom">No. of Bedroom:</label>
                                                <input type="number" class="form-control" id="bedroom" value="<?= $data['bedroom'] ?>" placeholder="Enter No. of Bedroom" name="bedroom">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="living_room">No. of Living Room:</label>
                                                <input type="number" class="form-control" id="living_room" value="<?= $data['living_room'] ?>" placeholder="Enter No. of Living Room" name="living_room">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="kitchen">No. of Kitchen:</label>
                                                <input type="number" class="form-control" id="kitchen" value="<?= $data['kitchen'] ?>" placeholder="Enter No. of Kitchen" name="kitchen">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="bathroom">No. of Bathroom/Washroom:</label>
                                                <input type="number" class="form-control" id="bathroom"value="<?= $data['bathroom'] ?>" placeholder="Enter No. of Bathroom/Washroom" name="bathroom">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="description">Full Description:</label>
                                                <textarea type="comment" class="form-control" id="description" value="<?= $data['description'] ?>" placeholder="Enter Property Description" name="description"></textarea>
                                            </div>
                                            <table class="table" id="dynamic_field">  
                                                <tr> 
                                                    <div class="col-md-6"> 
                                                        <label><b>Photos:</b></label>                    
                                                        <td><input type="file" name="image"  placeholder="Photos" class="form-control name_list" required accept="image/*" /></td>
                                                        <input type="hidden" name="old_image" value="<?= $data['image']; ?>"> 
                                                        <img src="../uploads/<?= $data['image']; ?>" width="50px" height="50px">
                                                        <td><button type="button" id="add" name="add" class="btn btn-success col-lg-12">Add More</button></td>  
                                                    </div>
                                                </tr>  
                                            </table>
                                            <input name="lat" type="text" id="lat" hidden>
                                            <input name="lng" type="text" id="lng" hidden>
                                            <hr>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary col-lg-12" name="update_category_btn">Updated</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                    else
                    {
                        echo "Category not found";
                    }
                }
                else
                {
                    echo "Id missing form url";
                }
                
                ?>
        </div>
    </div>
</div>







<?php include('include/footer.php');?>
