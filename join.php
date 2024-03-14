<?php
include("header.php");
include("admin/db_connect.php");

if (isset($_POST['submit'])) {
    $businessName = $_POST['b_name'];
    $yourName = $_POST['name'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $gst_no = $_POST['gst_no'];
    $address = $_POST['address'];
    $mob = $_POST['mob'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $reference = $_POST['reference'];

    // Perform any necessary validation here

	$sql = "INSERT INTO sign_up (b_name, name, country, state, city, pincode, gst_no, address, wh_no, new_pass, email, reference) 
	VALUES ('$businessName', '$yourName', '$country', '$state', '$city', '$pincode', '$gst_no', '$address', '$mob', '$password', '$email', '$reference')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Form submitted'); window.open('popup.html', '_blank');</script>";
} else {
    echo "<script>alert('Form not submitted. Error: " . mysqli_error($conn) . "');</script>";
}
}
?>

<style>
    
    .join_form {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .note {
        font-size: 12px;
        color: #666;
    }

    /* Responsive styles */
    @media (max-width: 600px) {
        .container {
            padding: 10px;
        }
    }
</style>


<div class="content-wrap">
	<div class="container clearfix">
	<div class="fancy-title title-center title-border">
			<h3 class="center">Apply for "Arrow Print Club" membership account
			</h3>
		</div>
		<table class="table table-bordered" style="max-width: 800px; margin: 0px auto">
			<tr>
				<td colspan="2" style="color: #51b9d1;">Arrow Print Club is a B2B company where we serve only printers (not direct customers), your membership request will be approved within 1 working day only after our internal verification of information provided by you in this form</td>
			</tr>
		</table>
    <!-- <p>Arrow Print Club is a B2B company where we serve only printers. Your membership request will be approved within 1 working day only after our internal verification of information provided by you in this form.</p> -->
   <div class="join_form">
    <form id="myForm" method="POST" action="login.php">
        <label for="b_name">Your Business Name</label>
        <input type="text" name="b_name" id="b_name" class="form-control" required>

        <label for="name">Your Name</label>
        <input type="text" name="name" id="name" class="form-control" required>

        <label for="country">Country</label>
        <select name="country" id="country" class="form-control" onchange="SetStateAndCityOptions(this.value)">
            <option value="-1">--Select Country--</option>
							<option value="Afghanistan">Afghanistan</option>
							<option value="Albania">Albania</option>
							<option value="Algeria">Algeria</option>
							<option value="Andorra">Andorra</option>
							<option value="Angola">Angola</option>
							<option value="Antigua and Barbuda">Antigua and Barbuda</option>
							<option value="Argentina">Argentina</option>
							<option value="Armenia">Armenia</option>
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Azerbaijan">Azerbaijan</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Bahrain">Bahrain</option>
							<option value="Bangladesh">Bangladesh</option>
							<option value="Barbados">Barbados</option>
							<option value="Belarus">Belarus</option>
							<option value="Belgium">Belgium</option>
							<option value="Belize">Belize</option>
							<option value="Benin">Benin</option>
							<option value="Bhutan">Bhutan</option>
							<option value="Bolivia">Bolivia</option>
							<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
							<option value="Botswana">Botswana</option>
							<option value="Brazil">Brazil</option>
							<option value="Brunei">Brunei</option>
							<option value="Bulgaria">Bulgaria</option>
							<option value="Burkina Faso">Burkina Faso</option>
							<option value="Burundi">Burundi</option>
							<option value="Cabo Verde">Cabo Verde</option>
							<option value="Cambodia">Cambodia</option>
							<option value="Cameroon">Cameroon</option>
							<option value="Canada">Canada</option>
							<option value="Central African Republic">Central African Republic</option>
							<option value="Chad">Chad</option>
							<option value="Chile">Chile</option>
							<option value="China">China</option>
							<option value="Colombia">Colombia</option>
							<option value="Comoros">Comoros</option>
							<option value="Congo">Congo</option>
							<option value="Costa Rica">Costa Rica</option>
							<option value="Croatia">Croatia</option>
							<option value="Cuba">Cuba</option>
							<option value="Cyprus">Cyprus</option>
							<option value="Czech Republic">Czech Republic</option>
							<option value="Denmark">Denmark</option>
							<option value="Djibouti">Djibouti</option>
							<option value="Dominica">Dominica</option>
							<option value="Dominican Republic">Dominican Republic</option>
							<option value="DR Congo">DR Congo</option>
							<option value="Ecuador">Ecuador</option>
							<option value="Egypt">Egypt</option>
							<option value="El Salvador">El Salvador</option>
							<option value="Equatorial Guinea">Equatorial Guinea</option>
							<option value="Eritrea">Eritrea</option>
							<option value="Estonia">Estonia</option>
							<option value="Ethiopia">Ethiopia</option>
							<option value="Fiji">Fiji</option>
							<option value="Finland">Finland</option>
							<option value="France">France</option>
							<option value="Gabon">Gabon</option>
							<option value="Gambia">Gambia</option>
							<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Greece">Greece</option>
<option value="Grenada">Grenada</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Holy See">Holy See</option>
<option value="Honduras">Honduras</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option selected="selected" value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montenegro">Montenegro</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="North Korea">North Korea</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Qatar">Qatar</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Kitts & Nevis">Saint Kitts & Nevis</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome & Principe">Sao Tome & Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Korea">South Korea</option>
<option value="South Sudan">South Sudan</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="St. Vincent & Grenadines">St. Vincent & Grenadines</option>
<option value="State of Palestine">State of Palestine</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="TFYR Macedonia">TFYR Macedonia</option>
<option value="Thailand">Thailand</option>
<option value="Timor-Leste">Timor-Leste</option>
<option value="Togo">Togo</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Tuvalu">Tuvalu</option>
<option value="U.K.">U.K.</option>
<option value="U.S.">U.S.</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Viet Nam">Viet Nam</option>
<option value="Yemen">Yemen</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>


        </select>

		<div id="stateCityContainer" style="display: block;">
            <label for="state">State</label>
            <select name="state" id="state" class="form-control">
			<option value="-1">--Select State--</option>
			<option value="ANDAMAN AND NICOBAR ISLANDS">ANDAMAN AND NICOBAR ISLANDS</option>
<option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
<option value="ASSAM">ASSAM</option>
<option value="BIHAR">BIHAR</option>
<option value="CHHATTISGARH">CHHATTISGARH</option>
<option value="CHANDIGARH">CHANDIGARH</option>
<option value="DAMAN AND DIU">DAMAN AND DIU</option>
<option value="DELHI">DELHI</option>
<option value="DADRA & NAGAR HAVELI">DADRA & NAGAR HAVELI</option>
<option value="GOA">GOA</option>
<option value="GUJARAT">GUJARAT</option>
<option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
<option value="HARYANA">HARYANA</option>
<option value="JAMMU & KASHMIR">JAMMU & KASHMIR</option>
<option value="JHARKHAND">JHARKHAND</option>
<option value="KERALA">KERALA</option>
<option value="KARNATAKA">KARNATAKA</option>
<option value="LAKSHADWEEP">LAKSHADWEEP</option>
<option value="MEGHALAYA">MEGHALAYA</option>
<option value="MAHARASHTRA">MAHARASHTRA</option>
<option value="MANIPUR">MANIPUR</option>
<option value="MADHYA PRADESH">MADHYA PRADESH</option>
<option value="MIZORAM">MIZORAM</option>
<option value="NAGALAND">NAGALAND</option>
<option value="ORISSA">ORISSA</option>
<option value="PUNJAB">PUNJAB</option>
<option value="Puducherry">Puducherry</option>
<option value="RAJASTHAN">RAJASTHAN</option>
<option value="SIKKIM">SIKKIM</option>
<option value="TAMIL NADU">TAMIL NADU</option>
<option value="TRIPURA">TRIPURA</option>
<option value="UTTARAKHAND">UTTARAKHAND</option>
<option value="UTTAR PRADESH">UTTAR PRADESH</option>
<option value="WEST BENGAL">WEST BENGAL</option>
<option value="Telengana">Telengana</option>
<option value="Andrapradesh(New)">Andrapradesh(New)</option>
			</select>
			<label for="city">City</label>
			<input type="text" name="city" id="city" class="form-control">
        </div>

        <label for="pincode">Pin Code</label>
        <input type="text" name="pincode" id="pincode" class="form-control">

        <label for="gst_no">GST Number (Optional)</label>
        <input type="text" name="gst_no" id="gst_no" class="form-control">

        <label for="address">Address <span class="note"></span></label>
        <textarea name="address" id="address" rows="3" class="form-control" required></textarea>

        <label for="mob">Mobile No (Used for login) <span class="note">(Do Not include Starting 0 or Country Code)</span></label>
        <input type="text" name="mob" id="mob" class="form-control" required>

        <label for="password">Create New Password</label>
        <input type="password" name="password" id="password" class="form-control" required>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" required>

        <label for="reference">Reference by (Optional)</label>
        <input type="text" name="reference" id="reference" class="form-control" placeholder="Reference Employee Code">

        <input type="checkbox" name="terms" id="terms">
        <label for="terms">I accept all the company terms and conditions. <a href="Terms_And_Conditions.php" target="_blank">Terms</a></label>

        <p>Note: You can optionally get a welcome kit only in Rs. 2000 + Transport / Courier Charges + GST. <a href="a_MembershipFees.php" target="_blank">Payment Details</a></p>

        <input type="submit" name="submit" value="APPLY" class="form-control btn btn-lg btn-success panelshadow"style="height: 50px">
    </form>
   </div>
</div>
	</div>

	<script>
    // JavaScript for dynamic state and city options
    function SetStateAndCityOptions(val) {
        var stateCityContainer = document.getElementById("stateCityContainer");
        if (val === "India") { // Change "2" to the value of India in your country select options
            stateCityContainer.style.display = "block";
        } else {
            stateCityContainer.style.display = "none";
        }
    }
</script>

<!-- #content end -->
<?php
include("footer.php");
?>
