<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<title>Prueba Performance</title>		
	<meta name="viewport" content="width=device-width, user-scalabel=no">
    <link rel="stylesheet" href="{{$bootstrapcss}}">
    <link rel="stylesheet" href="{{$apppdf}}">
    <script src="{{$bootstrapjs}}"></script>
</head>
<body>
    <script type="text/php">
      if (isset($pdf)) {
        $font = $fontMetrics->getFont("Arial");
        $y = 800;
        $x = 280;
        $pdf->page_text($x, $y, "Página {PAGE_NUM}/{PAGE_COUNT}", $font, 7, array(0, 0, 0));
      }
    </script>
    <div class="container">

        <!-- Imágenes encabezado -->
        <section class="mt-3 datos-inicial">
            <div class="row">
                <div class="col">
                    <img class="float-left" alt="Servicio Público de Empleo" src="{{$imagenLogoSPE}}" width="182" height="75">
                </div>
                <div class="col">
                    <img class="float-right" alt="Ministerio del Trabajo" src="{{$imagenMinTrabajo}}" width="306" height="59">
                </div>	
            </div>
        </section>

        <section class="mt-5 section-preview">
            <div class="row mt-3"></div>
        </section>
        
        <section class="mt-3 section-preview">        
            <div class="border bg-grey shadow-sm rounded-lg p-4">
                <div>{!! nl2br($introSPE) !!}</div>
            </div>
        </section>

        <section class="mt-3 section-preview">
            <div class="border bg-blue shadow-sm rounded-lg px-3 pt-3">
                <div class="text-light text-height-1 text-uppercase">
                    <strong>{{$buscador->nombre}} {{$buscador->apellido}}</strong>
                </div>
                <div class="text-light text-height-1">
                    <small>
                        {{$buscador->tipoDocumento->tipo_documento}} {{$buscador->documento}}
                    </small>
                </div>
                <section class="mt-0 section-preview">
                    <div class="row mt-0"></div>
                </section>
                <div class="row">
                    <div class="col text-left">
                        <div class="text-light">
                            <small>
                                <strong>Prestador:</strong> 
                                {{$buscador->prestadorUsuario->nombre}} 
                                {{$buscador->prestadorUsuario->apellido}}
                            </small>
                        </div>						
                    </div>
                    <div class="col text-right">
                        <div class="text-light">
                            <small>
                                <strong>Fecha de la prueba:</strong> 
                                {{$buscador->fecha_prueba}}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-3 section-preview">
            <div class="border bg-grey shadow-sm rounded-lg p-3">
                <div>{{$intro4B}}</div>
            </div>
        </section>

        <section class="mt-3 section-preview">
            <div>
                <p class="titulo1">{{$titulo01}}</p>
                <p><small>{{$titulo01des01}}</small></p>
                <p class="titulo1">{{$titulo02}}</p>
                <p><small>{{$titulo02des01}}</small></p>
                <p class="titulo1">{{$titulo03}}</p>
                <p><small>{{$titulo03des01}}</small></p>
            </div>
        </section>

        <!-- Salto de página -->
        <div class="page-break"></div>

        <!-- Imágenes encabezado -->
        <section class="mt-3 datos-inicial">
            <div class="row">
                <div class="col">
                    <img class="float-left" alt="Servicio Público de Empleo" src="{{$imagenLogoSPE}}" width="182" height="75">
                </div>
                <div class="col">
                    <img class="float-right" alt="Ministerio del Trabajo" src="{{$imagenMinTrabajo}}" width="306" height="59">
                </div>	
            </div>
        </section>

        <section class="mt-4 section-preview">
            <div class="row mt-2"></div>
        </section>

        <section class="mt-1 section-preview">    
            <p class="titulo2">{{$titulo01}}</p>
        </section>

        <section class="mt-3 section-preview">    
            <p>{!! nl2br($titulo01des01) !!}</p>
        </section>

        <!-- Aquí imagen cerebro -->
        <section class="mt-3 section-preview">    
           <div class="row align-items-center">
                <table class="table-borderless mx-auto">
                    <tr>
                        <td><strong>Analítico</strong></td>
                        <td rowspan="15">
                            <img class="center-block" alt="Estilos de pensamiento" src="{{$imagenCerebro}}" width="192" height="238">
                        </td>
                        <td><strong>Creativo</strong></td>
                    </tr>
                    <tr>
                        <td><small>Lógico</small></td>
                        <td><small>Visionario</small></td>
                    </tr>
                    <tr>
                        <td><small>Analítico</small></td>
                        <td><small>Innovador</small></td>
                    </tr>
                    <tr>
                        <td><small>Confrontador</small></td>
                        <td><small>Metafórico</small></td>
                    </tr>
                    <tr>
                        <td><small>Toma de Decisiones</small></td>
                        <td><small>Toma Riesgos</small></td>
                    </tr>
                    <tr>
                        <td><small>Orientado a resultados</small></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></br></td>
                        <td></br></td>
                    </tr>
                    <tr>
                        <td></br></td>
                        <td></br></td>
                    </tr>                 
                    <tr>
                        <td><strong>Eficiente</strong></td>
                        <td><strong>Empático</strong></td>
                    </tr>
                    <tr>
                        <td><small>Ordenado</small></td>
                        <td><small>Sentido de Pertenencia</small></td>
                    </tr>
                    <tr>
                        <td><small>Procedimental</small></td>
                        <td><small>Armonizador</small></td>
                    </tr>
                    <tr>
                        <td><small>Productivo</small></td>
                        <td><small>Conciliador</small></td>
                    </tr>
                    <tr>
                        <td><small>Cauteloso</small></td>
                        <td><small>Sensitivo</small></td>
                    </tr>
                    <tr>
                        <td><small>Eficiente</small></td>
                        <td><small>Empático</small></td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="mt-1 section-preview">    
            <p>{!! nl2br($titulo01des02) !!}</p>
        </section>

        <!-- Aquí tabla competencias -->
        <section class="mt-3 section-preview">
            <div class="row align-items-center">
                <table class="table-sm table-borderless text-center w-auto mx-auto">
                    <thead class="p-3 alert">
                        <tr>
                            <th>Competencias</th>
                            <th>Analítico EI</th>
                            <th>Eficiente AI</th>
                            <th>Empático AD</th>
                            <th>Creativo ED</th>
                        </tr>
                    </thead>
                    <tr class="table-primary">
                        <td>Joven</td>
                        <td>{{$buscador->resultadosBuscador[0]->joven_ai}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->joven_ei}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->joven_ad}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->joven_ed}}</td>
                    </tr>
                    <tr class="table-primary">
                        <td>Adulto</td>
                        <td>{{$buscador->resultadosBuscador[0]->ei}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->ai}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->ad}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->ed}}</td>
                    </tr>
                    <tr class="bg-primary">
                        <td>Tiempo Libre</td>
                        <td>{{$buscador->resultadosBuscador[0]->libre_ei}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->libre_ai}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->libre_ad}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->libre_ed}}</td>
                    </tr>
                    <tr class="bg-primary">
                        <td>Laboral</td>
                        <td>{{$buscador->resultadosBuscador[0]->laboral_ei}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->laboral_ai}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->laboral_ad}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->laboral_ed}}</td>
                    </tr>
                    <tr class="bg-primary">
                        <td>Autopercepción</td>
                        <td>{{$buscador->resultadosBuscador[0]->auto_ei}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->auto_ai}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->auto_ad}}</td>
                        <td>{{$buscador->resultadosBuscador[0]->auto_ed}}</td>
                    </tr>
                </table>
            </div>
        </section>

        <!-- Salto de página -->
        <div class="page-break"></div>

        <!-- Imágenes encabezado -->
        <section class="mt-3 datos-inicial">
            <div class="row">
                <div class="col">
                    <img class="float-left" alt="Servicio Público de Empleo" src="{{$imagenLogoSPE}}" width="182" height="75">
                </div>
                <div class="col">
                    <img class="float-right" alt="Ministerio del Trabajo" src="{{$imagenMinTrabajo}}" width="306" height="59">
                </div>	
            </div>
        </section>

        <section class="mt-4 section-preview">
            <div class="row mt-2"></div>
        </section>

        <section class="mt-1 section-preview">    
            <p class="titulo2">{{$titulo02}}</p>
        </section>

        <section class="mt-3 section-preview">    
            <p>{!! nl2br($titulo02des01) !!}</p>
        </section>

        <!-- Aquí imagen neurofortaleza y texto neurofortaleza -->
        <section class="mt-3 section-preview">    
            <div class="border text-center shadow-sm rounded-lg p-3">
                <table class="table-borderless mx-auto tablaneuro">
                    <tr>
                        <td class="w-20">
                            <img class="center-block" alt="Perfil de competencia" src="{{$imagenRuta}}/estilo_{{$buscador->resultadosBuscador[0]->estilo->estilo}}.png" width="140" height="160">
                        </td>
                        <td class="w-80 text-left">
                            <p>
                                <small><strong>NEUROFORTALEZA: {{$buscador->resultadosBuscador[0]->estilo->estilo}}</strong></small>
                            </p>                                                        
                            <p>
                                <small>{{$buscador->resultadosBuscador[0]->estilo->estilo_desc}}</small>			
                            </p>                            
                        </td>
                    </tr> 
                    <tr>
                        <td class="text-rigth">
                            <small><strong>Descriptor General:</strong></small>
                        </td>
                        <td class="text-left">
                            <small>{{$buscador->resultadosBuscador[0]->estilo->estilo_desc_general}}</small>                          
                        </td>
                    </tr> 
                    <tr>
                        <td class="text-rigth">
                            <small><strong>Adjetivos que lo describen:</strong></small>
                        </td>
                        <td class="text-left">
                            <small>{{$buscador->resultadosBuscador[0]->estilo->estilo_desc_adjetivo}}</small>                           
                        </td>
                    </tr> 
                    <tr>
                        <td class="text-rigth">
                            <small><strong>Toma de decisión:</strong></small>
                        </td>
                        <td class="text-left">
                            <small>{{$buscador->resultadosBuscador[0]->estilo->estilo_desc_decision}}</small>                            
                        </td>
                    </tr>   
                </table>
            </div>            
        </section>

        <!-- Aquí imagen neurodebilidad y texto neurodebilidad -->
        <section class="mt-3 section-preview">    
            <div class="border text-center shadow-sm rounded-lg p-3">
                <table class="table-borderless mx-auto tablaneuro">
                    <tr>
                        <td class="w-20">
                            <img class="center-block" alt="Perfil de competencia" src="{{$imagenRuta}}/opuesto_{{$buscador->resultadosBuscador[0]->estilo->opuesto}}.png" width="140" height="160">
                        </td>
                        <td class="w-80 text-left">
                            <p>
                                <small><strong>NEURODEBILIDAD: {{$buscador->resultadosBuscador[0]->estilo->opuesto}}</strong></small>
                            </p>                                                        
                            <p>
                                <small>{{$buscador->resultadosBuscador[0]->estilo->opuesto_desc}}</small>			
                            </p>                            
                        </td>
                    </tr>                    
                </table>
            </div>            
        </section>

        <!-- Salto de página -->
        <div class="page-break"></div>

        <!-- Imágenes encabezado -->
        <section class="mt-3 datos-inicial">
            <div class="row">
                <div class="col">
                    <img class="float-left" alt="Servicio Público de Empleo" src="{{$imagenLogoSPE}}" width="182" height="75">
                </div>
                <div class="col">
                    <img class="float-right" alt="Ministerio del Trabajo" src="{{$imagenMinTrabajo}}" width="306" height="59">
                </div>	
            </div>
        </section>

        <section class="mt-4 section-preview">
            <div class="row mt-2"></div>
        </section>

        <section class="mt-1 section-preview">    
            <p class="titulo2">{{$titulo03}}</p>
        </section>

        <section class="mt-3 section-preview">    
            <p>{!! nl2br($titulo03des01) !!}</p>
        </section>

        <!-- Aquí imagen competencia y texto competencia -->
        <section class="mt-3 section-preview">    
            <div class="border text-center shadow-sm rounded-lg p-3">
                <table class="table-borderless mx-auto tablaneuro">
                    <tr>
                        <td class="w-20">
                            @php
                            $imgPerfil = $imagenRuta.'/perfil_'.sprintf('%02d', $buscador->resultadosBuscador[0]->perfil->id_perfil).'.png';
                            @endphp
                            <img class="center-block" alt="Perfil de competencia" src="{{$imgPerfil}}" width="140" height="160">
                        </td>
                        <td class="w-80 text-left">
                            <p>
                                <small><strong>PERFIL DE COMPETENCIAS: {{$buscador->resultadosBuscador[0]->perfil->perfil}}</strong></small>
                            </p>                                                        
                            <p>
                                <small>{{$buscador->resultadosBuscador[0]->perfil->desc_perfil}}</small>			
                            </p>                            
                        </td>
                    </tr>                    
                </table>
            </div>            
        </section>

        <!-- Aquí gráfico de barras -->
        <section class="mt-3 section-preview">    
           <div class="row align-items-center">
                <table class="table-borderless mx-auto">
                    <tr>
                        <td>
                        <img class="center-block" alt="Gráfico de competencias" src="{{$imgBarras}}" width="500" height="230">
                        </td>
                    </tr>
                </table>
            </div>
        </section>

    </div>
    
</body>
</html>