@extends('dashboard')
@section('content')

<div class="container" ng-controller="UsersController" ng-init="init()">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3>User Management</h3>
      <button class="btn btn-primary" ng-click="openUserModal()">Add User</button>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Roles</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="user in users">
          <td>[[ user.name ]]</td>
          <td>[[ user.email ]]</td>
          <td>[[ user.roles.join(', ') ]]</td>
          <td>
            <button class="btn btn-sm btn-warning me-1" ng-click="openUserModal(user)">Edit</button>
            <button class="btn btn-sm btn-danger" ng-click="deleteUser(user.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">[[ modalTitle ]]</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form name="userForm">
              <div class="mb-3">
                <label>Name</label>
                <input type="text" class="form-control" ng-model="formData.name" required />
              </div>
              <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" ng-model="formData.email" required />
              </div>
              <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" ng-model="formData.password" required />
              </div>
              <div class="mb-3">
                <label>Roles (comma-separated)</label>
                <input type="text" class="form-control" ng-model="formData.rolesStr" />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-click="saveUser()">Save</button>
          </div>
        </div>
      </div>
    </div>
</div>
<script src="{{ asset('js/user.js') }}"></script>
@endsection
