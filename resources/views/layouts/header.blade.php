<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{-- Icon Sidebar --}}
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
{{-- Boostrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="/css/layout.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css" />
<!-- Style Search and Page Data Table -->
<style>
    .dt-length {
        padding-left: 5px;
    }

    .dt-search {
        padding-right: 5px;
    }
</style>

<!-- Style Accordion -->
<style>
    .accordion-item:first-of-type .accordion-button {
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
        transition: ease .6s;
    }

    .accordion-button:not(.collapsed) {
        color: #0c63e4;
        background-color: #e7f1ff;
        box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
    }

    .accordion-button:not(.collapsed) {
        color: #0c63e4;
        background-color: #fff;
        box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
        border-left: 2em solid #0d6efd;
    }
</style>