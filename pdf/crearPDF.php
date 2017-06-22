<?php
require_once('../libraries/fpdf/fpdf.php');
require_once('myDBC.php');

 
class PDF extends FPDF
{
    function Footer() // Pie de página
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Ser el mundo ser nosotros..To be in the world to be ourself...wíinikil yóok´ol kaab, jée bixo´one´'),'T',0,'C');
    }
 
    function Header() //Encabezado
    {
        $this->SetFont('Arial','B',17);
 
        //$this->Line(10,10,206,10);
        $this->Line(10,35.5,206,35.5);
 
        //$this->Cell(60,25,'',0,0,'C',$this->Image('uni.png', 172,12, 19)); //img derecha
        $this->Cell(0,25,'Universidad Intercultural Maya de Quintana Roo',0,0,'R', $this->Image('escudo.png',20,12,40,20));
        
 
        $this->Ln(25);
    }
 
    function ImprimirTexto($file)
    {
        $txt = file_get_contents($file);//file_get_contents - Transmite un fichero entero a una cadena
        $this->SetFont('Arial','',12);
        $this->MultiCell(0,5,$txt);
 
    }
 
}//fin clase PDF
            //Crear objeto y recibir la opción del combo box
            $baseDatos = new myDBC();
            $matriculaAlumno = $_POST['matricula'];
            //Se obtiene un arreglo con la información del alumno
            $info_alumno = $baseDatos->obtenerAlumno($matriculaAlumno);
            //Creamos los arrays para preg_replace
            $patrones = array();
            $sustituciones = array();
            //Obtenemos el texto para buscar y reemplazar dentro de éste
            $cadena = file_get_contents('texto.txt');
            //Patrones a buscar
            $patrones[0] = '/#1/';
            $patrones[1] = '/#2/';
            $patrones[2] = '/#3/';
            $patrones[3] = '/#4/';
            $patrones[4] = '/#5/';
            $patrones[5] = '/#6/';

 
            //Con estas líneas se cambian los índices. Necesario como
            //en el ejemplo anterior
            $dm = 7;
            foreach($info_alumno as $valor)
            {
                $sustituciones[$dm] = $valor;
                $dm--;
            }
 
            //Se hacen las sustituciones a la cadena
            $cadenaCambiada = preg_replace($patrones, $sustituciones, $cadena);
            //busca en $cadena coincidencias de $patrones y las remplaza con $sustituciones

            $otrodato = array($_POST['fecha_ausencia'], utf8_decode($_POST['motivo']));
            $patron[0] = '/#7/';
            $patron[1] = '/#8/';
            //Obtenemos el texto para buscar y reemplazar dentro de éste
            $cadena2 = file_get_contents('ausencia.txt');
            $cambio2 = preg_replace($patron, $otrodato, $cadena2);

            $fecha=utf8_decode("José María Morelos, Quintana Roo a ".$_POST['fechahoy']);
            $pdf = new PDF();             //Crea objeto PDF
            $pdf->AddPage('P', 'Letter'); //Vertical, Carta
            $pdf->SetFont('Arial','',12); //Arial, negrita, 12 puntos
            
            $pdf->Ln();
            $pdf->Cell(0,0,$fecha,0,1,'R');
            $pdf->Ln();
            //$pdf->ImprimirTexto('textoFijo.txt'); //imprime un texto fijo
            $pdf->Ln();
            $pdf->MultiCell(0, 5, $cadenaCambiada); //Imprime el texto cambiado
            $pdf->MultiCell(0, 4, $cambio2);
            $Aten="ATENTAMENTE";
            $line="_________________________________________________________";
            $tutor="Nombre y Firma del tutor";
            $pdf->Cell(0,20,$Aten,0,1,'C');
            $pdf->Ln();
            $pdf->Cell(0,5,$line,0,1,'C');

            $pdf->Cell(0,10,$tutor,0,1,'C');

            $pdf->Output();               //Salida al navegador
 
?>