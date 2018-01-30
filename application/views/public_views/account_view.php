<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#ohistory" data-toggle="tab">Order History</a></li>
    <li><a href="#profile" data-toggle="tab">Account Details</a></li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div class="tab-pane fade active in" id="ohistory">
    <p></p>
      <div class="container">
        <div class="list-group">
          <a href="#" class="list-group-item active">
            Your Order History
          </a>
          <p>
          <!-- datatables for customer order -->
          <div class="table-responsive">
            <table id="tableView" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <td>Order Number</td>
                  <td>Date</td>
                  <td>Total Amount</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php foreach($orders as $ord): ?>
                  <td><a href="<?= base_url() . 'invoice/view/' . $ord->serialnum; ?>" target="_blank" data-toggle="tooltip" data-placement="right" title="View Invoice">ORD - <?= $ord->serialnum; ?></a></td>
                  <td><?= date("F d, Y", strtotime($ord->date)); ?></td>
                  <td> ₱ <?= $ord->total_amount; ?></td>
                  <td><?= $ord->status; ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- end -->
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="profile">
    <p></p>
      <div class="container">
        <div class="row">
            <div class="panel panel-primary">
              <div class="panel-heading">
                My Profile
              </div>
              <div align="center"><p class="text-muted">To update your profile, click on any field and hit <strong>SAVE</strong> button.</p></div>
              <div class="panel-body">
              <div id="the-message"></div>

              <?php echo form_open("customers/save", array("id" => "form-user", "class" => "form-horizontal")) ?>
              <?php foreach($accountdetails as $account): ?>
                <h3 class="text-primary">Personal Details</h3>
                <hr>
                <div class="form-group">
                  <label for="firstname" class="col-md-3 col-sm-4 control-label">First Name</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $account->c_first_name; ?>" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="lastname" class="col-md-3 col-sm-4 control-label">Last Name</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $account->c_last_name; ?>" readonly="true">              
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobilenum" class="col-md-3 col-sm-4 control-label">Mobile Number</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="text" name="mobilenum" id="mobilenum" class="form-control" placeholder="+63 xxxx-xxx-xxxx" value="<?= $account->c_mobile_num; ?>" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="landlinenum" class="col-md-3 col-sm-4 control-label">Landline Number</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="text" name="landlinenum" id="landlinenum" class="form-control" placeholder="+02 xxx-xx-xx" value="<?= $account->c_landline_num; ?>" readonly="true">
                  </div>
                </div>
                <h3 class="text-primary">Billing Address</h3>
                <hr>
                <div class="form-group">
                  <label for="address1" class="col-md-3 col-sm-4 control-label">Address 1</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="text" name="address1" id="address1" class="form-control" value="<?= $account->c_address1; ?>" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address2" class="col-md-3 col-sm-4 control-label">Address 2</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="text" name="address2" id="address2" class="form-control" value="<?= $account->c_address2; ?>" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="city" class="col-md-3 col-sm-4 control-label">City</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="text" name="city" id="city" class="form-control" value="<?= $account->c_city; ?>" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="postalcode" class="col-md-3 col-sm-4 control-label">Postal Code</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="text" name="postalcode" id="postalcode" class="form-control" placeholder="xxxx" value="<?= $account->c_postal_code; ?>" readonly="true">
                  </div>
                </div>
                <h3 class="text-primary">Login Details</h3>
                <hr>
                <div class="form-group">
                  <label for="emailaddress" class="col-md-3 col-sm-4 control-label">Email Address</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="text" name="emailaddress" id="emailaddress" class="form-control" placeholder="xxxxxxxx@site.com" value="<?= $account->c_email_address; ?>" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="c_username" class="col-md-3 col-sm-4 control-label">Username</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="text" name="c_username" id="c_username" class="form-control" value="<?= $account->c_username; ?>" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="c_password" class="col-md-3 col-sm-4 control-label">Password</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="password" name="c_password" id="c_password" class="form-control" placeholder="xxxxxxxx" value="<?= $account->c_password; ?>" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="cpassword" class="col-md-3 col-sm-4 control-label">Confirm Password</label>
                  <div class="col-md-9 col-sm-8">
                    <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="xxxxxxxx" readonly="true">
                  </div>
                </div>          
                <div class="form-group">
                  <div class="col-md-offset-3 col-md-3 col-sm-offset-4 col-sm-4">
                    <button type="submit" class="btn btn-lg btn-primary pull-right" id="regiBtn"><i class="fa fa-user-plus" aria-hidden="true"></i> SAVE</button>
                  </div>
                </div>
              <?php endforeach; ?>
              </form>
              </div>
              </div>
        </div>
      </div>      
    </div>
  </div>
</div>

<script type="text/javascript">
  $('.form-control').click(function(){
    $('.form-control').prop('readonly', false);
  });
</script>