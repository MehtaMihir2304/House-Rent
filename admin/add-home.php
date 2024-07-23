<?php include('include/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Home</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="country">Country:</label>
                                <select class="form-control" name="country" required="required">
                                        <option value="">--Select Country--</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Nepal">Gujrat</option>
                                </select>                        
                            </div>                        
                            <div class="col-md-6">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" id="city" placeholder="Enter City" required name="city">
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
                                <label for="total_rooms">Total No. of Rooms:</label>
                                <input type="number" class="form-control" id="total_rooms" placeholder="Enter Total No. of Rooms" required name="total_rooms">
                            </div>
                                           
                            <table class="table" id="dynamic_field">  
                                <tr> 
                                    <div class="col-md-6"> 
                                        <label><b>Photos:</b></label>                    
                                        <td><input type="file" name="image" placeholder="Photos" class="form-control name_list" required accept="image/*" /></td> 
                                        <td><button type="button" id="add" name="add" class="btn btn-success col-lg-12">Add More</button></td>  
                                    </div>
                                </tr>  
                            </table>
                            <input name="lat" type="text" id="lat" hidden>
                            <input name="lng" type="text" id="lng" hidden>
                            <div class="col-md-6">
                                <label for="living_room">No. of Living Room:</label>
                                <input type="number" class="form-control" id="living_room" placeholder="Enter No. of Living Room" required name="living_room">
                            </div>
                            <div class="col-md-6">
                                <label for="available_rooms">Available No. of Rooms:</label>
                                <input type="number" class="form-control" id="available_rooms" placeholder="Enter Total No. of Rooms" required name="total_rooms">
                            </div><br><br><br><br>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-lg-12" name="add_home_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>







<?php include('include/footer.php');?>
