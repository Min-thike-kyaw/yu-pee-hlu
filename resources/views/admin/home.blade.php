
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Forms</h1>
@stop

@section('content')
    <div class="container">
        <button onclick="showModalBox(['hello','world'])">Hello</button>
    
        <div class="col-md-8">
            <!-- <table id="table_id" class="display">
            
            </table> -->
            <table id="table_id" class="table mdl-data-table table-striped display">
                <thead>
                    <tr>
                        <th>Account</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Height</th>
                        <th>Partner Gender</th>
                        <th>Submitted at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title"></h1>
                            
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                        <div>
                            <div class="form-image">

                            </div>
                                <p class="city">City : </p>
                                <p class="email">Email: </p>
                                    <hr>

                                <p class="age">Age : </p>
                                <p class="partner-age">လိုချင်တဲ့လူရဲ့Age : </p>
                                <hr>

                                <p class="gender">Gender : </p>
                                <p class="partner-gender">လိုချင်တဲ့ရည်းချားရဲ့gender  : </p>
                                <hr>

                                <p class="skin-tone">Skin tone : </p>
                                <p class="partner-skin-tone">လိုချင်တဲ့ရည်းချားရဲ့skin tone : </p>
                                <hr>

                                <p class="height"> Height : <span class="feet"></span> feet <span class="inches"></span> inches </p>
                                <p class="partner-height">Height : </p>
                                <hr>

                                <p class="look">ကိုယ့်ရုပ်ရည်ခန့်မှန်းချက်  : </p>
                                <p class="partner-look">လိုချင်တဲ့ပုံစံ  : </p>
                                <hr>

                                <p class="body-shape">Body Shape : </p>
                                <p class="partner-body-shape">လိုချင်တဲ့လူရဲ့body shape : </p>

                                    <img src="" width="1000" alt="">
    
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            
        </div>
    </div>
@stop

@section('css')
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.material.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/sc-2.0.4/sb-1.1.0/sp-1.3.0/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/sc-2.0.4/sb-1.1.0/sp-1.3.0/datatables.min.css"/>

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.25/datatables.min.css"/> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/b-1.7.1/datatables.min.css"/> -->


@stop

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>

$('#table_id').DataTable( {
    "ajax" : {
        "url": "/api/forms",
        "dataSrc": "forms"
    },
    autoWidth: false,
    columns: [
        { data: 'acc_name' },
        { data: 'email' },
        { data: 'your_gender_text' },
        { data: 'age' },
        { 
            data: null,
            "width": '5%',
            render:  {
                _ :  (row) => row.feet_inch.feet + 'feet ' + row.feet_inch.inches + 'inches',
                sort: 'your_height_by_inch'
            }
        },
        { data: 'partner_gender',},
        { data: null,
            render: function ( data, type, row ) {
                return new Date(row.created_at).toUTCString();
            }
        },
        
        
        {   "defaultContent": null,
            render: function ( data, type, row ) {
                var seeMore = '<button class="btn btn-primary " onclick=\'showModalBox('+ JSON.stringify(row) +')\' type="button" >'+"Details"+'</button>'
                var deleteForm = "<a class='btn btn-danger' href='/admin/forms/"+row.id+"/delete'>Delete</a>"
                return seeMore + deleteForm;
                
            }
        },

        
    ],
    columnDefs: [
            {
                targets: ['_all'],
                
                className: 'mdc-data-table__cell'
            },
            
    ]

} );
var showModalBox = function(row) {
    $('#myModal').modal('show')
    
    
    // let form = JSON.parse(row)
    $( ".modal-title" ).append( `<a href='${row.acc_name}'>${row.acc_name}</a>` );
    // console.log(row.photo);
    $( ".form-image" ).append( `<img class="img-fluid" width="auto" src={{asset("images/".'${row.photo}')}}>` );

    // console.log(form)
    $( ".city" ).append( row.city );
    $( ".email" ).append( row.email );
    $( ".age" ).append( row.age );
    $( ".partner-age" ).append( row.age_you_want );
    $( ".gender" ).append( row.your_gender_text );
    $( ".partner-gender" ).append( row.partner_gender );
    $( ".skin-tone" ).append( row.your_skin_tone_text );
    $( ".partner-skin-tone" ).append( row.partner_skin_tone );
    $( ".feet" ).append( row.feet_inch.feet );
    $( ".inches" ).append( row.feet_inch.inches );
    $( ".partner-height" ).append( row.partner_height );
    $( ".look" ).append( row.your_look );
    $( ".partner-look" ).append( row.other_looks_you_want );
    $( ".body-shape" ).append( row.your_body_shape_text );
    $( ".partner-body-shape" ).append( row.partner_body_shape );
    

}
$('#myModal').on('hidden.bs.modal', function (e) {
        $( "#myModal" ).load(document.URL+  " .modal-dialog");

    });



</script>
@stop

