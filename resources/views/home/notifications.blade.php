<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Agenda de Tareas y Elementos Relevantes</h2>
			</div>
		</div>
	</div>
</section>
<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="portfolio-categ filter">
					<li class="all active"><a href="#">Todo</a></li>
					@foreach ($tiposDatos as $tipoDato)
						<li class="{{$tipoDato}}">
							<a href="#">
								{{str_replace("NI", "Ñ",strtoupper(str_replace("_", " ", $tipoDato)))}}
							</a>
						</li>
					@endforeach
				</ul>
				<div class="clearfix">
				</div>
				<div class="row">
					<section id="pendientes">
						<ul id="thumbs" class="portfolio">
							@foreach($pendientes as $pendiente)
								<!-- Item  and Filter Name -->
								<li class="item-thumbs design col-xs-12 col-sm-6 col-md-4 col-lg-4" data-id="id-0" data-type="{{$pendiente->tipoDato}}">
									<div class="list-group">
										<a href="{{$pendiente->getURL()}}" class="{{$clasesCssPorTipo[$pendiente->tipoDato]}} list-group-item active">
											@if($pendiente->tipoDato == 'tareas')
												<i class="fa fa-tasks"> </i>
												{{$pendiente->titulo}}
											@elseif($pendiente->tipoDato == 'cumpleanios')
												<i class="fa fa-birthday-cake"> </i>
												Cumpleaños de {{$pendiente->getNombreCompleto()}}
											@elseif($pendiente->tipoDato == 'permisos_y_reposos')
												<i class="fa fa-calendar-times-o"> </i>
												En vigencia {{($pendiente->perRep) ? 'permiso' : 'reposo'}} de {{$pendiente->usuario->getNombreCompleto()}}
											@endif
										</a>
										<a href="" class="list-group-item {{$clasesCssPorTipo[$pendiente->tipoDato]}}">
											<span>
												@if($pendiente->tipoDato == "permisos_y_reposos")
													Fecha fin:
												@elseif($pendiente->tipoDato == 'tareas')
													Fecha estimada de entrega:
												@elseif($pendiente->tipoDato == 'cumpleanios')
													Fecha:
												@endif
											</span>
											@if($pendiente->tipoDato == "permisos_y_reposos")
												{{$pendiente->fecFin}}
											@elseif($pendiente->tipoDato == 'tareas')
												{{$pendiente->fecEst}}
											@elseif($pendiente->tipoDato == 'cumpleanios')
												El {{$pendiente->getDiaNacimiento()." de ".$pendiente->getMesNacimiento(true)}}
											@endif
										</a>
										<a href="{{($pendiente->tipoDato == 'tareas') ? $pendiente->getURL() : '#'}}" class="list-group-item {{$clasesCssPorTipo[$pendiente->tipoDato]}}">
											<span>Tipo: </span>
											@if($pendiente->tipoDato == 'permisos_y_reposos')
												{{$pendiente->getNombreAusencia()}}
											@else
												{{str_replace("ni", "ñ",ucwords(str_replace("_", " ", $pendiente->tipoDato)))}}
											@endif
											@if($pendiente->tipoDato == 'tareas')
												<div class="pull-right">
													<span>Estado: </span>{{$pendiente->estTar}}
												</div>
											@endif
										</a>

										<a href="{{($pendiente->tipoDato == 'cumpleanios') ? $pendiente->getURL() : $pendiente->usuario->getURL()}}" class="list-group-item {{$clasesCssPorTipo[$pendiente->tipoDato]}}">
											<span>{{($pendiente->tipoDato == 'cumpleanios') ? 'Cumpleañero: ' : 'Implicado: '}} </span>
											@if($pendiente->tipoDato == "permisos_y_reposos")
												{{$pendiente->usuario->getNombreCompleto()}}
											@elseif($pendiente->tipoDato == 'tareas')
												{{$pendiente->usuario->getNombreCompleto()}}
											@elseif($pendiente->tipoDato == 'cumpleanios')
												{{$pendiente->getNombreCompleto()}}
											@endif
										</a>
										<a href="#" class="list-group-item {{$clasesCssPorTipo[$pendiente->tipoDato]}}">
											<div class="progress {{($pendiente->tipoDato == 'tareas') ? 'progress-striped' : ''}} pb-md">
												<div class="progress-bar {{$pendiente->estadoCss}}" role="progressbar" aria-valuenow="{{$pendiente->porcentaje}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$pendiente->porcentaje.'%'}}">
													<span class="sr-only">{{$pendiente->porcentaje}}%</span>
												</div>
											</div>
										</a>
									</div><!-- /.list-group -->
								</li><!-- /.item-thumbs-->
							@endforeach
						</ul><!-- /#thumbs -->
					</section>
				</div>
			</div> <!-- /.col-lg-12 -->
		</div> <!-- /.row -->
	</div><!-- /.container -->
</section>
