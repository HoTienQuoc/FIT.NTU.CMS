<!DOCTYPE html>
<html lang="en" ng-app="cmsApp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CMS Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: row;
    }
    .sidebar {
      width: 220px;
      background-color: #343a40;
      color: white;
      padding-top: 20px;
    }
    .sidebar a {
      display: block;
      padding: 10px 20px;
      color: white;
      text-decoration: none;
    }
    .sidebar a.active, .sidebar a:hover {
      background-color: #495057;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
    }
  </style>
</head>
<body >
  <div class="sidebar">
    <h4 class="text-center">CMS Admin</h4>
    <a href="/dashboard/users" class="{{ request()->is('dashboard/users*') ? 'active' : '' }}">Users</a>
    <a href="/dashboard/roles" class="{{ request()->is('dashboard/roles*') ? 'active' : '' }}">Roles</a>
    <a href="/dashboard/permissions" class="{{ request()->is('dashboard/permissions*') ? 'active' : '' }}">Permissions</a>
    <a href="/dashboard/pages" class="{{ request()->is('dashboard/pages*') ? 'active' : '' }}">Pages</a>
    <a href="/dashboard/posts" class="{{ request()->is('dashboard/posts*') ? 'active' : '' }}">Posts</a>
    <a href="/dashboard/widgets" class="{{ request()->is('dashboard/widgets*') ? 'active' : '' }}">Widgets</a>
    <a href="/dashboard/themes" class="{{ request()->is('dashboard/themes*') ? 'active' : '' }}">Themes</a>
    <a href="/dashboard/navigations" class="{{ request()->is('dashboard/navigations*') ? 'active' : '' }}">Navigations</a>
  </div>
  <div class="content">
    @yield('content')
  </div>
</body>
</html>
