<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truck Management</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/css/layout.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css" />
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    
    <style>
        .table {
            margin-top: 20px;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table td {
            background-color: #ffffff;
        }

        .table td a {
            text-decoration: none;
            color: #007bff;
        }

        .table td a:hover {
            text-decoration: underline;
        }

        .table td {
            padding: 15px;
        }

        .sidebar-header {
            padding: 20px;
            background: #007bff;
            color: white;
            text-align: center;
            border-bottom: 2px solid #0056b3;
        }

        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            border-radius: 0px 20px 20px 0px;
        }

        .sidebar-nav {
            padding: 0;
            list-style: none;
        }

        .sidebar-item {
            padding: 10px 15px;
        }

        .sidebar-link {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .sidebar-link:hover {
            background: #495057;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 10px;
            background: #343a40;
        }

        .icon-large {
            font-size: 1.5rem;
            margin-right: 10px;
        }
    </style>
</head>