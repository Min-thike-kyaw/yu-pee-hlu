
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Forms</h1>
@stop

@section('content')
    <div class="container">
        <div class="col-md-8">
            <!-- <table id="table_id" class="display">
                
            </table> -->
            <table id="table_id" class="table table-striped display">
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

            
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>
var data= [
    {
        "name":       "Tiger Nixon",
        "position":   "System Architect",
        "salary":     "$3,120",
        "start_date": "2011/04/25",
        "office":     "Edinburgh",
        "extn":       "5421"
    },
    {
        "name":       "Garrett Winters",
        "position":   "Director",
        "salary":     "$5,300",
        "start_date": "2011/07/25",
        "office":     "Edinburgh",
        "extn":       "8422"
    }
];
$('#table_id').DataTable( {
    "ajax" : {
        "url": "/api/forms",
        "dataSrc": "forms"
    },
    columns: [
        { data: 'acc_name' },
        { data: 'email' },
        { data: 'your_gender_text' },
        { data: 'age' },
        { data: null,
            render: function ( data, type, row ) {
                return row.feet_inch.feet + 'feet ' + row.feet_inch.inches + 'inches';
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
                var seeMore = "<a class='btn btn-primary mr-1' href='/admin/forms/"+row.id+"''>See More</a>"
                var deleteForm = "<a class='btn btn-danger' href='/admin/forms/"+row.id+"/delete'>Delete</a>"
                return seeMore + deleteForm;
                
            }
        }

        
    ]
} );
</script>
@stop

