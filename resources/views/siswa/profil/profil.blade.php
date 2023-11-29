@extends('siswa.main')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Profil dan Data Siswa</h2>
<div class="card-body">
    <div class="tab-content">
      <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
        <div class="row">
          <div class="col-md-4 col-xxl-3" style="margin-bottom: 10px;">
            <div class="card border">
              <div class="card-header">
                <h5>Upload Profile</h5>
              </div>
              <div class="card-body text-center">
                <img src="https://berrydashboard.io/codeignitor/stage/default/public/assets/images/user/avatar-5.jpg"
                  alt="user-image" class="img-fluid rounded-circle wid-100">
                <small class="d-block my-3 text-muted">Upload/Change Your Profile Image</small>
                <button class="btn btn-primary">Upload</button>
              </div>
            </div>
          </div>
          <div class="col-md-8 col-xxl-9">
            <div class="card border">
              <div class="card-header">
                <h5>Edit Edit Data Siswa</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="form-label">Nama</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="form-label">Kelas</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="form-label">NISN</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="form-label">Alamat</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-6" style="margin-top: 15px;">
                    <button class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card bg-light-danger overflow-hidden">
              <div class="card-body border-start border-5 border-danger">
                <p class="mb-0 text-muted">Bill Due</p>
                <h2>$150.00</h2>
                <a href="#" class="link-danger f-w-600">Pay Now <i
                    class="ti ti-arrow-narrow-right f-20 align-bottom"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card bg-light-warning overflow-hidden">
              <div class="card-body border-start border-5 border-warning">
                <p class="mb-0 text-muted">Total Credits</p>
                <h2>1570 GB</h2>
                <a href="#" class="link-warning f-w-600">Full Report <i
                    class="ti ti-arrow-narrow-right f-20 align-bottom"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <div class="card bg-light-success overflow-hidden">
              <div class="card-body border-start border-5 border-success">
                <p class="mb-0 text-muted">Plan</p>
                <h2>Basic</h2>
                <a href="#" class="link-success f-w-600">Upgrade? <i
                    class="ti ti-arrow-narrow-right f-20 align-bottom"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="card border">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-6">
                <h5>Payment Methods</h5>
              </div>
              <div class="col-6 text-end">
                <button class="btn btn-primary">Upload Profil</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item px-0">
                <div class="media align-items-center">
                  <img class="img-fluid wid-65"
                    src="https://berrydashboard.io/codeignitor/stage/default/public/assets/images/application/card-visa.png"
                    alt="User image">
                  <div class="media-body mx-3">
                    <h5 class="mb-0">Visa card</h5>
                    <small class="text-muted mb-0">Ending in 5269 07XX XXXX 8110</small>
                  </div>
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#"
                        class="badge btn-light-primary rounded-pill text-base">Default</a>
                    </li>
                    <li class="list-inline-item opacity-25">|</li>
                    <li class="list-inline-item"><a href="#" class="link-primary">Edit</a></li>
                  </ul>
                </div>
              </li>
              <li class="list-group-item px-0">
                <div class="media align-items-center">
                  <img class="img-fluid wid-65"
                    src="https://berrydashboard.io/codeignitor/stage/default/public/assets/images/application/card-discover.png"
                    alt="User image">
                  <div class="media-body mx-3">
                    <h5 class="mb-0">Discover</h5>
                    <small class="text-muted mb-0">Ending in 6109 07XX XXXX 8020</small>
                  </div>
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="link-secondary">Make Default</a></li>
                    <li class="list-inline-item opacity-25">|</li>
                    <li class="list-inline-item"><a href="#" class="link-primary">Edit</a></li>
                  </ul>
                </div>
              </li>
              <li class="list-group-item px-0">
                <div class="media align-items-center">
                  <img class="img-fluid wid-65"
                    src="https://berrydashboard.io/codeignitor/stage/default/public/assets/images/application/card-master.png"
                    alt="User image">
                  <div class="media-body mx-3">
                    <h5 class="mb-0">Mastercard</h5>
                    <small class="text-muted mb-0">Ending in 7278 07XX XXXX 4290</small>
                  </div>
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="link-secondary">Make Default</a></li>
                    <li class="list-inline-item opacity-25">|</li>
                    <li class="list-inline-item"><a href="#" class="link-primary">Edit</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="card border">
          <div class="card-header">
            <h5>Billing History</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Order No.</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>12877227695</td>
                    <td>26 Feb 2021 9:16 am</td>
                    <td>$56.32</td>
                    <td><span class="badge bg-light-warning">Awaiting</span></td>
                  </tr>
                  <tr>
                    <td>12901477937</td>
                    <td>30 Jan 2021 2:54 pm</td>
                    <td>$75.56</td>
                    <td><span class="badge bg-light-success">Paid</span></td>
                  </tr>
                  <tr>
                    <td>12767886919</td>
                    <td>22 Jan 2021 12:01 pm</td>
                    <td>$34.23</td>
                    <td><span class="badge bg-light-success">Paid</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-3">
        <div class="row">
          <div class="col-md-8 col-xxl-9">
            <div class="card border">
              <div class="card-header">
                <h5>Change Password</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="form-label">Current password</label>
                      <input type="password" class="form-control" placeholder="Current password">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="form-label">New Password</label>
                      <input type="password" class="form-control" placeholder="New Password">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="form-label">Re-enter New Password</label>
                      <input type="password" class="form-control" placeholder="Re-enter New Password">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <button class="btn btn-primary">Change Password</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-xxl-3">
            <div class="card border">
              <div class="card-header">
                <h5>Delete Account</h5>
              </div>
              <div class="card-body">
                <p>To deactivate your account, first delete its resources. If you are the only owner of any teams,
                  either assign
                  another owner or deactivate the team.</p>
                <button class="btn btn-outline-danger">Change Password</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
        <div class="row">
          <div class="col-md-8 col-xxl-9">
            <div class="card border">
              <div class="card-header">
                <h5>Subscription Preference Center</h5>
              </div>
              <div class="card-body">
                <h5 class="mb-4">I would like to receive:</h5>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="ckeckall1" checked="">
                  <label class="form-check-label" for="ckeckall1"> Product Announcements and Updates </label>
                </div>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="ckeckall2" checked="">
                  <label class="form-check-label" for="ckeckall2"> Events and Meetups </label>
                </div>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="ckeckall3" checked="">
                  <label class="form-check-label" for="ckeckall3"> User Research Surveys </label>
                </div>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="ckeckall4">
                  <label class="form-check-label" for="ckeckall4"> Hatch Startup Program </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-xxl-3">
            <div class="card border">
              <div class="card-header">
                <h5>Opt me out instead</h5>
              </div>
              <div class="card-body">
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="ckeckall" checked="">
                  <label class="form-check-label" for="ckeckall"> Unsubscribe me from all of the above </label>
                </div>
                <button class="btn btn-primary">Update my preferences</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection