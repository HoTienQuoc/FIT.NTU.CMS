@extends('dashboard')

@section('content')
<div class="container" ng-controller="WidgetsController" ng-init="init()">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Widget Management</h3>
        <button class="btn btn-primary" ng-click="openWidgetModal()">Add Widget</button>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Position</th>
                <th>Enabled</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="widget in widgets">
                <td>[[ widget.name ]]</td>
                <td>[[ widget.type ]]</td>
                <td>[[ widget.position ]]</td>
                <td>[[ widget.enabled ? 'Yes' : 'No' ]]</td>
                <td>
                    <button class="btn btn-warning btn-sm me-1" ng-click="openWidgetModal(widget)">Edit</button>
                    <button class="btn btn-danger btn-sm" ng-click="deleteWidget(widget.id)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="widgetModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">[[ modalTitle ]]</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" ng-model="formData.name" required />
                        </div>
                        <div class="mb-3">
                            <label>Type</label>
                            <input type="text" class="form-control" ng-model="formData.type" />
                        </div>
                        <div class="mb-3">
                            <label>Position</label>
                            <input type="text" class="form-control" ng-model="formData.position" />
                        </div>
                        <div class="mb-3">
                            <label>Config (key=value, phân cách bởi dấu phẩy)</label>
                            <input type="text" class="form-control" ng-model="formData.configStr" placeholder="autoplay=true,speed=500" />
                        </div>
                        <div class="mb-3">
                            <label>Content</label>
                            <textarea class="form-control" ng-model="formData.content"></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="enabledCheckbox" ng-model="formData.enabled" />
                            <label class="form-check-label" for="enabledCheckbox">Enabled</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" ng-click="saveWidget()">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/widget.js') }}"></script>
@endsection
