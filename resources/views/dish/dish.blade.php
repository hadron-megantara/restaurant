@extends('layouts.app')

@section('content')

    <main class="content">
		<div class="container-fluid p-0">
            <div class="col-12 col-md-12 col-xl d-flex" style="margin-bottom:10px">
                <h1>Dish</h1>
            </div>

            <div class="col-12 col-md-12 col-xl" >
                <div class="pull-right">
                    <a href="/dish/form" class="btn btn-primary">
                        <span class="fa fa-plus"></span> Add new
                    </a>

                    <div class="clear row" style="margin-bottom:20px"></div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-xl d-flex">
				<div class="card flex-fill">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
                                <div class="table-responsive">
                                	<table id="dishTable" class="table-bordered" style="padding:">
                                		<thead>
                                			<tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Category</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Price</th>
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

<script type="text/javascript">
	$(document).ready(function(){
        var t = $('#dishTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('dish.list') }}',
            columns: [
                { data: 'name', name: 'name' },

                { data: 'price', name: 'price', render: function(data, type, full) {
                        data = data.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                        return 'Rp '+data;
                    }
                },
                { data: 'id', name: 'id', orderable: false, render: function(data, type, full) {
                        var dataReturn = '<div class="text-center"><input type="hidden" id="materialType_'+data+'" value="'+full.material_type+'" /><input type="hidden" id="materialLength_'+data+'" value="'+full.length+'" /><input type="hidden" id="materialColor_'+data+'" value="'+full.color+'" /><input type="hidden" id="materialColorId_'+data+'" value="'+full.color_id+'" /><input type="hidden" id="materialPrice_'+data+'" value="'+full.price+'" /><input type="hidden" id="materialDatePurchase_'+data+'" value="'+full.date_purchase+'" />';

                        if(full.status == 0){
                            dataReturn = dataReturn + ' <a class="btn btn-primary sendMaterialBtn" id="send_'+data+'" href="#materialModalSend" data-toggle="modal" title="Kirim ke Konveksi"><span class="fa fa-sign-out"></span></a>';
                        } else{
                            dataReturn = dataReturn +'<a class="btn btn-success" href="#" title="Terkirim ke Konveksi"><span class="fa fa-check"></span></a>';
                        }

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

	});
</script>

@endsection
