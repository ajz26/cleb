@extends('layouts/contentLayoutMaster')

@section('title', 'User Edit')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
<!-- users edit start -->
<section class="app-user-edit">
  <div class="card">
    <div class="card-body">
      <ul class="nav nav-pills" role="tablist">
        <li class="nav-item">
          <a
            class="nav-link d-flex align-items-center active"
            id="account-tab"
            data-toggle="tab"
            href="#account"
            aria-controls="account"
            role="tab"
            aria-selected="true"
          >
            <i data-feather="user"></i><span class="d-none d-sm-block">Account</span>
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link d-flex align-items-center"
            id="Security-tab"
            data-toggle="tab"
            href="#Security"
            aria-controls="Security"
            role="tab"
            aria-selected="false"
          >
            <i data-feather="lock"></i><span class="d-none d-sm-block">Security</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a
            class="nav-link d-flex align-items-center"
            id="social-tab"
            data-toggle="tab"
            href="#social"
            aria-controls="social"
            role="tab"
            aria-selected="false"
          >
            <i data-feather="share-2"></i><span class="d-none d-sm-block">Social</span>
          </a>
        </li> --}}
      </ul>
      <div class="tab-content">
        <!-- Account Tab starts -->
        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
          <!-- users edit media object start -->
          <div class="media mb-2">
            <img
              src="{{asset('images/avatars/7.png')}}"
              alt="users avatar"
              class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer"
              height="90"
              width="90"
            />
            <div class="media-body mt-50">
              <h4>{{$user->name}}</h4>
              <div class="col-12 d-flex mt-1 px-0">
                <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                  <span class="d-none d-sm-block">{{__('Change')}}</span>
                  <input
                    class="form-control"
                    type="file"
                    id="change-picture"
                    hidden
                    accept="image/png, image/jpeg, image/jpg"
                  />
                  <span class="d-block d-sm-none">
                    <i class="mr-0" data-feather="edit"></i>
                  </span>
                </label>
                <button class="btn btn-outline-secondary d-none d-sm-block">{{__('Remove')}}</button>
                <button class="btn btn-outline-secondary d-block d-sm-none">
                  <i class="mr-0" data-feather="trash-2"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- users edit media object ends -->
          <!-- users edit account form start -->
          <form class="form-validate" action="{{route('system.users.update',compact('user'))}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Name"
                    value="{{$user->name}}"
                    name="name"
                    id="name"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Email"
                    value="{{$user->email}}"
                    name="email"
                    id="email"
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" id="status" name="state">
                    @foreach ($states as $state )
                    <option value="{{$state}}" {{$user->state == $state ? "selected='selected'" : null}}>{{$state}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="user-role">Role</label>
                  <select id="user-role" name="roles" class="form-control">
                    @foreach ($roles as $role => $value )
                      <option value="{{$role}}">{{$value}}</option>  
                    @endforeach
                    </select>
                </div>
              </div>
             
              <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
              </div>
            </div>
          </form>
          <!-- users edit account form ends -->
        </div>
        <!-- Account Tab ends -->

        <!-- Security Tab starts -->
        <div class="tab-pane" id="Security" aria-labelledby="Security-tab" role="tabpanel">

          <h4 class="mb-2">{{__('Change Password')}}</h4>
          <!-- users edit Info form start -->
          <form class="validate-form">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label for="account-new-password">New Password</label>
                  <div class="input-group form-password-toggle input-group-merge">
                    <input
                      type="password"
                      id="account-new-password"
                      name="new-password"
                      class="form-control"
                      placeholder="New Password"
                    />
                    <div class="input-group-append">
                      <div class="input-group-text cursor-pointer">
                        <i data-feather="eye"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label for="account-retype-new-password">Retype New Password</label>
                  <div class="input-group form-password-toggle input-group-merge">
                    <input
                      type="password"
                      class="form-control"
                      id="account-retype-new-password"
                      name="confirm-new-password"
                      placeholder="New Password"
                    />
                    <div class="input-group-append">
                      <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <p class="fw-bolder">Password requirements:</p>
                <ul class="ps-1 ms-25">
                  <li class="mb-50">Minimum 8 characters long - the more, the better</li>
                  <li class="mb-50">At least one lowercase character</li>
                  <li>At least one number, symbol, or whitespace character</li>
                </ul>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
              </div>
            </div>
          </form>
          <!-- users edit Info form ends -->
        </div>
        <!-- Security Tab ends -->

        <!-- Social Tab starts -->
        <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
          <!-- users edit social form start -->
          <form class="form-validate">
            <div class="row">
              <div class="col-lg-4 col-md-6 form-group">
                <label for="twitter-input">Twitter</label>
                <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">
                      <i data-feather="twitter" class="font-medium-2"></i>
                    </span>
                  </div>
                  <input
                    id="twitter-input"
                    type="text"
                    class="form-control"
                    value="https://www.twitter.com/adoptionism744"
                    placeholder="https://www.twitter.com/"
                    aria-describedby="basic-addon3"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6 form-group">
                <label for="facebook-input">Facebook</label>
                <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon4">
                      <i data-feather="facebook" class="font-medium-2"></i>
                    </span>
                  </div>
                  <input
                    id="facebook-input"
                    type="text"
                    class="form-control"
                    value="https://www.facebook.com/adoptionism664"
                    placeholder="https://www.facebook.com/"
                    aria-describedby="basic-addon4"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6 form-group">
                <label for="instagram-input">Instagram</label>
                <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon5">
                      <i data-feather="instagram" class="font-medium-2"></i>
                    </span>
                  </div>
                  <input
                    id="instagram-input"
                    type="text"
                    class="form-control"
                    value="https://www.instagram.com/adopt-ionism744"
                    placeholder="https://www.instagram.com/"
                    aria-describedby="basic-addon5"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6 form-group">
                <label for="github-input">Github</label>
                <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon9">
                      <i data-feather="github" class="font-medium-2"></i>
                    </span>
                  </div>
                  <input
                    id="github-input"
                    type="text"
                    class="form-control"
                    value="https://www.github.com/madop818"
                    placeholder="https://www.github.com/"
                    aria-describedby="basic-addon9"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6 form-group">
                <label for="codepen-input">Codepen</label>
                <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon12">
                      <i data-feather="codepen" class="font-medium-2"></i>
                    </span>
                  </div>
                  <input
                    id="codepen-input"
                    type="text"
                    class="form-control"
                    value="https://www.codepen.com/adoptism243"
                    placeholder="https://www.codepen.com/"
                    aria-describedby="basic-addon12"
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6 form-group">
                <label for="slack-input">Slack</label>
                <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon11">
                      <i data-feather="slack" class="font-medium-2"></i>
                    </span>
                  </div>
                  <input
                    id="slack-input"
                    type="text"
                    class="form-control"
                    value="@adoptionism744"
                    placeholder="https://www.slack.com/"
                    aria-describedby="basic-addon11"
                  />
                </div>
              </div>

              <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
              </div>
            </div>
          </form>
          <!-- users edit social form ends -->
        </div>
        <!-- Social Tab ends -->
      </div>
    </div>
  </div>
</section>
<!-- users edit ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-user-edit.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
@endsection
