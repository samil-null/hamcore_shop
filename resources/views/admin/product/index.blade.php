@extends('admin.layout.index')

@section('content')
	<table class="table align-items-center table-flush">
	    <thead class="thead-light">
	      <tr>
	        <th scope="col">Имя</th>
	        <th scope="col">E-mail</th>
	        <th scope="col">Статус</th>
	        <th scope="col"></th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach ($products as $product)
		      <tr>
		        <th scope="row">
		          <div class="media align-items-center">
		            <a href="#" class="avatar rounded-circle mr-3">
		              <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
		            </a>
		            <div class="media-body">
									<a href="{{route('admin.products.show',['id' => $product->id])}}">
		              	<span class="mb-0 text-sm">{{$product->name}}</span>
		              </a>
		            </div>
		          </div>
		        </th>
		        <td>
          
		        </td>
		        <td>

		        </td>
		        <td class="text-right">
		          <div class="dropdown">
		            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		              <i class="fas fa-ellipsis-v"></i>
		            </a>
		            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a class="dropdown-item destroy-user-btn"  data-toggle="modal" data-target="#modal-notification" data-destroy-id="{{$product->id}}">Удалить</a>
		              <a class="dropdown-item" href="#">Another action</a>
		              <a class="dropdown-item" href="#">Something else here</a>
		            </div>
		          </div>
		        </td>
		      </tr>
	      @endforeach
	    </tbody>
		</table>
		
		<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
			<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
					<div class="modal-content bg-gradient-danger">
						
							<div class="modal-header">
									<h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
									</button>
							</div>
							
							<div class="modal-body">
								
									<div class="py-3 text-center">
											<i class="ni ni-bell-55 ni-3x"></i>
											<h4 class="heading mt-4">You should read this!</h4>
											<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									</div>
									
							</div>
							
							<div class="modal-footer">
									<button type="button" class="btn btn-white" id="final-step-destroy-user">Ok, Got it</button>
									<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
							</div>
							
					</div>
			</div>
		</div>
		</div>

		<script>
			
		</script>
@endsection

@section('actions')
	<a href="{{route('admin.users.create')}}" type="button" class="btn btn-primary btn-sm">Добавить пользователя</a>
	<div class="nav-item dropdown">
      <a class="nav-link nav-link-icon" href="#" id="navbar-success_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ni ni-settings-gear-65"></i>
        <span class="nav-link-inner--text d-lg-none">Settings</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-success_dropdown_1">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
@endsection