 @extends('layout.index')
 

 @section('page_level_plugins_css')
  <!-- Put page level plugin css-links here :)  -->
	 {!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
	 {!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css') !!}
	 {!! Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
 @endsection
 
 

 @section('page_level_plugins_script')
   <!-- Put page level plugin script-links here :)  -->
	{!! Html::script('assets/global/scripts/datatable.js') !!}
	{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
	{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
	{!! Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}   
 @endsection



 @section('page_level_scripts') 
  <!-- put any script link that is related only to this page here :)  -->
 <!-- write your own custom scripts here :)  -->
	<script>
        $(function(){

            var table = $('#users');

            table.dataTable({
               processing: true,
                serverSide: true,
                 ajax: '{!! route('usersData') !!}',
                 columns: [
                     { data: 'employee_id', name: 'employee_id' },
                     { data: 'name',        name: 'name' },
                     { data: 'last_name',   name: 'last_name' },
                     { data: 'email',       name: 'employees.email' },
                     { data: 'active',      name: 'active' },
                     { data: 'actions',     name: 'actions' }                                
                 ],    
                 // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
                 // So when dropdowns used the scrollable div should be removed. 
                // "dom": "<'row'<'col-md-6 col-sm-12'><'col-md-6 col-sm-12'>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12 ltr'p>>",
 
                 "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                 "language": {
                         "url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Persian.json"
                     },
                 "pagingType": "bootstrap_extended",
 
                 "lengthMenu": [
                     [5, 15, 25, 50],
                     [5, 15, 25, 50] // change per page values here
                 ],
                 // set the initial value
                 "pageLength": 5,
                 "columnDefs": [
                 {
                    'className':'ltr',
                    'targets': [3]
                 },{  // set default column settings
                     'orderable': false,
                     'searchable': false,                    
                     'targets': [5]
                 }],
                 "order": [
                     [0, "asc"]
                 ] // set first column as a default sort by asc
             });         
        })		
	</script>    
 @endsection

 
 
 
 @section('content')
		<!-- BEGIN PAGE HEADER-->
		
	
		<!-- BEGIN PAGE TITLE-->
		<h3 class="page-title"> {{ trans('general.user_management') }}
			<small>{{ trans('general.users') }}</small>
		</h3>
		<!-- END PAGE TITLE-->
	
		<!-- END PAGE HEADER-->
	   
		<!-- BEGIN DASHBOARD STATS 1-->
		<div class="row">
            <div class="col-md-12">                            
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                   <div class="portlet-title">                               	                                    
                        <div class="caption">
                            <span class="caption-subject font-green sbold uppercase">{{ trans('general.users') }}</span>
                        </div>                                              
                        <div class="actions pull-right">
        					<a href="{{ route('addUser') }}" class="btn blue"> {{ trans('general.add') }}           
                            		<i class="fa fa-plus"></i>
                            </a>                                        
                        </div>
                    </div> 
                    <div class="portlet-body">

                        @include('layout.message')

                        <table class="table table-striped table-hover order-column" id="users">
                            <thead>
                                <tr>                                               
                                    <th> {{ trans('general.id') }}         </th>
                                    <th> {{ trans('general.name') }}       </th>
                                    <th> {{ trans('general.last_name') }}  </th>
                                    <th> {{ trans('general.email') }}      </th>
                                    <th> {{ trans('general.status') }}     </th>
                                    <th> {{ trans('general.actions') }}    </th>
                                </tr>
                            </thead>                                     
                        </table>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>		
                                        
@endsection                    