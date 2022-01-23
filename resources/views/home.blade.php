@extends('layouts.mainlayout')
@section('content')
<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">
                <div class="form-group">
                    <select class="form-control-lg form-control" id="fltrtbl">
                        <option value="">Filter Province</option>
                        <option value="Abra">Abra</option>
                        <option value="Apayao">Apayao</option>
                        <option value="Benguet">Benguet</option>
                        <option value="Ifugao">Ifugao</option>
                        <option value="Kalinga">Kalinga</option>
                        <option value="Mountain Province">Mt. Province</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <input id="search" class="form-control form-control-lg" type="text" placeholder="search">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table id="carsensortable" class="display table table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Station ID</th>                            
                            <th>Province</th>
                            <th>Address</th>
                            <th>Project</th>
                            <th>Station Type</th>
                            <th>Server Number</th>
                            <th>Sim Number</th>
                            <th>IMEI</th>
                            <th>Firmware</th>
                            <th>Coordinates</th>

                            <th>Elevation</th>                   
                            <th>Date Installed</th>
                        </tr>
                    </thead>
                   
                </table>
            </div>
        </div>
    </div>
</div>
@section('homecss')
<style>
    #carsensortable_filter{
        display: none !important;
    }
    #carsensortable{
        margin-top: 1rem;
    }
    #carsensortable tbody tr:hover,
    #carsensortable tbody tr:hover td.sorting_1{
        background: #00FFFF !important;
    }
</style>
@endsection
@section('homejs')
<script>

    oTable = $('#carsensortable').DataTable( {
        ajax: {
            url: "https://raw.githubusercontent.com/jokzzz69/snsor/master/masterlist",
            dataSrc: ""
        },
        columns:[
            { data: 'Station ID' },
            { data: 'Province' },
            { data: 'Address' },
            { data: 'Project' },
            { data: 'Station Type' },
            { data: 'Server Number' },
            { data: 'Sim Number' },
            { data: 'IMEI' },
            { data: 'Firmware' },
            { data: 'Latitude',
                    render: function ( data, type, row ) {
                    return '<a target="_blank" title="View on Map" href="http://www.google.com/maps/place/'+row.Latitude + ',' + row.Longitude+'">'+row.Latitude + ',' + row.Longitude+'</a>';
                }
            },
            { data: 'Elevation' },
            { data: 'Date Installed' },
        ],
        paging: false

    } );

$('#search').keyup(function(){
    oTable.search($(this).val()).draw() ;
})

$("#fltrtbl").on('change',function(){oTable.search($(this).val()).draw()})
</script>
@endsection
@endsection

