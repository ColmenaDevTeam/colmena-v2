<div class="row">
	<div class="col-xs-12">
		<div id="timeline">
			<ul id="dates">
				@foreach($topHoy as $item)
					<li><a href="{{$item->idTag}}">{{$item->idTag}}</a></li>
					<!--<li><a href="#1930">1930</a></li>-->
				@endforeach
			</ul>
			<ul id="issues">
				@foreach($topHoy as $item)
					<li id="{{$item->idTag}}">
						@if($item->tipoDato == 'cumpleanios')
							<img src="/img/cartelera/cumpleanios.png" width="256" height="256" />
							<h1>{{$item->getNombreCompleto()}}</h1>
							<p>
								Está de cumpleaños el día de hoy
							</p>
						@elseif($item->tipoDato == 'tareas')
							<img src="/img/cartelera/tarefas.png" width="256" height="256" />
							<p>
								Tarea pendiente por entregar el día de hoy:
								<a href="{{$item->getURL()}}">{{$item->titulo}}</a><br>
								Responsable: {{$item->usuario->getNombreCompleto()}}<hr>
								{{$item->detalle}}
							</p>
						@elseif($item->tipoDato == 'permisos_y_reposos')
							<img src="{{$item->perRep ? '/img/cartelera/reposos.png' : '/img/cartelera/medical-logo.png'}}" width="256" height="256" />
							<h1>{{$item->usuario->getNombreCompleto()}}</h1>
							<p>
								Está de {{$item->perRep ? 'Permiso' : 'Reposo'}} hasta: {{$item->fecFin}}<br>
								<a href="{{$item->getURL()}}">Ver</a><hr>
								{{$item->detalle}}
							</p>
						@endif
					</li>
				@endforeach
			</ul>
			<div id="grad_left"></div>
			<div id="grad_right"></div>
			<a href="#" id="next">+</a>
			<a href="#" id="prev">-</a>
		</div><!-- /.timeline-->
	</div><!-- /.col-xs-12 -->
</div><!-- /.row -->
