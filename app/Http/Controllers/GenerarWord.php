<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GenerarWord extends Controller
{
    public function generar_word(Request $request)
    {

        $id_com = $request->input('idCom');

        $comodatos = DB::table('comodatos')
            ->join('hardwares', 'hardwares.idHard', 'comodatos.hardwares_idHard')
            ->join('funcionarios', 'funcionarios.idFunc', 'comodatos.funcRecibeComod')
            ->join('users', 'users.idFuncUser', 'comodatos.funcEntregaComod')
            ->join('modelos', 'modelos.idModelo', '=', 'hardwares.modelos_idModelo')
            ->join('marcas', 'marcas.idMarca', '=', 'modelos.marcas_idMarca')
            ->where('idComod', $id_com)
            ->first();

        /*
         *
         * HEADER GENERAL WORD
         *
         * */

        $word = new \PhpOffice\PhpWord\PhpWord();

        $sectionStyle = array(
            'marginTop' => 1000,
        );

        $section = $word->addSection($sectionStyle);

        $text = "GOBIERNO REGIONAL DEL BIOBÍO<w:br />DIVISIÓN DE ADMINISTRACIÓN Y FINANZAS<w:br />UNIDAD DE INFORMÁTICA";

        $word->addFontStyle('r2Style', array('bold' => true, 'italic' => false, 'size' => 10));
        $word->addParagraphStyle('p2Style', array('align' => 'center', 'spaceAfter' => 100));
        $word->addParagraphStyle('p3Style', array('align' => 'thaiDistribute', 'spaceAfter' => 100));

        $table = $section->addTable();
        for ($r = 1; $r <= 1; $r++) {
            $table->addRow();
            for ($c = 1; $c <= 1; $c++) {
                $table->addCell(500)->addImage('img\gore.jpg', array(
                        'width' => 60,
                        'height' => 80,
                        'marginTop' => -1,
                        'marginLeft' => -1,
                        'wrappingStyle' => 'behind'
                    )
                );
                $table->addCell(8000, array('valign' => 'center'))->addText($text, 'r2Style', 'p2Style');
            }
        }

        $text = "ACTA DE ENTREGA - FOLIO: ".$comodatos->idComod."/".date("Y", strtotime($comodatos->fechaIngComod));
        $section->addTextBreak();


        /*
         *
         * TEXTO SEGÚN TIPO DE CONTRATO
         *
         * */

        $section->addText($text, array('bold' => true, 'underline' => 'single', 'italic' => false, 'size' => 18, 'align' => 'center'), 'p2Style');

        /* ORDENAMIENTO POR TIPO DE CONTRATO
         * 1.- CONTRATA
         * 2.- HONORARIO
         * 3.- PLANTA
         * 4.- CÓDIGO DEL TRABAJO
         * 5.- CORE
         * 6.- EXTERNO
         * */

        if ($comodatos->contratoFunc == 1) {

            $text = "En Concepción, con fecha XX de XX de XXXX, se procede a realizar la entrega a " . strtoupper($comodatos->nombresFunc) . " " . strtoupper($comodatos->paternoFunc) . " " . strtoupper($comodatos->maternoFunc) . ", Funcionario(a) del Gobierno Regional, del siguiente objeto:";

        } elseif ($comodatos->contratoFunc == 2) {

            $text = "En Concepción, con fecha XX de XX de XXXX, se procede a realizar la entrega a " . strtoupper($comodatos->nombresFunc) . " " . strtoupper($comodatos->paternoFunc) . " " . strtoupper($comodatos->maternoFunc) . ", Funcionario(a) del Gobierno Regional, del siguiente objeto:";
        } elseif ($comodatos->contratoFunc == 3) {

            $text = "En Concepción, con fecha " . date("d", strtotime($comodatos->fechaIngComod)) . " de " . date("m", strtotime($comodatos->fechaIngComod)) . " de " . date("Y", strtotime($comodatos->fechaIngComod)) . ", se procede a realizar la entrega a " . strtoupper($comodatos->nombresFunc) . " " . strtoupper($comodatos->paternoFunc) . " " . strtoupper($comodatos->maternoFunc) . ", Funcionario(a) del Gobierno Regional, del siguiente objeto:";
        } elseif ($comodatos->contratoFunc == 4) {

            $text = "En Concepción, con fecha XX de XX de XXXX, se procede a realizar la entrega a " . strtoupper($comodatos->nombresFunc) . " " . strtoupper($comodatos->paternoFunc) . " " . strtoupper($comodatos->maternoFunc) . ", Funcionario(a) del Gobierno Regional, del siguiente objeto:";

        } elseif ($comodatos->contratoFunc == 5) {

            $text = "En Concepción, con fecha 04 de abril de 2018, se procede a realizar la entrega a título de comodato al" .
                " Sr. Jaime Vásquez Castillo, Consejero Regional del Gobierno Regional, del siguiente objeto:";

        } elseif ($comodatos->contratoFunc == 6) {

            $text = "En Concepción, con fecha XX de XX de XXXX, se procede a realizar la entrega a " . strtoupper($comodatos->nombresFunc) . " " . strtoupper($comodatos->paternoFunc) . " " . strtoupper($comodatos->maternoFunc) . ", Funcionario(a) del Gobierno Regional, del siguiente objeto:";

        }

        $section->addTextBreak();
        $section->addText($text, array('bold' => false, 'italic' => false, 'size' => 11, 'lang' => 'es-ES'), 'p3Style');

        $section->addTextBreak();

        $text2 = "
        FOLIO: " . $comodatos->fol_invHard . "<w:br />
        N°SERIE: " . $comodatos->numSerieHard . "<w:br />
        TIPO: " . $comodatos->tipoHard . "<w:br />
        MARCA/MODELO: " . $comodatos->marca . " " . $comodatos->modelo . "<w:br />
        ALMACENAMIENTO: " . $comodatos->capacidadHard . " GB <w:br />
        ESTADO: " . $comodatos->estadoEqComod . "<w:br />
        OBSERVACIONES: " . $comodatos->obsHard . "<w:br />";


        $table = $section->addTable();
        for ($r = 1; $r <= 1; $r++) {
            $table->addRow();
            for ($c = 1; $c <= 1; $c++) {
                $table->addCell(8000, array('valign' => 'center'))->addText($text2, array('bold' => false, 'italic' => false, 'size' => 11), 'p4Style');
            }
        }


        if ($comodatos->contratoFunc == 1) {

            $text = "";

        } elseif ($comodatos->contratoFunc == 2) {

            $text = "";

        } elseif ($comodatos->contratoFunc == 3) {

            $text = "";

        } elseif ($comodatos->contratoFunc == 4) {

            $text = "";

        } elseif ($comodatos->contratoFunc == 5) {

            $text = "Se deja constancia que el presente comodato se efectúa en pro del comodante conforme a lo dispuesto en el Art.2179" .
                " del Código Civil; en atención a lo dispuesto en el Art.43 bis de la Ley N°19.175, ya que es necesidad del Servicio" .
                " mantener una comunicación expedita con el Sr. Consejero Regional para los efectos de citaciones a sesiones de Consejo.";

        } elseif ($comodatos->contratoFunc == 6) {

            $text = "";

        }

        $section->addTextBreak();
        $section->addText($text, array('bold' => false, 'italic' => false, 'size' => 11, 'lang' => 'es-ES'), 'p3Style');

        $section->addTextBreak(4);

        $text4 = strtoupper($comodatos->name) . "<w:br /><w:br />ENTREGA <w:br />PROFESIONAL GOBIERNO REGIONAL";

        if ($comodatos->contratoFunc == 1) {

            $text5 = strtoupper($comodatos->nombresFunc) . " " . strtoupper($comodatos->paternoFunc) . " " . strtoupper($comodatos->maternoFunc) . "<w:br /><w:br />RECIBE <w:br />FUNCIONARIO GOBIERNO REGIONAL";

        } elseif ($comodatos->contratoFunc == 2) {

            $text5 = strtoupper($comodatos->nombresFunc) . " " . strtoupper($comodatos->paternoFunc) . " " . strtoupper($comodatos->maternoFunc) . "<w:br /><w:br />RECIBE <w:br />FUNCIONARIO GOBIERNO REGIONAL";

        } elseif ($comodatos->contratoFunc == 3) {

            $text5 = strtoupper($comodatos->nombresFunc) . " " . strtoupper($comodatos->paternoFunc) . " " . strtoupper($comodatos->maternoFunc) . "<w:br /><w:br />RECIBE <w:br />FUNCIONARIO GOBIERNO REGIONAL";

        } elseif ($comodatos->contratoFunc == 4) {

            $text5 = strtoupper($comodatos->nombresFunc) . " " . strtoupper($comodatos->paternoFunc) . " " . strtoupper($comodatos->maternoFunc) . "<w:br /><w:br />RECIBE <w:br />FUNCIONARIO GOBIERNO REGIONAL";

        } elseif ($comodatos->contratoFunc == 5) {

            $text5 = strtoupper($comodatos->nombresFunc) . " " . strtoupper($comodatos->paternoFunc) . " " . strtoupper($comodatos->maternoFunc) . "<w:br /><w:br />RECIBE <w:br />CONSEJERO REGIONAL";

        } elseif ($comodatos->contratoFunc == 6) {

            $text5 = strtoupper($comodatos->nombresFunc) . " " . strtoupper($comodatos->paternoFunc) . " " . strtoupper($comodatos->maternoFunc) . "<w:br /><w:br />RECIBE <w:br />FUNCIONARIO GOBIERNO REGIONAL";

        }


        $table = $section->addTable();
        for ($r = 1; $r <= 1; $r++) {
            $table->addRow();
            for ($c = 1; $c <= 1; $c++) {
                $table->addCell(8000, array('valign' => 'center'))->addText($text4, array('bold' => true, 'italic' => false, 'size' => 10), 'p2Style');
                $table->addCell(8000, array('valign' => 'center'))->addText($text5, array('bold' => true, 'italic' => false, 'size' => 10), 'p2Style');
            }
        }

        $section->addTextBreak();

        $text_5 = "Distribución:";
        $section->addText($text_5, array('bold' => false, 'italic' => false, 'underline' => 'single', 'size' => 12, 'lang' => 'es-ES'), 'p4Style');
        $text6 = "
•	Interesado.<w:br />
•	Unidad de Informática.<w:br />
•	DAF.";

        $section->addText($text6, array('bold' => false, 'italic' => false, 'size' => 12, 'lang' => 'es-ES'), 'p4Style');

        $section->addTextBreak(2);
        $text_foot = "ACTA GENERADA DIGITALMENTE";
        $section->addText($text_foot, array('bold' => false, 'italic' => false, 'size' => 8, 'lang' => 'es-ES'), 'p2Style');

        $escribir = \PhpOffice\PhpWord\IOFactory::createWriter($word, 'Word2007');

        $escribir->save(storage_path('COMODATO_'.$comodatos->idComod."_RUT_".$comodatos->rutFunc.'-UI.docx'));

        return response()->download(storage_path('COMODATO_'.$comodatos->idComod."_RUT_".$comodatos->rutFunc.'-UI.docx'));

    }
}
