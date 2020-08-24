<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parser extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		//$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->view->render();
	}

	public function generate()
	{
		// recojo las imagen del logo
		$config['allowed_types'] = 'jpg|png';
		$config['upload_path'] = './images/logos';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('logoPrincipal');




		//recojo las imagenes del catalogo las decomprimo y las almacenop
		$this->load->library('zip');
		$config2['upload_path']          = './images/catalogo';
		$config2['allowed_types']        = 'zip|rar';
		$this->load->library('upload', $config2);
		$this->upload->initialize($config2);
		$this->upload->do_upload('zip');
		$this->Unzip('./images/catalogo/'.$_FILES['zip']['name'],'./images/unzip/');


		// recojo la imagen


		//recojo datos
		$mpdf = new \Mpdf\Mpdf();
		$nombre = $this->input->post('nombre', TRUE);
		$direccion = $this->input->post('direccion', TRUE);
		$web = $this->input->post('web', TRUE);
		$mail = $this->input->post('mail', TRUE);
		$logo = $this->input->post('logoPrincipal', TRUE);


		//los convierto en pdf
		//cabecera
		$html = "<link href='https://fonts.googleapis.com/css2?family=Rubik&display=swap' rel='stylesheet'> 
				<style> 
		
				
			@page {
 					margin-top:200px;
 					background-image: url('images/fijas/header.jpg');
					background-repeat: no-repeat;
					font-family: 'Rubik', sans-serif;
					margin-bottom:200px;
				  }
			
			.logo{
					position: absolute;
					top: 15px;
				}
				
						
			.dentro {
					position: relative;
					height: 100px;		
					}
					
					
			.title p{
				font-family: 'Rubik', sans-serif;
					font-size: 30px;
					border-right: 6px solid #f89a20 ;
					color:#000 ;
					text-transform: capitalize ;	
					padding-left:75%; 
					}
					
					
			  table{
					width: 100%;	
					margin-bottom: 10px;
					}
					
					

			.izquierda{
						width:20% ;
					  }
					 
			.image{
					 width: 100px;
					 height: 100px;
					 }
					 
					 
			.centro{
					width: 80%;
					}
					 
					  
				.id{
					 font-size: 14px;
					 border-left: 3px solid #f89a20 ;
					 font-weight: bold;
					 }
				
		
			  .pvp {
					color:#f89a20 !important;
					font-family: 'Rubik', sans-serif;
					font-size: 24px;
					font-weight:bold;
					padding-right:20px;
					}
					
				hr{
					height: 0.5px;
					background-color: darkgrey;
					padding: 0px;
					margin: 0px;
					}
					
					
			.body1{
					color:#000;
					font-size: 18px;
					font-family: 'Rubik', sans-serif;
					}
					
			.body2{		
					padding-left: 14px;	
					color: #f89a20;
					font-family: 'Rubik', sans-serif;
					}
					
			.texto2{
					color:#000;
					font-family: 'Rubik', sans-serif;
				}								
							
			footer{
				position: absolute;
				right: 100px;
				bottom: 100px;
				width: 100%;
				text-align: right;
			}
			
			footer small{
				color:#000;
				font-size: 14px;
				font-family: 'Rubik', sans-serif;
			}
					
					
					
			</style>";


		//	CSV
		// recojo el csv

		$configCsv['allowed_types'] = 'csv';
		$configCsv['upload_path'] = './csv';
		$this->load->library('upload', $configCsv);
		$this->upload->initialize($configCsv);

		if (!$this->upload->do_upload('csv')) {
			//	die("error csv");
		}

		$csv = base_url() . "/csv/" . $_FILES['csv']['name'];
		//	$handle = array_map('str_getcsv', file($csv));
		$handle = fopen($csv, "r");
		fgetcsv($handle, 10000, ",");
		$categoria = "";

		while (($row = fgetcsv($handle, 10000, ";")) != FALSE) //get row vales
		{
			// cabecera

			$logoNombre = $_FILES['logoPrincipal']['name'];
			$html = $html . "<div class='logo '><img   src='images/logos/" . $logoNombre . "'>";

			// ¿no hay categorias?
			/*if ($row[0] != $categoria) {
				$category = "<div class='title'><p>$row[0]</p></div>";
			} else {
				$category = "<div class='title'></div>";
			}*/



			//Separto los items de la informacion
			// los meto en una lista
			$lista='';
			$i=0;
			$items= explode("•",$row[3]);
			foreach ($items as $item){
				if($i!=0){
					$lista=$lista.'<li><span class="texto2">'.$item.'</span></li>';
				}
				$i++;
			}



			$html = $html ."</div>";
			// cuerpo
			$html = $html."
				<table>	
				 <tr>
					<td class='izquierda'><img class='image' src='images/unzip/".$row[0].".jpg'></td>
					<td class='centro'>
						<table>
							<tr>
								<td>
									<div class='id'>&nbsp;&nbsp;$row[0]</div>  
								</td>
								<td>
									 <div><p class='pvp'>$row[1]</p></div>
								</td>
							</tr>
							<tr>
								<td  colspan='2'>
									<hr>
								</td>
								
							</tr>
							<tr>
								<td>
									<h4 class='body1'>&nbsp;$row[2]</h4>
										
										<ul class='body2' >
											$lista
										</ul>
									
									
								</td>
							</tr>
						</table>
					</td>
				  </tr>
				</table>
				<footer>
					<small>" . $nombre . "&nbsp;" . $direccion . "</small><br>
					<small>" . $web . "&nbsp;" . $mail . "</small>
				</footer>
				";
		//	$categoria = $row[0];
		}


		$mpdf->WriteHTML($html);
		$mpdf->Output();
		//elimino todas las imagenes y archivos
		unlink("images/logos/" . $logoNombre);
		unlink("csv/" . $csv);
		unlink("images/catalogo/" . $logoNombre);
	}








	public function Unzip($source, $destination)
	{
		if (extension_loaded('zip') === true)
		{


			if (file_exists($source) === true)
			{

				$zip = new ZipArchive();



				if ($zip->open($source) === true)
				{


					$zip->extractTo($destination);

				}
				return $zip->close();
			}
		}
		return false;
	}


}
