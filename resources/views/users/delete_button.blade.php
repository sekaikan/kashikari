<!-- Button trigger modal -->
<div class="my-3 text-center">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
      Delete Account
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure to delete your account?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
        {!! Form::button('Delete Account', ['type'=> 'submit', 'class' => 'btn btn-danger'])!!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>