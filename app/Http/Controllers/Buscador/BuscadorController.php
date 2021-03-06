<?php

namespace App\Http\Controllers\Buscador;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use App\Models\Buscador;
use JpGraph\JpGraph;
use Log;

class BuscadorController extends Controller
{
    
    public function getBuscador(Request $request)
    {
        // Log::info($request);

        $documento = $request['documento'];
        $email = $request['email'];
        
        if($documento && $email){
            $buscador = Buscador::where('documento',$documento)
            ->where('email',$email)
            ;
        }
        else if($documento){ 
            $buscador = Buscador::where('documento',$documento);
        }
        else{ 
            $buscador = Buscador::where('email',$email);
        }

        $buscador = $buscador
        ->with('tipoDocumento','prestadorUsuario','resultadosBuscador','resultadosBuscador.perfil','resultadosBuscador.estilo')
        ->first()
        ;
        
        $code = 200;
        
        return response()->json(
            [
                'status'=>'success',
                'data' => $buscador
            ],
            $code
        );
    }

    public function descargarPdf(Request $request, $documento){

        $buscador = Buscador::where('documento',$documento)
        ->with('tipoDocumento','prestadorUsuario','resultadosBuscador','resultadosBuscador.perfil','resultadosBuscador.estilo')
        ->first()
        ;

        $fileNamePDF =  public_path() . '/archivos_pdf/'. $buscador->documento.'.pdf';

        if(File::exists($fileNamePDF))
        {
            //No lo crea de nuevo
            return response()->download($fileNamePDF);
        }
        else
        {
            //Inicia creación del PDF
            $apppdf = public_path() . '/css/apppdf.css';
            $bootstrapcss = public_path() . '/css/bootstrap.min.css';
            $bootstrapjs = public_path() . '/js/bootstrap.min.js';
            $imagenRuta = public_path() . '/img';
            $imagenLogoSPE = public_path() . '/img/logo-spe.png';
            $imagenMinTrabajo = public_path() . '/img/logo-mintrabajo.png';
            $imagenCerebro = public_path() . '/img/cerebro_solo.png';

            $introSPE = 'La Unidad Administrativa Especial del Servicio Público de Empleo con la finalidad de fortalecer los servicios de orientación ocupacional y de preselección de la Red de Prestadores, durante los últimos años suscribió los contratos N .290 de 2015; N. 108 de 2018 y N. 64 de 2019 con el proveedor 4 Beyond SAS quien puso a disposición una plataforma online de su prueba Performance, a través de la cual se identificaban fortalezas y debilidades en los buscadores de empleo.
            
            Teniendo en cuenta que el último contrato finalizó, la Unidad del SPE presenta un aplicativo que le permitirá a la Red de Prestadores consultar los resultados de las pruebas que fueron aplicadas a los buscadores de empleo. Esta búsqueda la podrán realizar con el número del documento de identificación y/o el correo electrónico que la persona usó en la inscripción a la prueba.';

            $intro4B = 'Performance es una herramienta donde podrá identificar su Neurofortaleza, es decir saber dónde están las cosas que hace mejor, aquello en lo que naturalmente es bueno y que está asociado con sus fortalezas, así como identificar cuál es su Neurodebilidad, es decir dónde están las tareas que se le dificultan.';

            $titulo01 = 'Primera sección';

            $titulo01des01 = 'A continuación, podrá ver los 4 estilos de pensamiento y las características que definen cada estilo. Es importante recordar que un estilo de pensamiento no es mejor que otro, lo más importante es poder entender en dónde se influye con mayor naturalidad, identificando las tareas que se le facilitan y le gustan.';

            $titulo01des02 = 'La tabla de resultados le permitirá ver cuál es su estilo más usado según las siguientes categorías: tiempo libre, laboral, autopercepción, joven y adulto. Siempre los puntajes más altos están asociados a su modo de pensamiento preferido o usado en esas situaciones.';

            $titulo02 = 'Segunda sección';

            $titulo02des01 = 'Se define cuál es su NEUROFORTALEZA, es decir en qué estilo de pensamiento están las cosas que se le facilitan. Hay una descripción de las características asociadas a este estilo de pensamiento. También se describen las características y tareas asociadas a su NEURODEBILIDAD, es decir el estilo de pensamiento donde están las cosas que se le dificultan.';

            $titulo03 = 'Tercera sección';

            $titulo03des01 = 'Aquí se presentará el perfil de competencias que se refiere a las tareas y/o acciones que se le facilita y las características de la persona de acuerdo con las competencias desarrolladas; representa el comportamiento o forma de actuar hoy. Se presenta también un diagrama de barras con las ponderaciones por cada uno de los estilos de pensamiento según su perfil de competencia.';
            
            $imgBarras = public_path() . '/img/usuarios/barras_'.$documento.'.png';
            
            if(File::exists($imgBarras))
            {
                //No lo crea de nuevo
            }
            else
            {
                $bar = new JpGraph();
                $bar->module('bar');

                $plotline = new JpGraph();
                $plotline->module('plotline');

                $ei = $buscador->resultadosBuscador[0]->ei;
                $ai = $buscador->resultadosBuscador[0]->ai;
                $ad = $buscador->resultadosBuscador[0]->ad;
                $ed = $buscador->resultadosBuscador[0]->ed;

                $datay=array($ei,$ai,$ad,$ed);

                $barcolors = array("dodgerblue3","limegreen","brown3","gold");

                // Size of graph
                $width = 500;
                $height = 230;
                $top = 30;
                $bottom = 20;
                $left = 90;
                $right = 30;

                // Set the basic parameters of the graph
                $graph = new \Graph($width,$height,'auto');
                $graph->img->SetImgFormat('png');
                $graph->SetScale('textlin',0,120);
                $graph->yscale->ticks->Set(20,1);
                $graph->Set90AndMargin($left,$right,$top,$bottom);

                // Nice shadow
                $graph->SetShadow();

                // Setup labels
                $lbl = array("Analítico EI","Eficiente AI","Empático AD","Creativo ED");
                $graph->xaxis->SetTickLabels($lbl);

                // Label align for X-axis
                $graph->xaxis->SetLabelAlign('right','center','right');

                // Label align for Y-axis
                $graph->yaxis->SetLabelAlign('center','bottom');

                // Plot line
                $sline = new \PlotLine(HORIZONTAL,80,'dodgerblue1'); 
                $graph->Add($sline);

                // Create a bar pot
                $bplot = new \BarPlot($datay); 
                $graph->Add($bplot);
                $bplot->value->Show();

                $bplot->SetFillColor($barcolors);
                $bplot->SetWidth(0.6);
                
                //File::delete($imgBarras);
                $graph->Stroke($imgBarras);
            }       
            
            $pdf = \PDF::loadView('pdf', [
                'buscador' => $buscador,
                'apppdf' => $apppdf,
                'bootstrapcss' => $bootstrapcss,
                'bootstrapjs' => $bootstrapjs,
                'imagenRuta' => $imagenRuta,
                'imagenLogoSPE' => $imagenLogoSPE,
                'imagenMinTrabajo' => $imagenMinTrabajo,
                'introSPE' => $introSPE,
                'intro4B' => $intro4B,
                'titulo01' => $titulo01,
                'titulo01des01' => $titulo01des01,
                'titulo01des02' => $titulo01des02,
                'titulo02' => $titulo02,
                'titulo02des01' => $titulo02des01,
                'titulo03' => $titulo03,
                'titulo03des01' => $titulo03des01,
                'imagenCerebro' => $imagenCerebro,
                'imgBarras' => $imgBarras
            ]);
            $pdf->setOptions([
                'isPhpEnabled' => true,
                'defaultPaperSize' => 'letter'
            ]);

            $pdf->save($fileNamePDF);
            return $pdf->download($fileNamePDF);
        }
    }

    public function graph($documento){
        $buscador = Buscador::where('documento',$documento)
        ->with('tipoDocumento','prestadorUsuario','resultadosBuscador','resultadosBuscador.perfil','resultadosBuscador.estilo')
        ->first()
        ;

        $bar = new JpGraph();
        $bar->module('bar');

        $plotline = new JpGraph();
        $plotline->module('plotline');

        $ei = $buscador->resultadosBuscador[0]->ei;
        $ai = $buscador->resultadosBuscador[0]->ai;
        $ad = $buscador->resultadosBuscador[0]->ad;
        $ed = $buscador->resultadosBuscador[0]->ed;

        $datay=array($ei,$ai,$ad,$ed);

        $barcolors = array("dodgerblue3","limegreen","brown3","gold");

        // Size of graph
        $width = 500;
        $height = 230;
        $top = 30;
        $bottom = 20;
        $left = 90;
        $right = 30;

        // Set the basic parameters of the graph
        $graph = new \Graph($width,$height,'auto');
        $graph->img->SetImgFormat('png');
        $graph->SetScale('textlin',0,120);
        $graph->yscale->ticks->Set(20,1);
        $graph->Set90AndMargin($left,$right,$top,$bottom);

        // Nice shadow
        $graph->SetShadow();

        // Setup labels
        $lbl = array("Analítico EI","Eficiente AI","Empático AD","Creativo ED");
        $graph->xaxis->SetTickLabels($lbl);

        // Label align for X-axis
        $graph->xaxis->SetLabelAlign('right','center','right');

        // Label align for Y-axis
        $graph->yaxis->SetLabelAlign('center','bottom');

        // Plot line
        $sline = new \PlotLine(HORIZONTAL,80,'dodgerblue1'); 
        $graph->Add($sline);

        // Create a bar pot
        $bplot = new \BarPlot($datay); 
        $graph->Add($bplot);
        $bplot->value->Show();

        $bplot->SetFillColor($barcolors);
        $bplot->SetWidth(0.6);
        
        $graph->Stroke();

    }

}
