@extends('dashboard')
@section('content')

<div class="container" ng-controller="RolesController" ng-init="init()">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3>Role Management</h3>
      <button class="btn btn-primary" ng-click="openRoleModal()">Add Role</button>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>RoleName</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="role in roles">
          <td>[[ role.roleName ]]</td>
          <td>
            <button class="btn btn-sm btn-warning me-1" ng-click="openRoleModal(role)">Edit</button>
            <button class="btn btn-sm btn-danger" ng-click="deleteRole(role.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="modal fade" id="roleModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">[[ modalTitle ]]</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form name="roleForm">
              <div class="mb-3">
                <label>Role</label>
                <input type="text" class="form-control" ng-model="formData.roleName" />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-click="saveRole()">Save</button>
          </div>
        </div>
      </div>
    </div>
</div>
<script src="{{ asset('js/role.js') }}"></script>
@endsection
