<?php 
 
class ControllerContact{


	/*=============================================
	MOSTRAR 
	=============================================*/

	static public function ctrShowContact($item, $value){

		$table = "tb_contacts";

		$respuesta = ModelContact::mdlShowContact($table, $item, $value);

		return $respuesta;
	}



	public function ctrDescargarReporteGeneral(){

		if(isset($_GET["gral"])){

			$result = ControllerContact::ctrShowContact(null, null);

			 date_default_timezone_set('America/Mexico_City');

			 $name = "contacts-".$_GET["gral"].'-'.date('Ymd-His').'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel");
			header("Cache-Control: cache, must-revalidate");
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public");
			header('Content-Disposition:; filename="'.$name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'>
				<tr>
					<td style='font-weight:bold;border:1px solid #eee;background:#efefef;text-align:center;'>#</td>
					<td style='font-weight:bold;border:1px solid #eee;background:#efefef;text-align:center;'>NAME</td>
					<td style='font-weight:bold;border:1px solid #eee;background:#efefef;text-align:center;'>EMAIL</td>
					<td style='font-weight:bold;border:1px solid #eee;background:#efefef;text-align:center;'>PHONE </td>
					<td style='font-weight:bold;border:1px solid #eee;background:#efefef;text-align:center;'>MESSAGE</td>
					<td style='font-weight:bold;border:1px solid #eee;background:#efefef;text-align:center;'>CONTACT DATE</td>
				
				</tr>");

			foreach ($result as $key => $value) {

				echo utf8_decode("<tr>

								<td style='border:1px solid #eee;text-align:center;'>".($key+1)."</td>
								<td style='border:1px solid #eee;text-align:center;'>".$value["nombre"]."</td>
								<td style='border:1px solid #eee;text-align:center;'>".$value["email"]."</td>
								<td style='border:1px solid #eee;text-align:center;'>".$value["telefono"]."</td>
								<td style='border:1px solid #eee;text-align:center;'>".$value["mensaje"]."</td>
								<td style='border:1px solid #eee;text-align:center;'>".$value["created_at"]."</td></tr>");

			}

			echo "</table>";
		}


	}





	




}