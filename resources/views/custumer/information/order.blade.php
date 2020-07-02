<div class="container-fluid mt-3">
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">Status</th>
				<th scope="col">Name Custumer</th>
				<th scope="col">Address</th>
				<th scope="col">Phone</th>
				<th scope="col">Sale</th>
				<th scope="col">Time</th>
				<th scope="col">Total Money</th>
				<th scope="col" style="text-align: center;">Function</th>
			</tr>
		</thead>
		<tbody>
			<?php $stt = 1;?>
			@foreach ($data as $d)
			@if(! $d->shipping)
			<tr>
				<th scope="row"> Đang chờ Xác Nhận </th>
				<th> {{Auth::user()->nameUser}} </th>
				<td> {{$d->address}} </td>
				<td> {{$d->phone}} </td>
				<td> @if ($d->sale->percent == 0)
					<strong>Don't use Code</strong>
					@else
					<strong>{{$d->sale->code}}</strong> (<samp style="color: #092BFB;">{{$d->sale->percent}}%</samp>)
					@endif
				</td>
				<td>{{$d->created_at}}</td>
				<td> @if ($d->sale->percent == 0)
					<p>{{$d->sumMoney}}</p>
					@else
					<p> {{$d->sumMoney * ((100 - $d->sale->percent)/100)}}  </p>
					@endif
				</td>
				<td>
					<button type="button" data-toggle="modal" data-target="#myModal{{$stt}}">See details</button>

					<!-- Modal -->
					<div class="modal fade" id="myModal{{$stt}}" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Chi tiết đơn hàng</h4>
								</div>
								<div class="modal-body">
									@foreach (json_decode($d->product) as $p)
									<p>Name product: {{$p->name}}</p>
									<p>Quantity: {{$p->quantity}}</p>
									<p>Price: {{$p->price}}</p>
									<br><hr>
									@endforeach
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>

						</div>
					</div>
				</td>
				<td>
					<form action="/website/user/{{$d->id}}/cancelOrder" method="POST" accept-charset="utf-8">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Cancel order</button>
					</form>
				</td>
			</tr>
			<?php $stt++;?>
			@else
			<tr style="background-color: #D2F50D;">
				<th scope="row"><span style="color: #F04343;"> Đang Chuyển Hàng </span></th>
				<th> {{Auth::user()->nameUser}} </th>
				<td> {{$d->address}} </td>
				<td> {{$d->phone}} </td>
				<td> @if ($d->sale->percent == 0)
					<strong>Don't use Code</strong>
					@else
					<strong>{{$d->sale->code}}</strong> (<samp style="color: #092BFB;">{{$d->sale->percent}}%</samp>)
					@endif
				</td>
				<td>{{$d->created_at}}</td>
				<td> @if ($d->sale->percent == 0)
					<p>{{$d->sumMoney}}</p>
					@else
					<p> {{$d->sumMoney * ((100 - $d->sale->percent)/100)}}  </p>
					@endif
				</td>
				<td>
					<button type="button" data-toggle="modal" data-target="#myModal{{$stt}}">See details</button>

					<!-- Modal -->
					<div class="modal fade" id="myModal{{$stt}}" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Chi tiết đơn hàng</h4>
								</div>
								<div class="modal-body">
									@foreach (json_decode($d->product) as $p)
									<p>Name product: {{$p->name}}</p>
									<p>Quantity: {{$p->quantity}}</p>
									<p>Price: {{$p->price}}</p>
									<br><hr>
									@endforeach
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>

						</div>
					</div>
				</td>
				<td>
					<form action="/website/user/{{$d->id}}/confirm" method="POST" accept-charset="utf-8">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-success">Has received order</button>
					</form>
				</td>
			</tr>
			<?php $stt++;?>
			@endif
			@endforeach
		</tbody>
	</table>
</div>