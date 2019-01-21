<?php

namespace App\Services;

class Security
{

    /**
     * [validar verifica el valor de la variable y lo formatea según el tipo indicado.]
     * @param  [mixed] $valor [variable a evaluar]
     * @param  string $tipo        [tipo de variable a evaluar (numero, auto, string, date)]
     * @return [mixed]        [variable formateada]
     */
    static function validar($valor, $tipo, $opcion=null){
        $retorno    = '';
        if($tipo == 'numero'){
            if(isset($valor) AND !empty($valor)){
                if(trim($valor) == ''){
                    $retorno = 0;
                }else{
                    $retorno = intval(trim($valor));
                }
            }else{
                $retorno = 0;
            }
        }
        
        if($tipo == "auto"){
            if(isset($valor)){
                if(trim($valor) == ""){
                    return 8;
                }elseif($valor == 0){
                    return 8;
                }
            }elseif($valor){
                return 8;
            }
        }
        if($tipo == "string"){
            if(isset($valor)){
                if(!empty($opcion)){
                    if($opcion=='strtoupper'){
                        $retorno = strtr(strtoupper(trim($valor)),"àèìòùáéíóúÁÉÍÓÚçñÑäëïöü","ÀÈÌÒÙáéíóúÁÉÍÓÚÇñÑÄËÏÖÜ");
                    }else if($opcion=='strtolower'){
                        $retorno = strtr(strtolower(trim($valor)),"àèìòùáéíóúÁÉÍÓÚçñÑäëïöü","ÀÈÌÒÙáéíóúÁÉÍÓÚÇñÑÄËÏÖÜ");
                    }else{
                        $retorno = strtr(trim($valor),"àèìòùáéíóúÁÉÍÓÚçñÑäëïöü","ÀÈÌÒÙáéíóúÁÉÍÓÚÇñÑÄËÏÖÜ");
                    }
                }else{
                    $retorno = strtr(trim($valor),"àèìòùáéíóúÁÉÍÓÚçñÑäëïöü","ÀÈÌÒÙáéíóúÁÉÍÓÚÇñÑÄËÏÖÜ");
                }
                $retorno = Security::revisarString($retorno);
            }
        }
        
        if($tipo == "date"){
            $retorno = '0000-00-00 00:00:00';
            if(isset($valor)){
                if(trim($valor) == ""){
                    $retorno = "0000-00-00 00:00:00";
                }
                else{
                    $fechaHora = explode(" ", $valor);
                    if (strpos($fechaHora[0], "/") !== false) {
                        $parte = explode("/", $fechaHora[0]);
                    }else{
                        $parte = explode("-", $fechaHora[0]);
                    }
                    if(count($parte)>2){
                        $retorno = $parte[2]."-".$parte[1]."-".$parte[0]." 00:00:00";
                    }else{
                        $retorno = "0000-00-00 00:00:00";
                    }
                }
            }else{
                $retorno = "0000-00-00 00:00:00";
            }
        }
        if($tipo == "fecha_bd"){
            $retorno = '0000-00-00';
            if(isset($valor)){
                if(trim($valor) != ''){
                    $parte  = explode('-', trim($valor));
                    if(count($parte) > 2){
                        $retorno    = $parte[0].'-'.$parte[1].'-'.$parte[2];
                    }
                }
            }
        }
        if($tipo == "signo"){
            if(isset($valor)){
                if(trim($valor) != ""){
                    $reemplazo_mayor    = '>';
                    $reemplazo_menor    = '<';
                    $valor_inicial      = str_replace($reemplazo_mayor,' ',$valor);
                    $valor_final        = str_replace($reemplazo_menor,' ',$valor_inicial);
                    $valor              = $valor_final;
                    $retorno = $valor;
                }
            }
        }
        return $retorno;
    }


    /**
     * [revisarString limpieza string contra inyecciones SQL]
     * @param  string  $string    [string a evaluar]
     * @return string             [string formateado]
     */
    static public function revisarString(string $string)
    {
        $reemplazar[] = '`';
        $reemplazar[] = 'select ';
        $reemplazar[] = 'SELECT ';
        $reemplazar[] = 'insert ';
        $reemplazar[] = 'INSERT ';
        $reemplazar[] = 'update ';
        $reemplazar[] = 'UPDATE ';
        $reemplazar[] = 'delete ';
        $reemplazar[] = 'DELETE ';
        $reemplazar[] = 'schema ';
        $reemplazar[] = 'SCHEMA ';
        $reemplazar[] = 'create ';
        $reemplazar[] = 'CREATE ';
        $reemplazar[] = 'drop ';
        $reemplazar[] = 'DROP ';

        $reemplazar[] = ' from ';
        $reemplazar[] = ' FROM ';
        $reemplazar[] = ' where ';
        $reemplazar[] = ' WHERE ';
        $reemplazar[] = ' and ';
        $reemplazar[] = ' AND ';
        $reemplazar[] = ' having ';
        $reemplazar[] = ' HAVING ';
        $reemplazar[] = ' case ';
        $reemplazar[] = ' CASE ';
        $reemplazar[] = ' when ';
        $reemplazar[] = ' WHEN ';
        $reemplazar[] = ' end ';
        $reemplazar[] = ' END ';
        $reemplazar[] = ' if ';
        $reemplazar[] = ' IF ';
        $reemplazar[] = ' else ';
        $reemplazar[] = ' ELSE ';
        $reemplazar[] = ' union ';
        $reemplazar[] = ' UNION ';

        $reemplazar[] = ' like';
        $reemplazar[] = ' LIKE';
        $reemplazar[] = ' concat';
        $reemplazar[] = ' CONCAT';
        $reemplazar[] = ' count';
        $reemplazar[] = ' COUNT';
        $reemplazar[] = ' rand';
        $reemplazar[] = ' RAND';
        $reemplazar[] = ' floor';
        $reemplazar[] = ' FLOOR';
        //$reemplazar[] = "'";
        //$reemplazar[] = '"';
        $reemplazar[] = '(';
        $reemplazar[] = ')';
        $reemplazar[] = ' * ';
        //$reemplazar[] = ';';
        //$reemplazar[] = ',';
        
         $string = str_replace($reemplazar,'',$string);
         
        return $string;
    }



    static public function validaRut($rut)
    {
        if(empty($rut)){ return false; }
        if($rut == '-'){ return false; }
        /* Validar que RUT no sea 0-0, 00-0 etc */
        if( preg_match('/^[0]+-[0]{1}$/',$rut) == 1 or preg_match('/^[0]+-[0]{1}$/',$rut) === false ){ return false; }
        if( strpos($rut,"-") == false ){
            $RUT[0] = substr($rut, 0, -1);
            $RUT[1] = substr($rut, -1);
        }else{
            $RUT    = explode("-", trim($rut));
        }
        $elRut      = str_replace(".", "", trim($RUT[0]));
        $factor     = 2;
        $suma       = 0;
        for($i = strlen($elRut)-1; $i >= 0; $i--):
            $factor = $factor > 7 ? 2 : $factor;
            $suma += $elRut{$i}*$factor++;
        endfor;
        $resto      = $suma % 11;
        $dv         = 11 - $resto;
        if( $dv == 11 ){
            $dv = '0';
        }else if( $dv == 10 ){
            $dv = "k";
        }else{
            $dv = $dv;
        }
        if($dv == trim(strtolower($RUT[1]))){
            return true;
        }else{
            return false;
        }
    }
    

    static public function validaNombreArchivo($nombre_adjunto)
    {
        #$arr_permitidos    = array('jpeg','jpg','png','gif','tiff','bmp','pdf','txt','csv','doc','docx','ppt','pptx','xls','xlsx','tar','zip','gzip','rar','7z');
        $arr_permitidos = array('jpeg','jpg','png','gif','tiff','bmp','pdf','txt','csv','doc','docx','ppt','pptx','xls','xlsx','eml');
        $nombre_adjunto = trim($nombre_adjunto);
        $nombre_adjunto = trim($nombre_adjunto,".");
        $extension      = substr(strrchr($nombre_adjunto, "."), 1); 
        $partes         = explode(".".$extension, $nombre_adjunto); 
        $nombre_adjunto = $partes[0];
        $extension      = strtolower($extension);
        if($nombre_adjunto == ''){ return false; }
        if($extension == ''){ return false; }
        if(!in_array($extension, $arr_permitidos)){ return false; }
        
        $arr_buscar     = array(" ","  ","á","é","í","ó","ú","ñ","Á","É","Í","Ó","Ú","Ñ","°","'",'"',',',';','/','%20','..','.','º','&');
        $arr_reemplazar = array("_","_","a","e","i","o","u","n","A","E","I","O","U","N","_","_",'_','_','_','_','_','_','_','_','_');
        
        $nombre_adjunto = str_replace($arr_buscar,$arr_reemplazar,$nombre_adjunto);
        $nombre_adjunto = trim($nombre_adjunto,"_");
        $retorno        = $nombre_adjunto.'.'.$extension;
        return strtolower($retorno);
    }
    
    static public function validaFechaBD($fecha)
    {
        if(empty($fecha)){ return '0000-00-00'; }
        if($fecha == '-'){ return '0000-00-00'; }
        if($fecha == '?'){ return '0000-00-00'; }
        
        $fecha      = trim($fecha);
        $fecha      = explode(' ', $fecha);
        $fecha      = $fecha[0];
        $f2         = explode('/', $fecha);
        if(count($f2) == 3){
            if($f2[2] >= '2000'){
                $ff     = $f2[2].'-'.$f2[1].'-'.$f2[0];
                return $ff;
            }else if($f2[0] >= '2000'){
                $ff     = $f2[0].'-'.$f2[1].'-'.$f2[2];
                return $ff;         
            }else{
                return '0000-00-00';
            }
        }else{
            $f      = date_create($fecha);
            if($f){
                $fecha  = date_format($f,'Y-m-d');
                $f3     = explode('-', $fecha);
                if($f3[0] >= '2000'){
                    return $fecha;
                }else{
                    return '0000-00-00';
                }
            }else{
                return '0000-00-00';
            }
        }
    }
    
    static public function generar_sha256($string){
        return hash('sha256',$string);
    }

    static public function generar_sha512($string){
        return hash('sha512',$string);
    }

    /**
     * [passAleatorio description]
     * @return [type] [description]
     */
    static public function randomPass($largo=6){
        $cadena         = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";     
        $longitudCadena = strlen($cadena);
        $pass           = "";       
        $longitudPass   = $largo;
        for($i = 1 ; $i <= $longitudPass ; $i++){
            $pos    = rand(0,$longitudCadena-1);
            $pass   .= substr($cadena,$pos,1);
        }
        
        return $pass;
    }
    
    /**
     * [generaTokenUsuario description]
     * @return [type] [description]
     */
    static public function generaTokenUsuario($gl_rut){
        $base       = "Mordedores";
        $random     = randomPass();
        $string     = $base.$random.$gl_rut;
        $gl_token   = generar_sha512($string);
        return $gl_token;
    }

    /**
     * [formatearSoloFecha formatea fecha de formato Y/m/d al formato Y-m-d ]
     * @param  string $fecha [fecha con formato Y/m/d]
     * @return string        [fecha formateada Y-m-d]
     */
    static public function formatearSoloFechaBD($fecha){
        $parte = explode("/", $fecha);
        if(count($parte)>2){
            $valor = $parte[2]."-".$parte[1]."-".$parte[0];
        }else{
            return "0000-00-00";
        }
        
        return $valor;
    }
    /**
     * [formatearFecha formatea fecha de formato Y/m/d H:i:s al formato Y-m-d ]
     * @param  [type] $fecha [fecha con formato Y/m/d H:i:s]
     * @return string        [fecha formateada Y-m-d]
     */
    static public function formatearFechaBD($fecha){
        $fecha_hora = explode(" ", $fecha);
        $parte = explode("/", $fecha_hora[0]);
        if(count($fecha_hora) > 1 && count($parte)>2){
            $valor = $parte[2]."-".$parte[1]."-".$parte[0];
        }
        else{
            return "0000-00-00";
        }
        return $valor;
    }
    /**
     * [formatearFechaHoraBD formatea fecha de formato Y/m/d H:i:s al formato Y-m-d H:i:s ]
     * @param  [type] $fecha [fecha con formato Y/m/d H:i:s]
     * @return string        [fecha formateada Y-m-d H:i:s]
     */
    static public function formatearFechaHoraBD($fecha, $separador = "/"){
        $fechaHora = explode(" ", $fecha);
        $parte = explode($separador, $fechaHora[0]);
        if(count($fechaHora) > 1 && count($parte)>2){
            $valor = $parte[2]."-".$parte[1]."-".$parte[0]." ".$fechaHora[1];
        }
        else if(count($parte)>2){
            $valor = $parte[2]."-".$parte[1]."-".$parte[0]." 00:00:00";
        }
        else{
            return "0000-00-00 00:00:00";
        }
        return $valor;
    }
    /**
     * [formatearFechaHora se transforma string en date con el formato indicado]
     * @param  [string] $fecha [string fecha a formatear]
     * @param  [string] $fecha [formato de date]
     * @return [date]          [fecha formateada]
     */
    static public function formatearFechaHora($fecha, $formato){
        if(!empty($fecha)){
            $valor = date($formato, strtotime($fecha));
        }else{
            return date($formato, strtotime("0000-00-00"));
        }
        return $valor;
    }
}
