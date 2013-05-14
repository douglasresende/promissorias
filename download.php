<?php 
/** 
* Autor: Douglas R Camargo/BR - douglas@maxstudio.com.br 
* Date : 13/05/2013
* 
* Description: Gerador de promissórias.
* 
* 
*/

// DADOS DA PROMISSORIA
$quantidade = $_POST['quantidade'];
$data       = $_POST['data']; // "01/01/2013";
$valor      = $_POST['valor']; // "500,00";
// DADOS DO VENDEDOR
$v_nome 		= utf8_decode($_POST['v_nome']); // "Ilma Francisca Resende Camargo";
$v_cpfcnpj 	= $_POST['v_cpfcnpj']; // '111.111.111-11';
// DADOS DO CLIENTE
$c_nome 		= utf8_decode($_POST['c_nome']); // 'Nome do Cliente';
$c_cpfcnpj 	= $_POST['c_cpfcnpj']; // '222.222.222-22';
$c_endereco = utf8_decode($_POST['c_endereco']); // 'Rua C, Qd. X, Lt. X';
$c_bairro 	= utf8_decode($_POST['c_bairro']); // 'Jardim América';
$c_cep 			= $_POST['c_cep']; // '74000-000';
$c_cidade 	= utf8_decode($_POST['c_cidade']); // 'Goiânia';
$c_estado 	= utf8_decode($_POST['c_estado']); // 'Goiás';


include_once("inc/functions.php");

$filename='inc/contrato.rtf';
$fp=fopen($filename,'r');

$output=fread($fp,filesize($filename));

fclose($fp);

$espacoG = '_______________________________________________________';
$espacoM = '________________________';
$espacoP = '_______';

$temp = '';

for($i=1;$i<=$quantidade;$i++)
{
	$temp .= ' '.$i.'\\\'ba}{\\b\\f36\\fs18\\cf8\\insrsid6766704\\charrsid13303952 _}{\\b\\f36\\fs18\\insrsid6766704PARCELA: Vencimento:}{\\b\\f36\\fs18\\cf8\\insrsid6766704\\charrsid13303952 _}{\\b\\f36\\fs18\\insrsid6766704 '.date('d/m/Y',mktime(0,0,0,substr($data,3,2)+($i-1),substr($data,0,2),substr($data,6,4))).' R$}{\\b\\f36\\fs18\\cf8\\insrsid6766704\\charrsid13303952 _}{\\b\\f36\\fs18\\insrsid6766704 '.$valor.'\\line ';
}

$output=str_replace('=todas_parcelas=',
					$temp,
					$output);

$temp2 = '';

for($i=1;$i<=$quantidade;$i++)
{
	$temp2 .= '}{\\f40\\fs16\\insrsid6451794\\charrsid4539359  
\\par }\\trowd \\irow0\\irowband0\\lastrow \\ts16\\trgaph70\\trrh1134\\trleft-108\\trkeep\\trbrdrt\\brdrs\\brdrw10 \\trbrdrl\\brdrs\\brdrw10 \\trbrdrb\\brdrs\\brdrw10 \\trbrdrr\\brdrs\\brdrw10 \\trbrdrh\\brdrs\\brdrw10 \\trbrdrv\\brdrs\\brdrw10 
\\trftsWidth1\\trftsWidthB3\\trftsWidthA3\\trautofit1\\trpaddl108\\trpaddr108\\trpaddfl3\\trpaddft3\\trpaddfb3\\trpaddfr3\\tblrsid4539359\\tbllkhdrrows\\tbllklastrow\\tbllkhdrcols\\tbllklastcol \\clvertalt\\clbrdrt\\brdrs\\brdrw10 \\clbrdrl\\brdrs\\brdrw10 \\clbrdrb
\\brdrs\\brdrw10 \\clbrdrr\\brdrs\\brdrw10 \\cltxbtlr\\clftsWidth3\\clwWidth1908\\clshdrawnil \\cellx1800\\clvertalt\\clbrdrt\\brdrs\\brdrw10 \\clbrdrl\\brdrs\\brdrw10 \\clbrdrb\\brdrs\\brdrw10 \\clbrdrr\\brdrs\\brdrw10 \\cltxlrtb\\clftsWidth3\\clwWidth8774\\clshdrawnil \\cellx10574
\\pard\\plain \\ql \\li0\\ri0\\widctlpar\\intbl\\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\pararsid2776984\\yts16 \\fs24\\lang1046\\langfe1046\\cgrid\\langnp1046\\langfenp1046 {\\f40\\fs16\\insrsid6451794\\charrsid4539359 AVALISTA(S)
\\par 
\\par ______________________________\\line CPF - CNPJ
\\par 
\\par ______________________________
\\par CPF - CNPJ\\cell }\\pard \\qj \\li0\\ri0\\widctlpar\\intbl\\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\pararsid4539359\\yts16 {\\b\\f40\\fs16\\insrsid6451794\\charrsid4539359 N\\\'ba:}{\\b\\f40\\fs16\\cf8\\insrsid6451794\\charrsid4539359 _}{
\\f40\\fs16\\insrsid14431594\\charrsid4539359 '.$i.'/'.$quantidade.'}{\\f40\\fs16\\insrsid6451794\\charrsid4539359  }{\\b\\f40\\fs16\\insrsid6451794\\charrsid4539359 Vencimento:}{\\b\\f40\\fs16\\cf8\\insrsid6451794\\charrsid4539359 _}{\\f40\\fs16\\insrsid6451794\\charrsid4539359 '.date('d/m/Y',mktime(0,0,0,substr($data,3,2)+($i-1),substr($data,0,2),substr($data,6,4))).' }{
\\b\\f40\\fs16\\insrsid6451794\\charrsid4539359 R$}{\\f40\\fs16\\cf8\\insrsid6451794\\charrsid4539359 _}{\\f40\\fs16\\insrsid6451794\\charrsid4539359 '.$valor.'\\line 
\\par Ao(s) }{\\b\\f40\\fs16\\insrsid6451794\\charrsid4539359 '.(escreveData(date('d/m/Y',mktime(0,0,0,substr($data,3,2)+($i-1),substr($data,0,2),substr($data,6,4))))).'}{\\f40\\fs16\\insrsid6451794\\charrsid4539359 , pagarei por esta \\\'fanica via de NOTA PROMISS\\\'d3RIA a }{\\b\\f40\\fs16\\insrsid6451794\\charrsid4539359 
'.($v_nome).'}{\\f40\\fs16\\insrsid6451794\\charrsid4539359 , CPF/CNPJ }{\\b\\f40\\fs16\\insrsid6451794\\charrsid4539359 '.formatarCPF_CNPJ($v_cpfcnpj,true).'}{\\f40\\fs16\\insrsid6451794\\charrsid4539359 , a quantia de: }{\\b\\f40\\fs16\\insrsid6451794\\charrsid4539359 '.valorPorExtenso($valor).'}{\\f40\\fs16\\insrsid6451794\\charrsid4539359 , em moeda corrente deste pa\\\'eds. Pag\\\'e1vel em GOI\\\'c2NIA/GO
\\par }\\pard \\ql \\li0\\ri0\\widctlpar\\intbl\\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\pararsid2776984\\yts16 {\\f40\\fs16\\insrsid6451794\\charrsid4539359 
\\par Ap\\\'f3s vencimento cobrar juros mora de R$ ___________ ao dia  e multa de R$ ___________
\\par 
\\par }\\pard \\ql \\li0\\ri0\\widctlpar\\intbl\\brdrb\\brdrs\\brdrw10\\brsp20 \\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\pararsid4539359\\yts16 {\\f40\\fs16\\insrsid6451794\\charrsid4539359 '.($c_nome).' ('.gmdate("d/m/Y").')
\\par }\\pard \\qj \\li0\\ri0\\widctlpar\\intbl\\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\pararsid2776984\\yts16 {\\b\\f40\\fs16\\insrsid6451794\\charrsid4539359 EMITENTE ASSINATURA\\line 
\\par }\\pard \\ql \\li0\\ri0\\widctlpar\\intbl\\brdrb\\brdrs\\brdrw10\\brsp20 \\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\pararsid4539359\\yts16 {\\f40\\fs16\\insrsid6451794\\charrsid4539359 '.$c_cpfcnpj.'
\\par }\\pard \\q1 \\li0\\ri0\\widctlpar\\intbl\\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\pararsid2776984\\yts16 {\\b\\f40\\fs16\\insrsid6451794\\charrsid4539359 CPF/CNPJ\\line 
\\par }\\pard \\ql \\li0\\ri0\\widctlpar\\intbl\\brdrb\\brdrs\\brdrw10\\brsp20 \\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\pararsid4539359\\yts16 {\\f40\\fs16\\insrsid6451794\\charrsid4539359 '.$c_endereco.' '.$c_bairro.', CEP: '.$c_cep.', '.$c_cidade.'/'.$c_estado.'
\\par }\\pard \\ql \\li0\\ri0\\widctlpar\\intbl\\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\pararsid2776984\\yts16 {\\b\\f40\\fs16\\insrsid6451794\\charrsid4539359 ENDERE\\\'c7O\\cell }\\pard\\plain \\ql \\li0\\ri0\\widctlpar\\intbl\\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0 
\\fs24\\lang1046\\langfe1046\\cgrid\\langnp1046\\langfenp1046 {\\f40\\fs16\\insrsid6451794\\charrsid4539359 \\trowd \\irow0\\irowband0\\lastrow \\ts16\\trgaph70\\trrh1134\\trleft-108\\trkeep\\trbrdrt\\brdrs\\brdrw10 \\trbrdrl\\brdrs\\brdrw10 \\trbrdrb\\brdrs\\brdrw10 \\trbrdrr
\\brdrs\\brdrw10 \\trbrdrh\\brdrs\\brdrw10 \\trbrdrv\\brdrs\\brdrw10 \\trftsWidth1\\trftsWidthB3\\trftsWidthA3\\trautofit1\\trpaddl108\\trpaddr108\\trpaddfl3\\trpaddft3\\trpaddfb3\\trpaddfr3\\tblrsid4539359\\tbllkhdrrows\\tbllklastrow\\tbllkhdrcols\\tbllklastcol \\clvertalt
\\clbrdrt\\brdrs\\brdrw10 \\clbrdrl\\brdrs\\brdrw10 \\clbrdrb\\brdrs\\brdrw10 \\clbrdrr\\brdrs\\brdrw10 \\cltxbtlr\\clftsWidth3\\clwWidth1908\\clshdrawnil \\cellx1800\\clvertalt\\clbrdrt\\brdrs\\brdrw10 \\clbrdrl\\brdrs\\brdrw10 \\clbrdrb\\brdrs\\brdrw10 \\clbrdrr\\brdrs\\brdrw10 
\\cltxlrtb\\clftsWidth3\\clwWidth8774\\clshdrawnil \\cellx10574\\row }\\pard \\ql \\li0\\ri0\\widctlpar\\aspalpha\\aspnum\\faauto\\adjustright\\rin0\\lin0\\itap0\\pararsid1055175 {\\insrsid1055175\\charrsid2776984 ------------------------ 
\\par ';
}

$output=str_replace('----------------------------------',
					$temp2,
					$output);

# NOME DO ARQUIVO
$arq = 'promissorias.doc';

# ABRE ARQUIVO / CRIA
$abre = fopen($arq, "w");
# SALVA DADOS NO ARQUIVO
$salva = fwrite($abre, $output);
# FECHA ARQUIVO
fclose($abre);
header("Location: promissorias.doc");
