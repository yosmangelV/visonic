@extends('layouts.principal')
@section('title','Consulta Reparación')
@section('content')
	@include('partials.top_nav')
	@include('partials.header')
	<div class="top_wrapper totalWidth">
                           
	<!-- .header -->
    <!-- Page Head -->
	    <div class="header_page centered without_shadow no_parallax pageHead" >
	    	<div class="container">
				<h1><font class="verticalAlignInherit" ><font class="verticalAlignInherit">Consulta de reparación.</font></font></h1> 
	            <span class="divider"></span>
	        </div>    
	    </div> 
	   	<section id="content" class="composer_content sectionWhite">
	        <div class="container fullwidth" id="blog">
	            <div class="row">
	                <div class="span12">
	                	<div class="elementor elementor-941">
							<div class="elementor-inner">
								<div class="elementor-section-wrap">
									<section data-id="6a1478e9" class="elementor-element elementor-element-6a1478e9 elementor-section-stretched elementor-section-height-min-height elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-items-middle elementor-section elementor-top-section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section" style="width: 1583px; left: -191.5px;">
										<div class="elementor-container elementor-column-gap-default">
											<div class="elementor-row">
												<div data-id="46e6f30f" class="elementor-element elementor-element-46e6f30f elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
													<div class="elementor-column-wrap elementor-element-populated">
														<div class="elementor-widget-wrap">
															<div data-id="ee76818" class="elementor-element elementor-element-ee76818 elementor-widget elementor-widget-heading" data-element_type="heading.default">
																<div class="elementor-widget-container">
																	<h2 class="elementor-heading-title elementor-size-default">
																		<font class="verticalAlignInherit">Introduzca su número de serie para poder conocer su estatus de reparación. </font>
																	</h2>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
									<section data-id="03e3f05" class="elementor-element elementor-element-03e3f05 elementor-section-stretched elementor-section-content-top elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}" data-element_type="section" style="width: 1583px; left: -191.5px; padding-bottom: 50px">
									    <div class="elementor-container elementor-column-gap-default">
									        <div class="row totalWidth" >
									        	<form class="form-horizontal form-groups-bordered" name="formRepairSearch" id="formRepairSearch" method="POST" action="{{ route('search-repair') }}" >
													{{ csrf_field() }}
													<section>
										        		<div class="elementor-element elementor-column elementor-col-100 elementor-top-column" >
											            	<div class="elementor-row">
											            		<div class="elementor-element elementor-column elementor-col-40 elementor-top-column">
											            			<font class="pull-right verticalAlignInherit serieNumberFont">Número de serie: </font>
											            		</div>
											            		<div class="elementor-element elementor-column elementor-col-50 elementor-top-column">
											            			<input type="text" name="serie_number" onKeyUp="this.value=this.value.toUpperCase();" class="serieNumberInput">
											            			<button class="buttonMargin" id="btSearchRepair" name="btSearchRepair" type="submit" >
																		Buscar
																	</button>
											            		</div>
											            	</div>
											            </div>
										        	</section>
												</form>
									        	<br>
												
												<section id="repairData" name="repairData" style="display: none;">
													<hr/>
									        		<div class="elementor-element elementor-column elementor-col-100 elementor-top-column" >
														<div class="elementor-column-wrap elementor-element-populated">
															<div class="elementor-widget-wrap">
																<br>
																<br>
																<table class="tableSpace">
																	<thead>
																		<tr>
																			<th class="thTenWidth"></th>
																			<th class="thTwentyThreeWidth"></th>
																			<th class="thTenWidth"></th>
																			<th class="thTwentyThreeWidth"></th>
																			<th class="thTenWidth"></th>
																			<th class="thTwentyThreeWidth"></th>	
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td class="tdPaddingTwo">
																				<font  class="fontTdTable">Entrada: </font>
																			</td>
																			<td class="tdPaddingTwo">
																				<b><font id="fecha_entrada" name="fecha_entrada" class="verticalAlignInherit"></font></b>
																			</td>
																			<td class="tdPaddingTwo">
																				<font  class="fontTdTable">Marca: </font>
																			</td>
																			<td class="tdPaddingTwo">
																				<b><font id="marca" name="marca" class="verticalAlignInherit"></font></b>
																			</td>
																			<td class="tdPaddingTwo">
																				<font  class="fontTdTable">Modelo: </font>
																			</td>
																			<td class="tdPaddingTwo">
																				<b><font id="modelo" name="modelo" class="verticalAlignInherit" ></font></b>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<font  class="fontTdTable">Garantía: </font>
																			</td>
																			<td>
																				<b><font class="verticalAlignInherit" id="garantia" name="garantia"></font></b>
																			</td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																		</tr>
																	</tbody>
																</table>
																<table class="tableSpace">
																	<thead>
																		<tr>
																			<th class="thTenWidth"></th>
																			<th class="thNinetyWidth"></th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td class="tdPaddingTwo">
																				<font  class="fontTdTable">Estado: </font>
																			</td>
																			<td class="tdPaddingTwo">
																				<b><font class="verticalAlignInherit" id="estado" name="estado"></font></b>
																			</td>
																			
																		</tr>
																	</tbody>
																</table>
											            		<br>
																<br>
											            		
															</div>
														</div>
														
													</div>
									        	</section>
									        	<section id="emptyData" name="emptyData" style="display: none;">
													<hr/>
									        		<div class="elementor-container elementor-column-gap-default">
														<div class="elementor-row">
															<div class="elementor-element elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
																<div class="elementor-column-wrap elementor-element-populated">
																	<div class="elementor-widget-wrap">
																		<div class="elementor-element elementor-widget elementor-widget-heading" data-element_type="heading.default">
																			<div class="elementor-widget-container centerTextNOTDATA">
																				<h2 class="elementor-heading-title elementor-size-default">
																					<font class="verticalAlignInherit">No encontramos ese número de serie en nuestros registros </font>
																				</h2>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
									        	</section>
									        </div>
									    </div>
									</section>
								</div>
							</div>
						</div>
	                </div>
	            </div>
	        </div>	
		</section>
	    <a href="#" class="scrollup"><font class="verticalAlignInherit"><font class="verticalAlignInherit">Scroll</font></font></a> 
	</div>
	@include('partials.footer')
@endsection
@section('extrajsFooter')
	<!-- Specific Page Vendor -->
	<script src="{{ asset('js/reparacion/consulta.js')}}"></script>
@endsection
