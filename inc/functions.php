<?php
function formatarCPF_CNPJ($campo, $formatado = true)
{
  //retira formato
  $codigoLimpo = ereg_replace("[' '-./ t]",'',$campo);
  // pega o tamanho da string menos os digitos verificadores
  $tamanho = (strlen($codigoLimpo) -2);
  //verifica se o tamanho do código informado é válido
  if ($tamanho != 9 && $tamanho != 12){
    return '______.______.______-____';
  }
  
  if ($formatado){
    // seleciona a máscara para cpf ou cnpj
    $mascara = ($tamanho == 9) ? '###.###.###-##' : '##.###.###/####-##';
  
    $indice = -1;
    for ($i=0; $i < strlen($mascara); $i++) {
      if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
    }
    //retorna o campo formatado
    $retorno = $mascara;
  
  }else{
    //se não quer formatado, retorna o campo limpo
    $retorno = $codigoLimpo;
  }
  
  return $retorno;

}

// descricao.........: esta função recebe um valor numérico e retorna uma 
//                     string contendo o valor de entrada por extenso
// parametros entrada: $valor (formato que a função number_format entenda :)
// parametros saída..: string com $valor por extenso

function valorPorExtenso($valor=0) {
  $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
  $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões",
"quatrilhões");

  $c = array("", "cem", "duzentos", "trezentos", "quatrocentos",
"quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
  $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta",
"sessenta", "setenta", "oitenta", "noventa");
  $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze",
"dezesseis", "dezesete", "dezoito", "dezenove");
  $u = array("", "um", "dois", "tr\'eas", "quatro", "cinco", "seis",
"sete", "oito", "nove");

  $z=0;

  $valor = ereg_replace("\.",'',$valor);
  $valor = number_format($valor, 2, ".", ".");
  $inteiro = explode(".", $valor);
  for($i=0;$i<count($inteiro);$i++)
    for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
      $inteiro[$i] = "0".$inteiro[$i];

  // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
  $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
  for ($i=0;$i<count($inteiro);$i++) {
    $valor = $inteiro[$i];
    $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
    $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
    $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
  
    $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
$ru) ? " e " : "").$ru;
    $t = count($inteiro)-1-$i;
    $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
    if ($valor == "000")$z++; elseif ($z > 0) $z--;
    if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t]; 
    if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
  }

  return($rt ? $rt : "zero");
}

function escreveData($data)
{
  //Escreve a data por extenso
  $u=array("UM", "DOIS", "TR\'caS", "QUATRO", "CINCO", "SEIS", "SETE", "OITO", "NOVE");
  $meses=array("JANEIRO", "FEVEREIRO", "MAR\'c7O", "ABRIL", "MAIO", "JUNHO", "JULHO", "AGOSTO", "SETEMBRO", "OUTUBRO", "NOVEMBRO", "DEZEMBRO");
  $d20=array("VINTE", "TRINTA");
  $d=array("DEZ", "ONZE", "DOZE", "TREZE", "QUATORZE", "QUINZE", "DEZESSEIS", "DEZESSETE", "DEZOITO", "DEZENOVE");
  $m="MIL";
  
  $r="";
  if(isset($data)){
    //Escreve o dia
    $dt=split("/",$data);
    if($dt[0]<10){
     $r.=$u[($dt[0]-1)];
    }elseif($dt[0]>=10 && $dt[0]<20){
     $r.=$d[substr($dt[0],1,1)];
    }else{
     if($dt[0]>=20 && $dt[0]<30){
      $r.=$d20[0];
     }else{
      $r.=$d20[1];
     }
     if(substr($dt[0],1,1)>0)
      $r.=" e ".$u[(substr($dt[0],1,1))-1];
    }
    
    //Escreve o mes
    $r.=" dia(s) de ".$meses[($dt[1]-1)]." de ".$u[(substr($dt[2],0,1))-1]." ".$m." e ";
    
    //Escreve o ano
    if(substr($dt[2],1,3)<10){
     $r.=$u[(substr($dt[2],1,3))-1];
    }elseif(substr($dt[2],1,3)>=10 && substr($dt[2],1,3)<20){
     $r.=$d[(substr($dt[2],3,1))];
    }else{
     if(substr($dt[2],1,3)>=20 && substr($dt[2],1,3)<30){
      $r.=$d20[0];
     }else{
      $r.=$d20[1];
     }
     if(substr($dt[2],3,1)>0)
      $r.=" e ".$u[(substr($dt[2],3,1))-1];
    }
    return $r;
  }
}
