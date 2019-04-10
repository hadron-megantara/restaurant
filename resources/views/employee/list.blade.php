@extends('layouts.app')

@section('content')

    <main class="content">
		<div class="container-fluid p-0">
            <div class="col-12 col-md-12 col-xl d-flex" style="margin-bottom:10px">
                <h1>Employee</h1>
            </div>

            <div class="col-12 col-md-12 col-xl d-flex">
				<div class="card flex-fill">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
                                <div class="pull-right">
                                    <a href="#modalAdd" class="btn btn-primary" data-toggle="modal">
                                        <span class="fa fa-plus"></span> Add Employee
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible" role="alert">
    					<div class="alert-message">
    						{{session('success')}}
    					</div>

    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
    				</div>
                </div>
            @endif

            <div class="col-12 col-md-12 col-xl d-flex">
				<div class="card flex-fill">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
                                <div class="table-responsive">
                                	<table id="employeeTable" class="table table-striped my-0 text-center" style="width:100%">
                                		<thead>
                                			<tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Phone</th>
                                                <th class="text-center">Address</th>
                                				<th class="actions-column text-center">Action</th>
                                			</tr>
                                		</thead>
                                		<tbody>
                                		</tbody>
                                	</table>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

    <div id="modalAdd" class="modal fade" role="dialog" style="z-index:999999">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="/employee" role="form" id="addForm">
                    {!! csrf_field() !!}

                    <div class="modal-header">
                        <h4 class="modal-title">Add New Employee</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                            <label for="employeeName" class="col-md-3 form-control" style="border:none">Employee Name</label>
                            <div class="col-md-9">
                                <input type="text" name="employeeName" id="employeeName" class="form-control" placeholder="employee name ...">
                            </div></div>
                        </div>
                    </div>

                    <div class="modal-body" style="margin-top:-10px">
                        <div class="form-group">
                            <div class="row">
                            <label for="employeePhone" class="col-md-3 form-control" style="border:none">Employee Phone</label>
                            <div class="col-md-9">
                                <input type="text" name="employeePhone" id="employeePhone" class="form-control" placeholder="employee phone ...">
                            </div></div>
                        </div>
                    </div>

                    <div class="modal-body" style="margin-top:-10px">
                        <div class="form-group">
                            <div class="row">
                            <label for="employeeAddress" class="col-md-3 form-control" style="border:none">Employee Address</label>
                            <div class="col-md-9">
                                <textarea name="employeeAddress" id="employeeAddress" rows="3" class="form-control" placeholder="employee address ..."></textarea>
                            </div></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">
                            <span class="fa fa-times"></span>
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-success">
                            <span class="fa fa-save"></span>
                            Save
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="modalEdit" class="modal fade" role="dialog" style="z-index:999999">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="/employee/update" role="form" id="editForm">
                    {!! csrf_field() !!}

                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="employeeEditName" class="col-md-3 form-control" style="border:none">Employee Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="employeeName" id="employeeEditName" class="form-control" placeholder="employee name ...">
                                    <input type="hidden" id="editId" value="0" name="employeeId">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body" style="margin-top:-10px">
                        <div class="form-group">
                            <div class="row">
                                <label for="employeeEditPhone" class="col-md-3 form-control" style="border:none">Employee Phone</label>
                                <div class="col-md-9">
                                    <input type="text" name="employeePhone" id="employeeEditPhone" class="form-control" placeholder="employee phone ...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body" style="margin-top:-10px">
                        <div class="form-group">
                            <div class="row">
                                <label for="employeeEditAddress" class="col-md-3 form-control" style="border:none">Employee Address</label>
                                <div class="col-md-9">
                                    <textarea name="employeeEditAddress" id="employeeEditAddress" class="form-control" placeholder="employee address ..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">
                            <span class="fa fa-times"></span>
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-success">
                            <span class="fa fa-save"></span>
                            Save
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="modalDelete" class="modal fade" role="dialog" style="z-index:999999">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="/employee/delete" role="form" id="editForm">
                    {!! csrf_field() !!}

                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                    </div>

                    <div class="modal-body">
                        <p>Are you sure want to remove employee "<b id="employeeDeleteName"></b>"?</p>
                        <input type="hidden" id="deleteId" value="0" name="employeeId">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">
                            <span class="fa fa-times"></span>
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-danger">
                            <span class="fa fa-trash"></span>
                            Remove
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

<script type="text/javascript">
	$(document).ready(function(){
        var t = $('#employeeTable').DataTable({
            searching: false,
            info: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('employee.list') }}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'phone', name: 'phone' },
                { data: 'address', name: 'name' },
                { data: 'id', name: 'id', orderable: false, render: function(data, type, full) {
                        var dataReturn = '<div class="text-center"><input type="hidden" id="employeeName_'+data+'" value="'+full.name+'" /><input type="hidden" id="employeePhone_'+data+'" value="'+full.phone+'" /><input type="hidden" id="employeeAddress_'+data+'" value="'+full.address+'" />';
                        dataReturn = dataReturn + ' <a class="btn btn-primary editBtn" id="edit_'+data+'" href="#modalEdit" data-toggle="modal" title="edit" style="margin-right:10px"><span class="fa fa-pencil-alt"></span></a><a class="btn btn-danger deleteBtn" id="delete_'+data+'" href="#modalDelete" data-toggle="modal" title="delete"><span class="fa fa-trash"></span></a>';

                        dataReturn = dataReturn + ' </div>';


                        return dataReturn;
                    }
                }
            ],
            "oLanguage": {
                "sProcessing": "Processing...",
                "sZeroRecords": "No data to be displayed..."
            },
        });

        $("#employeeTable").on("click", ".editBtn", function(){
            var id = this.id;
            id = id.substring(5);

            $("#editId").val(id);
            $("#employeeEditName").val($("#employeeName_"+id).val());
            $("#employeeEditPhone").val($("#employeePhone_"+id).val());
            $("#employeeEditAddress").html($("#employeeAddress_"+id).val());
        });

        $("#employeeTable").on("click", ".deleteBtn", function(){
            var id = this.id;
            id = id.substring(7);

            $("#deleteId").val(id);
            $("#employeeDeleteName").html($("#employeeName_"+id).val());
        });

	});
</script>

@endsection
