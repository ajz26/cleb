{{-- <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
  <div class="modal-dialog">
    <form class="add-new-user modal-content pt-0" method="POST" action="{{route('system.users.store')}}">
      @csrf
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
      <div class="modal-header mb-1">
        <h5 class="modal-title" id="exampleModalLabel">New User</h5>
      </div>
      <div class="modal-body flex-grow-1">
        <div class="form-group">
          <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
          <input
            type="text"
            class="form-control dt-full-name"
            id="basic-icon-default-fullname"
            placeholder="John Doe"
            name="name"
            aria-label="John Doe"
            aria-describedby="basic-icon-default-fullname2"
          />
        </div>
        <div class="form-group">
          <label class="form-label" for="basic-icon-default-email">Email</label>
          <input
            type="text"
            id="basic-icon-default-email"
            class="form-control dt-email"
            placeholder="john.doe@example.com"
            aria-label="john.doe@example.com"
            aria-describedby="basic-icon-default-email2"
            name="email"
          />
          <small class="form-text text-muted"> You can use letters, numbers & periods </small>
        </div>
        <div class="form-group">
          <label class="form-label" for="user-role">User Role</label>
          <select id="user-role" name="roles" class="form-control">
          @foreach ($roles as $role => $value )
            <option value="{{$role}}">{{$value}}</option>  
          @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" id="status" name="state">
            @foreach ($states as $state )
            <option value="{{$state}}" {{'Pending' == $state ? "selected='selected'" : null}}>{{$state}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label class="form-label" for="basic-icon-default-password">Password</label>
          <input
            type="password"
            class="form-control dt-full-name"
            id="basic-icon-default-password"
            placeholder="Type a password"
            name="password"
            aria-label="Type a password"
            aria-describedby="basic-icon-default-password2"
          />
        </div>
        <hr>

        <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div> --}}
