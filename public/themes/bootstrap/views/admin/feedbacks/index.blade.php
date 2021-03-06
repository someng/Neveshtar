@extends($theme_layout)

@section('content')
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
	@if(Session::has('message'))
	<div class="alert alert-success">
		<button class="close" data-close="alert"></button>
		{{Session::get('message')}}
	</div>
	@endif
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">{{Lang::get('admin.manage')}} {{$title}}</span>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-container">
					<div class="table-actions-wrapper">
						<span>
						</span>
						<select class="table-group-action-input form-control input-inline input-small input-sm">
							<option value="">{{Lang::get('admin.select')}}...</option>
							<option value="read">{{Lang::get('admin.read')}}</option>
							<option value="unread">{{Lang::get('admin.unread')}}</option>
							<option value="delete">{{Lang::get('admin.delete')}}</option>
						</select>
						<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> {{Lang::get('admin.submit')}}</button>
					</div>
					<table class="table table-striped table-bordered table-hover" id="datatable_ajax">
					<thead>
					<tr role="row" class="heading">
						<th width="5%" class="no-sort">
							<input type="checkbox" class="group-checkable">
						</th>
						<th width="5%">
							 #
						</th>
						<th width="20%">
							 {{Lang::get('admin.date')}}
						</th>
						<th width="30%">
							 {{Lang::get('admin.message')}}
						</th>
						<th width="15%">
							 {{Lang::get('admin.email')}}
						</th>
						<th width="10%">
							 {{Lang::get('admin.name')}}
						</th>
						<th width="5%">
							 {{Lang::get('admin.status')}}
						</th>
					</tr>
					<input type="hidden" class="form-control form-filter input-sm" name="_token" value="{{ csrf_token() }}">
					</thead>
					<tbody>
						@foreach($items as $item)
							<tr>
								<td>
								<input type="checkbox" name="id[]" value="{{$item->id}}"></td>
								<td>{{$item->id}}</td>
								<td>{{$item->created_at}}</td>
								<td>{{$item->message}}</td>
								<td>{{$item->email}}</td>
								<td>{{$item->name}}</td>
								<td>{{$item->status}}</td>
							</tr>
						@endforeach
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE CONTENT-->
@endsection

@section('headerPlugins')
@endsection

@section('header')
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="/themes/bootstrap/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
@endsection

@section('footerPlugins')
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="/themes/bootstrap/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
@endsection

@section('footer')
<script src="/themes/bootstrap/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="/themes/bootstrap/assets/global/scripts/datatable.js"></script>

<script>
	var ajax_url = "/admin/feedbacks/ajax_table"
	var actions_url = "/admin/feedbacks/actions"
	var _token = "{{ csrf_token() }}"
	var items_total = "{{$items_total}}"
</script>
<script src="/themes/bootstrap/assets/admin/pages/scripts/table-ajax.js"></script>
@endsection

@section('inits')
Demo.init(); // init demo features
TableAjax.init();
@endsection